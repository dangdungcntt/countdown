<?php

namespace App\Http\Controllers;

use App\Http\Requests\Site\SiteStore;
use App\Http\Requests\Site\SiteUpdate;
use App\Http\Services\Contracts\TemplateServiceContract;
use App\Site;
use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Site::class);

        $user = Auth::user();

        $sites = Gate::allows('index_all', Site::class)
                ? Site::all() : $user->sites()->get();

        $sites->load('template');

        return view('sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Site::class);

        $templates = Template::all();

        $siteDataFields = $this->getSiteDataFields();

        return view('sites.create', compact('templates', 'siteDataFields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Site\SiteStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteStore $request)
    {
        Site::query()->create($request->validated());

        flash()->success('Success');
        return redirect()->route('sites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $site = Site::findByField('slug', $slug, true);

        $response = app(TemplateServiceContract::class)
            ->render($site->template, data_get($site, 'data'));

        return $response ?? abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Site $site
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Site $site)
    {
        $this->authorize('edit', $site);

        $templates = Template::all();

        $siteDataFields = $this->getSiteDataFields();

        return view('sites.edit', compact('site', 'templates', 'siteDataFields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SiteUpdate $request
     * @param Site $site
     * @return \Illuminate\Http\Response
     */
    public function update(SiteUpdate $request, Site $site)
    {
        $success = $site->update($request->validated());

        if ($success) {
            flash()->success('Success');
        } else {
            flash()->error('Failed');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Site $site
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Site $site)
    {
        $this->authorize('destroy', $site);

        $success = $site->delete();

        return response([
            'success' => $success
        ], $success ? 200 : 500);
    }

    private function getSiteDataFields()
    {
        return [
            [
                'id' => 'inputDataEndTime',
                'type' => 'datetime-local',
                'key' => 'end_time',
                'name' => 'data[end_time]',
                'label' => 'End time',
                'value_key' => 'data.end_time',
                'placeholder' => 'End time',
                'required' => true
            ],
            [
                'id' => 'inputDataTitle',
                'key' => 'title',
                'name' => 'data[title]',
                'label' => 'Title',
                'value_key' => 'data.title',
                'placeholder' => 'Title',
            ],
            [
                'id' => 'inputDataSubTitle',
                'key' => 'sub_title',
                'name' => 'data[sub_title]',
                'label' => 'Sub-Title',
                'value_key' => 'data.sub_title',
                'placeholder' => 'Sub-Title',
            ],
            [
                'id' => 'inputDataLogoUrl',
                'type' => 'url',
                'key' => 'logo_url',
                'name' => 'data[logo_url]',
                'label' => 'Logo URL',
                'value_key' => 'data.logo_url',
                'placeholder' => 'Logo URL',
            ],
            [
                'id' => 'inputDataBackgroundUrl',
                'type' => 'url',
                'key' => 'background_url',
                'name' => 'data[background_url]',
                'label' => 'Background URL',
                'value_key' => 'data.background_url',
                'placeholder' => 'Background URL',
            ],
            [
                'id' => 'inputDataFacebookUrl',
                'type' => 'url',
                'key' => 'facebook_url',
                'name' => 'data[facebook_url]',
                'label' => 'Facebook URL',
                'value_key' => 'data.facebook_url',
                'placeholder' => 'Facebook URL',
            ],
            [
                'id' => 'inputDataTwitterUrl',
                'type' => 'url',
                'key' => 'twitter_url',
                'name' => 'data[twitter_url]',
                'label' => 'Twitter URL',
                'value_key' => 'data.twitter_url',
                'placeholder' => 'Twitter URL',
            ],
            [
                'id' => 'inputDataGoogleplusUrl',
                'type' => 'url',
                'key' => 'googleplus_url',
                'name' => 'data[googleplus_url]',
                'label' => 'Google+ URL',
                'value_key' => 'data.googleplus_url',
                'placeholder' => 'Google+ URL',
            ],
            [
                'id' => 'inputDataInstagramUrl',
                'type' => 'url',
                'key' => 'instagram_url',
                'name' => 'data[instagram_url]',
                'label' => 'Instagram URL',
                'value_key' => 'data.instagram_url',
                'placeholder' => 'Instagram URL',
            ],
        ];
    }
}
