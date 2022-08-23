<?php

namespace App\Http\Controllers;

use App\Models\ConservationAreas;
use App\Models\ConservationBlog;
use App\Models\Departments;
use App\Models\StaffProfiles;
use App\Models\Stubs;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Psr\SimpleCache\InvalidArgumentException;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Solarium\Core\Query\DocumentInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class departmentsController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $pages = Stubs::getLandingBySlug('about-us', 'departments');
        $departments = Departments::list();
        return view('departments.index', compact('departments', 'pages'));
    }

    /**
     * @param string $slug
     * @return View|Response
     */
    public function details(string $slug): View|Response
    {
        $departments = Departments::find($slug);
        if (empty($departments['data'])) {
            return response()->view('errors.404', [], 404);
        } else {
            $department = Collect($departments['data'])->first();
            $staff = StaffProfiles::findByDepartment($department['id']);
            return view('departments.details', compact('department', 'staff'));
        }

    }

    /**
     * @param string $slug
     * @return View
     */
    public function conservation(string $slug): View
    {
        $departments = ConservationAreas::find($slug);
        return view('departments.areas', compact('departments'));
    }

    /**
     * @return array
     */
    public static function areas(): array
    {
        return ConservationAreas::list();
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function areasData(string $slug): array
    {
        return ConservationAreas::find($slug);
    }

    /**
     * @return array
     * @throws InvalidArgumentException
     */
    public static function conservationblog(): array
    {
        $expiresAt = now()->addMinutes(3600);
        $key = md5('conservation-blog-posts');
        if (Cache::has($key)) {
            $data = Cache::store('file')->get($key);
        } else {
            $data = ConservationBlog::list();
            Cache::store('file')->put($key, $data, $expiresAt);
        }
        return $data;
    }

    /**
     * @return mixed|DocumentInterface[]
     * @throws InvalidArgumentException
     */
    public static function hkiblog(): mixed
    {
        $expiresAt = now()->addMinutes(3600);
        $key = md5('hki-blog-posts');
        if (Cache::has($key)) {
            $data = Cache::store('file')->get($key);
        } else {
            $configSolr = Config::get('solarium');
            $client = new Client(new Curl(), new EventDispatcher(), $configSolr);
            $query = $client->createSelect();
            $query->setQuery('contentType:hkiblog title:*');
            $query->setRows(3);
            $data = $client->select($query);
            $data = $data->getDocuments();
            Cache::store('file')->put($key, $data, $expiresAt);
        }
        return $data;
    }
}
