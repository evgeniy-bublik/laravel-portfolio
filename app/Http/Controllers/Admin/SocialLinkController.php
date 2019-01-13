<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\SocialLink;
use App\Http\Requests\AdminSocialLinkRequest;
use App\Services\AdminService;

class SocialLinkController extends Controller
{
    /**
     * Admin service object.
     * 
     * @access protected
     * 
     * @var App\Services\AdminService $adminService
     */
    protected $adminService;

    /**
     * Constructor.
     * 
     * @param App\Services\AdminService $adminService Admin service class.
     * 
     * @return void
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Display social links page.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.social-link.index');
    }

    /**
     * Get datatable data social links.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return null|string JSON.
     */
    public function getDataTable(Request $request)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = SocialLink::query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.social-link.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display social link create form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.social-link.create');
    }

    /**
     * Create new social link.
     *
     * @param \App\Http\Requests\AdminSocialLinkRequest $request Form request.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(AdminSocialLinkRequest $request)
    {
        $this->adminService->createSocialLink($request->only([
            'link',
            'additional_classes',
            'active',
            'display_order'
        ]));

        return redirect()->route('admin.social.links.index');
    }

    /**
     * Display social link edit form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\SocialLink $socialLink Social link model.
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, SocialLink $socialLink)
    {
        return view('admin.social-link.edit', compact('socialLink'));
    }

    /**
     * Update social link.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\SocialLink $socialLink Social link model.
     * @return \Illuminate\Support\Facades\View
     */
    public function update(AdminSocialLinkRequest $request, SocialLink $socialLink)
    {
        $this->adminService->updateSocialLink($socialLink, $request->only([
            'link',
            'additional_classes',
            'active',
            'display_order'
        ]));

        return redirect()->route('admin.social.links.index');
    }

    /**
     * Delete social link.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\SocialLink $socialLink Social link model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, SocialLink $socialLink)
    {
        $socialLink->delete();

        return redirect()->route('admin.social.links.index');
    }
}
