<?php

namespace App\Http\Controllers\Admin\User;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\SocialLinkRequest;
use App\Services\Admin\User\SocialLinkService;
use App\Repositories\Eloquent\User\SocialLinkRepository;
use App\Models\User\SocialLink;

class SocialLinkController extends Controller
{
    /**
     * Admin social links service object.
     * 
     * @access protected
     * 
     * @var App\Services\Admin\User\SocialLinkService $socialLinksService
     */
    protected $socialLinksService;

    /**
     * Constructor.
     * 
     * @param App\Services\Admin\User\SocialLinkService $socialLinksService Admin social links service.
     * 
     * @return void
     */
    public function __construct(SocialLinkService $socialLinksService)
    {
        $this->socialLinksService = $socialLinksService;
    }

    /**
     * Display social links page.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.social-link.index');
    }

    /**
     * Get datatable data social links.
     *
     * @param Illuminate\Http\Request                             $request        Request object.
     * @param App\Repositories\Eloquent\User\SocialLinkRepository $socialLinkRepo Social link repository.
     * 
     * @return null|string JSON.
     */
    public function getDataTable(Request $request, SocialLinkRepository $socialLinkRepo)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = $socialLinkRepo->getModel()->query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.social-link.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display social link create form.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.social-link.create');
    }

    /**
     * Create new social link.
     *
     * @param App\Http\Requests\Admin\User\SocialLinkRequest      $request        Form request.
     * @param App\Repositories\Eloquent\User\SocialLinkRepository $socialLinkRepo Social link repository.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(SocialLinkRequest $request, SocialLinkRepository $socialLinkRepo)
    {
        $modelFields = $this->socialLinksService->getStoreFieldsFromRequest($request);

        $socialLinkRepo->create($modelFields);

        return redirect()->route('admin.social_links.index');
    }

    /**
     * Display social link edit form.
     *
     * @param Illuminate\Http\Request $request    Request object.
     * @param App\Models\SocialLink   $socialLink Social link model.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, SocialLink $socialLink)
    {
        return view('admin.social-link.edit', compact('socialLink'));
    }

    /**
     * Update social link.
     *
     * @param Illuminate\Http\Request $request    Request object.
     * @param App\Models\SocialLink   $socialLink Social link model.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function update(SocialLinkRequest $request, SocialLink $socialLink)
    {   
        $modelFields = $this->socialLinksService->getStoreFieldsFromRequest($request);

        $socialLink->update($modelFields);

        return redirect()->route('admin.social_links.index');
    }

    /**
     * Delete social link.
     *
     * @param Illuminate\Http\Request $request    Request object.
     * @param App\Models\SocialLink   $socialLink Social link model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, SocialLink $socialLink)
    {
        $socialLink->delete();

        return redirect()->route('admin.social_linkss.index');
    }
}
