<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
/* Home route */

Breadcrumbs::for('home', function (BreadcrumbTrail $trail): void
{
    $trail->push('Home', route('home'));
});

/**
 * Landing page
 */
Breadcrumbs::for('landing', function (BreadcrumbTrail $trail, string $section): void
{
    $trail->parent('home');
    $trail->push(Str::title(str_replace('-', ' ', $section)), route('landing',[$section]));

});
Breadcrumbs::for('landing-section', function (BreadcrumbTrail $trail, string $section, string $slug): void
{
    $trail->parent('home');
    $trail->push(Str::title(str_replace('-', ' ', $section)), route('landing',[$section]));
    $trail->push(Str::title(str_replace('-', ' ', $slug)), route('landing-section',[$section, $slug]));

});
/**
 * RESEARCH BREADCRUMBS
 */
Breadcrumbs::for('research', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
});

Breadcrumbs::for('research-projects', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Research Projects', route('research-projects'));
});

Breadcrumbs::for('research-project', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Research Projects', route('research-projects'));
    $trail->push('Project details', route('research-project', [$slug]));
});

Breadcrumbs::for('research-profiles', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Our Researchers', route('research-profiles'));
});

Breadcrumbs::for('research-profile', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Our Researchers', route('research-profiles'));
    $trail->push('Profile', route('research-profile', [$slug]));
});
Breadcrumbs::for('research-impact', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Our Impact', route('research-impact'));
});

Breadcrumbs::for('research-affiliates', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Our Affiliates', route('research-affiliates'));
});

Breadcrumbs::for('research-affiliate', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Our Affiliates', route('research-affiliates'));
    $trail->push('Profile', route('research-affiliate', [$slug]));
});

Breadcrumbs::for('exhibition-externals-list', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('External Curators', route('exhibition-externals-list'));
});

Breadcrumbs::for('exhibition-externals', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('External Curators', route('exhibition-externals-list'));
    $trail->push('Profile', route('exhibition-externals', [$slug]));
});

Breadcrumbs::for('resources', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Resources', route('resources'));
});

Breadcrumbs::for('resource', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Resources', route('resources'));
    $trail->push('Project', route('resource', [$slug]));
});

Breadcrumbs::for('opportunities', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Opportunities', route('opportunities'));
});


Breadcrumbs::for('opportunity', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Research', route('research'));
    $trail->push('Opportunities', route('opportunities'));
    $trail->push('Opportunity', route('opportunity', [$slug]));
});

/*
News routes
*/
Breadcrumbs::for('news', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('News Stories', route('news'));
});
Breadcrumbs::for('article', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('News Stories',route('news'));
    $trail->push( 'Article', route('article', [$slug]));
});

/** About us  */


Breadcrumbs::for('directors', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('About us', route('landing', ['about-us']));
    $trail->push('Our Directors', route('directors'));
});
Breadcrumbs::for('directors-redirect', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('About us', route('landing', ['about-us']));
    $trail->push('Our Directors', route('directors-redirect'));
});

Breadcrumbs::for('director', function (BreadcrumbTrail $trail, string $slug): void {
    $trail->parent('home');
    $trail->push('About us', route('landing', ['about-us']));
    $trail->push('Our Directors', route('directors'));
    $trail->push('Director', route('director', [$slug]));
});
Breadcrumbs::for('press-room', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Press releases', route('press-room'));
});
Breadcrumbs::for('vacancies', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Vacancies', route('vacancies'));
});
Breadcrumbs::for('vacancy', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Vacancies', route('vacancies'));
    $trail->push( 'Details', route('vacancy', [$slug]));
});
Breadcrumbs::for('vacancy.archive', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Vacancies', route('vacancies'));
    $trail->push( 'Archive', route('vacancy.archive'));

});
Breadcrumbs::for('governance', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Our Governance Policies', route('governance'));

});
Breadcrumbs::for('press.hockney', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Hockney Terms', route('press.hockney'));
});
Breadcrumbs::for('collections', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Our Collections Areas', route('collections'));
});
Breadcrumbs::for('collection', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Our Collections Areas', route('collections'));
    $trail->push( 'Collection', route('collection', [$slug]));
});
Breadcrumbs::for('departments', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Our departments', route('departments'));
});
Breadcrumbs::for('department', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Our departments', route('departments'));
    $trail->push( 'Department', route('department', [$slug]));
});
Breadcrumbs::for('conservation-care', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Our departments', route('departments'));
    $trail->push( 'Department/Specialism', route('conservation-care', $slug));
});
Breadcrumbs::for('about.our.staff', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Our staff', route('about.our.staff'));
});
Breadcrumbs::for('about.spoliation', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Spoliation Claims', route('about.spoliation'));
});
Breadcrumbs::for('about.spoliation.claim', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('About us',route('landing',['about-us']));
    $trail->push( 'Spoliation Claims', route('about.spoliation'));
    $trail->push( 'Claim', route('about.spoliation.claim', $slug));
});

