<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\User\ProfessionalSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfessionalSkillRequest;
use App\Services\AdminService;

class ProfessionalSkillController extends Controller
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
     * Display professional skills page.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.professional-skill.index');
    }

    /**
     * Get datatable data professional skills.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return null|string JSON.
     */
    public function getDataTable(Request $request)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = ProfessionalSkill::query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.professional-skill.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display professional skill create form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.professional-skill.create');
    }

    /**
     * Create new professional skill.
     *
     * @param \App\Http\Requests\AdminProfessionalSkillRequest $request Form request.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(AdminProfessionalSkillRequest $request)
    {
        $this->adminService->createProfessioanlSkill($request->only([
            'name',
            'color_bar',
            'value',
            'display_order',
            'active'
        ]));

        return redirect()->route('admin.professional.skills.index');
    }

    /**
     * Display professional skill edit form.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\User\ProfessionalSkill $skill Professional skill model.
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, ProfessionalSkill $skill)
    {
        return view('admin.professional-skill.edit', compact('skill'));
    }

     /**
     * Update professional skill.
     *
     * @param \App\Http\Requests\AdminProfessionalSkillRequest $request Form request.
     * @param \App\Models\User\ProfessionalSkill $skill Professional skill model.
     * @return \Illuminate\Support\Facades\View
     */
    public function update(AdminProfessionalSkillRequest $request, ProfessionalSkill $skill)
    {
        $this->adminService->updateProfessionalSkill($skill, $request->only([
            'name',
            'color_bar',
            'value',
            'display_order',
            'active'
        ]));

        return redirect()->route('admin.professional.skills.index');
    }

    /**
     * Delete professional skill.
     *
     * @param \Illuminate\Http\Request $request Request.
     * @param \App\Models\User\ProfessionalSkill $skill Professional skill model.
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, ProfessionalSkill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.professional.skills.index');
    }
}
