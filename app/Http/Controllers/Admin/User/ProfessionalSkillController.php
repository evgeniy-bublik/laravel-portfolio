<?php

namespace App\Http\Controllers\Admin\User;

use DataTables;
use App\Models\User\ProfessionalSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\ProfessionalSkillRequest;
use App\Services\Admin\User\ProfessionalSkillService;
use App\Repositories\Eloquent\User\ProfessionalSkillRepository;

class ProfessionalSkillController extends Controller
{
    /**
     * Admin professional skill service object.
     * 
     * @access protected
     * 
     * @var App\Services\Admin\User\ProfessionalSkillService $professionalSkillService
     */
    protected $professionalSkillService;

    /**
     * Constructor.
     * 
     * @param App\Services\Admin\User\ProfessionalSkillService $professionalSkillService Admin professional skill service.
     * 
     * @return void
     */
    public function __construct(ProfessionalSkillService $professionalSkillService)
    {
        $this->professionalSkillService = $professionalSkillService;
    }

    /**
     * Display professional skills page.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.professional-skill.index');
    }

    /**
     * Get datatable data professional skills.
     *
     * @param Illuminate\Http\Request                                    $request   Request object.
     * @param App\Repositories\Eloquent\User\ProfessionalSkillRepository $skillRepo Professional skill repository.
     * 
     * @return null|string JSON.
     */
    public function getDataTable(Request $request, ProfessionalSkillRepository $skillRepo)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = $skillRepo->getModel()->query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.professional-skill.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display professional skill create form.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        return view('admin.professional-skill.create');
    }

    /**
     * Create new professional skill.
     *
     * @param App\Http\Requests\Admin\User\ProfessionalSkillRequest      $request   Form request.
     * @param App\Repositories\Eloquent\User\ProfessionalSkillRepository $skillRepo Professional skill repository.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(ProfessionalSkillRequest $request, ProfessionalSkillRepository $skillRepo)
    {
        $modelFields = $this->professionalSkillService->getStoreFieldsFromRequest($request);

        $skillRepo->create($modelFields);

        return redirect()->route('admin.professional_skills.index');
    }

    /**
     * Display professional skill edit form.
     *
     * @param Illuminate\Http\Request           $request Request object.
     * @param App\Models\User\ProfessionalSkill $skill   Professional skill model.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, ProfessionalSkill $skill)
    {
        return view('admin.professional-skill.edit', compact('skill'));
    }

     /**
     * Update professional skill.
     *
     * @param App\Http\Requests\Admin\User\ProfessionalSkillRequest $request Form request.
     * @param App\Models\User\ProfessionalSkill                     $skill   Professional skill model.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function update(ProfessionalSkillRequest $request, ProfessionalSkill $skill)
    {
        $modelFields = $this->professionalSkillService->getStoreFieldsFromRequest($request);

        $skill->update($modelFields);

        return redirect()->route('admin.professional_skills.index');
    }

    /**
     * Delete professional skill.
     *
     * @param Illuminate\Http\Request           $request Request object.
     * @param App\Models\User\ProfessionalSkill $skill   Professional skill model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, ProfessionalSkill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.professional_skills.index');
    }
}