/* Things to do */
Breadcrumbs::for('things', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Things to Do',route('things'));
});

/* Visit us Routes */
Breadcrumbs::for('visit', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
});
Breadcrumbs::for('visit.faqs', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
    $trail->push('FAQs',route('visit.faqs'));
});
Breadcrumbs::for('visit.groupvisits', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
    $trail->push('Group visits',route('visit.groupvisits'));
});
Breadcrumbs::for('galleries', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
    $trail->push('Galleries',route('galleries'));
});
Breadcrumbs::for('gallery', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
    $trail->push('Galleries',route('galleries'));
    $trail->push('Gallery', route('gallery', $slug));
});
Breadcrumbs::for('exhibitions', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
    $trail->push('Exhibition listing',route('exhibitions'));
});
Breadcrumbs::for('exhibition', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
    $trail->push('Exhibition listing',route('exhibitions'));
    $trail->push('Details', route('exhibition', $slug));
});
Breadcrumbs::for('archive', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
    $trail->push('Exhibition listing',route('exhibitions'));
    $trail->push('Archives',route('archive'));
});

Breadcrumbs::for('exhibition.labels', function (BreadcrumbTrail $trail, string $exhibition, string $slug): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
    $trail->push('Exhibition listing',route('exhibitions'));
    $trail->push('Exhibition',route('exhibition', $exhibition));
    $trail->push('Case Labels', route('exhibition.labels', [$exhibition,$slug]));
});

Breadcrumbs::for('exhibition.cases', function (BreadcrumbTrail $trail, string $exhibition): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
    $trail->push('Exhibition listing',route('exhibitions'));
    $trail->push('Exhibition',route('exhibition', $exhibition));
    $trail->push('Case', route('exhibition.cases', [$exhibition]));
});
Breadcrumbs::for('exhibition.label', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Visit Us',route('visit'));
    $trail->push('Exhibition listing',route('exhibitions'));
    $trail->push('Label', route('exhibition.label', [$slug]));
});

