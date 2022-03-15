@if($page['slug'] === 'adult-programming')
    @inject('learningController', 'App\Http\Controllers\learningController')
    @php
        $sessions = $learningController::adultsessions()
    @endphp
    @include('includes.structure.adult')
@endif

@if($page['slug'] === 'school-sessions')
    @inject('learningController', 'App\Http\Controllers\learningController')
    @php
        $sessions = $learningController::schoolsessions()
    @endphp
    @include('includes.structure.sessions')
@endif

@if($page['slug'] === 'community-sessions')
    @inject('learningController', 'App\Http\Controllers\learningController')
    @php
        $sessions = $learningController::communitysessions()
    @endphp
    @include('includes.structure.sessions')
@endif

@if($page['slug'] === 'young-people')
    @inject('learningController', 'App\Http\Controllers\learningController')
    @php
        $sessions = $learningController::youngpeople()
    @endphp
    @include('includes.structure.young')
@endif

@if(Request::is('learning/gallery-activities'))
    @inject('learningController', 'App\Http\Controllers\learningController')
    @php
        $activities = $learningController::galleryActivities()
    @endphp
    @include('includes.structure.gallery-activities')
@endif

@if(Request::is('learning/tales-from-the-museum'))
    @inject('learningController', 'App\Http\Controllers\learningController')
    @php
        $sessions = $learningController::families()
    @endphp
    @include('includes.structure.families')
@endif


@if(Request::is('learning/families'))
    @inject('pagesController', 'App\Http\Controllers\pagesController')
    @php
        $slugs = array(
          'look-think-do',
          'gallery-activities',
          'tales-from-the-museum',
          'home-activities'
        )
    @endphp
    <div class="row">
        @foreach($slugs as $slug)
            @include('includes.structure.cards', $pagesController::injectPages('learning', $slug))
        @endforeach
    </div>
@endif

@if(Request::is('learning/about-learning-research'))
    @inject('learningController', 'App\Http\Controllers\learningController')
    @php
        $research = $learningController::research()
    @endphp
    @include('includes.structure.research')
@endif