/** True to Nature routes **/
Breadcrumbs::for('exhibition.ttn.artists', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Visit Us', route('visit'));
    $trail->push('Exhibition listing', route('exhibitions'));
    $trail->push('Exhibition', route('exhibition', 'true-to-nature-open-air-painting-in-europe-1780-1870'));
    $trail->push('Artists included', route('exhibition.ttn.artists'));
});
Breadcrumbs::for('exhibition.ttn.artist', function (BreadcrumbTrail $trail, string $slug): void {
    $trail->parent('home');
    $trail->push('Visit Us', route('visit'));
    $trail->push('Exhibition listing', route('exhibitions'));
    $trail->push('Exhibition', route('exhibition', 'true-to-nature-open-air-painting-in-europe-1780-1870'));
    $trail->push('Artists included', route('exhibition.ttn.artists'));
    $trail->push('Artist', route('exhibition.ttn.artist', $slug));
});
Breadcrumbs::for('exhibition.ttn.labels', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Visit Us', route('visit'));
    $trail->push('Exhibition listing', route('exhibitions'));
    $trail->push('Exhibition', route('exhibition', 'true-to-nature-open-air-painting-in-europe-1780-1870'));
    $trail->push('Labels', route('exhibition.ttn.labels'));
});
Breadcrumbs::for('exhibition.ttn.label', function (BreadcrumbTrail $trail, string $slug): void {
    $trail->parent('home');
    $trail->push('Visit Us', route('visit'));
    $trail->push('Exhibition listing', route('exhibitions'));
    $trail->push('Exhibition', route('exhibition', 'true-to-nature-open-air-painting-in-europe-1780-1870'));
    $trail->push('Labels', route('exhibition.ttn.labels'));
    $trail->push('Label details', route('exhibition.ttn.label', $slug));
});
Breadcrumbs::for('exhibition.ttn.viewpoints', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Visit Us', route('visit'));
    $trail->push('Exhibition listing', route('exhibitions'));
    $trail->push('Exhibition', route('exhibition', 'true-to-nature-open-air-painting-in-europe-1780-1870'));
    $trail->push('Viewpoints', route('exhibition.ttn.viewpoints'));
});
Breadcrumbs::for('exhibition.ttn.viewpoint', function (BreadcrumbTrail $trail, string $slug): void {
    $trail->parent('home');
    $trail->push('Visit Us', route('visit'));
    $trail->push('Exhibition listing', route('exhibitions'));
    $trail->push('Exhibition', route('exhibition', 'true-to-nature-open-air-painting-in-europe-1780-1870'));
    $trail->push('Viewpoints', route('exhibition.ttn.artists'));
    $trail->push('Viewpoint details', route('exhibition.ttn.viewpoint', $slug));
});


/* Learning routes */
Breadcrumbs::for('ltd', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('Look, Think, Do',route('ltd'));
});
Breadcrumbs::for('ltd-activity', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('Look, Think, Do',route('ltd'));
    $trail->push('Activity', route('ltd-activity', $slug));
});

Breadcrumbs::for('learning-resources', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('Resources',route('learning-resources'));
});
Breadcrumbs::for('learning-resource', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('Resources',route('learning-resources'));
    $trail->push('Activity', route('learning-resource', $slug));
});
Breadcrumbs::for('school-sessions', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('School Sessions',route('landing-section',['learning', 'school-sessions']));
    $trail->push('Activity', route('school-sessions', $slug));
});
Breadcrumbs::for('community-programming', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('Community Programming',route('landing-section',['learning','community-programming']));
});
Breadcrumbs::for('community-programming-session', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('Community Programming',route('landing-section',['learning','community-programming']));
    $trail->push('Activity', route('community-programming', $slug));
});
Breadcrumbs::for('young-people', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('Young People',route('landing-section',['learning','young-people']));
    $trail->push('Activity', route('young-people', $slug));
});
Breadcrumbs::for('learning-profiles', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('Contacts', route('learning-profiles'));
});
Breadcrumbs::for('adult-activity', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('Adult Programming',route('landing-section',['learning','adult-programming']));
    $trail->push('Activity', route('adult-activity', $slug));
});
Breadcrumbs::for('gallery-activity', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Learning',route('landing',['learning']));
    $trail->push('Gallery Activities',route('landing-section',['learning','gallery-activities']));
    $trail->push('Activity', route('gallery-activity', $slug));
});

/** Object and highlight routes **/
Breadcrumbs::for('objects', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
});

Breadcrumbs::for('highlight-search', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Your seclection', route('highlight-search'));
});
Breadcrumbs::for('highlights', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Highlights', route('highlights'));
});
Breadcrumbs::for('highlight', function (BreadcrumbTrail $trail, string $slug): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Highlights', route('highlights'));
    $trail->push('Detail', route('highlight', [$slug]));
});
Breadcrumbs::for('periods', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Highlights', route('highlights'));
    $trail->push('By Period', route('periods'));
});
Breadcrumbs::for('themes', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Highlights', route('highlights'));
    $trail->push('By Themes', route('themes'));
});
Breadcrumbs::for('context', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Highlights', route('highlights'));
    $trail->push('By Context', route('context'));
});

Breadcrumbs::for('period', function (BreadcrumbTrail $trail, string $period): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Highlights', route('highlights'));
    $trail->push('By Period', route('periods'));
    $trail->push(Str::title(str_replace('-', ' ', $period)), route('period',[$period]));
});
Breadcrumbs::for('theme', function (BreadcrumbTrail $trail, string $theme): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Highlights', route('highlights'));
    $trail->push('By Theme', route('themes'));
    $trail->push(Str::title(str_replace('-', ' ', $theme)) , route('theme',[$theme]));
});

Breadcrumbs::for('context-sections', function (BreadcrumbTrail $trail, string $section): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Highlights', route('highlights'));
    $trail->push('By Context Theme ', route('context'));
    $trail->push(Str::title(str_replace('-', ' ', $section)), route('context-sections',[$section]));
});

Breadcrumbs::for('context-section-detail', function (BreadcrumbTrail $trail, string $section, string $slug): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Highlights', route('highlights'));
    $trail->push('By Context Theme ', route('context'));
    $trail->push(Str::title(str_replace('-', ' ', $section)), route('context-sections',[$section]));
    $trail->push(Str::title(str_replace('-', ' ', $slug)), route('context-section-detail',[$section, $slug]));
});

Breadcrumbs::for('audio-guide', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Audio Guide', route('audio-guide'));
});
Breadcrumbs::for('audio-stop', function (BreadcrumbTrail $trail, string $slug): void {
    $trail->parent('home');
    $trail->push('Objects and Artworks', route('objects'));
    $trail->push('Audio Guide', route('audio-guide'));
    $trail->push('Stop details', route('audio-stop', $slug));
});

/** Social Conversations **/

Breadcrumbs::for('conversations', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
});
Breadcrumbs::for('instagram', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
    $trail->push('Instagram',route('instagram'));
});
Breadcrumbs::for('twitter', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
    $trail->push('Twitter',route('twitter'));
});
Breadcrumbs::for('instagram.story', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
    $trail->push('Instagram',route('instagram'));
    $trail->push('Post', route('instagram.story', $slug));
});
/** podcasts */
Breadcrumbs::for('podcasts', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
    $trail->push('Podcasts',route('podcasts'));
});
Breadcrumbs::for('podcasts.series', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
    $trail->push('Podcasts',route('podcasts'));
    $trail->push('Series',route('podcasts.series',[$slug]));
});
Breadcrumbs::for('podcasts.episode', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
    $trail->push('Podcasts',route('podcasts'));
    $trail->push('Episode',route('podcasts.episode',[$slug]));
});
Breadcrumbs::for('podcast.presenter', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
    $trail->push('Podcasts',route('podcasts'));
    $trail->push('Presenters',route('podcast.presenters'));
    $trail->push('Profile',route('podcast.presenter',[$slug]));
});
Breadcrumbs::for('podcast.presenters', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
    $trail->push('Podcasts',route('podcasts'));
    $trail->push('Presenters',route('podcast.presenters'));
});
Breadcrumbs::for('mindeyes', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
    $trail->push('Podcasts',route('podcasts'));
    $trail->push('Minds Eye',route('mindeyes'));
});
Breadcrumbs::for('mindeyes.story', function (BreadcrumbTrail $trail, string $slug): void
{
    $trail->parent('home');
    $trail->push('Conversations',route('conversations'));
    $trail->push('Podcasts',route('podcasts'));
    $trail->push('Minds Eye',route('mindeyes'));
    $trail->push('Episode',route('mindeyes.story',[$slug]));
});

/** Tessitura breadcrumbs **/
Breadcrumbs::for('events', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Events',route('events'));
});

Breadcrumbs::for('tessitura.search', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Events',route('events'));
    $trail->push('Search', route('tessitura.search'));
});

Breadcrumbs::for('events.type', function (BreadcrumbTrail $trail, string $facility): void {
    $trail->parent('home');
    $trail->push('Events', route('events'));
    $trail->push('Selected by type', route('events.type', [$facility]));

});
/**  Search routing */
Breadcrumbs::for('search.index', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Search',route('search.index'));
});
Breadcrumbs::for('search.results', function (BreadcrumbTrail $trail): void
{
    $trail->parent('home');
    $trail->push('Search',route('search.index'));
    $trail->push('Results',route('search.results'));
});

