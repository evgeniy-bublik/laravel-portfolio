<?php

namespace App\Http\Controllers\Admin\Portfolio;

use DataTables;
use App\Models\Portfolio\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Portfolio\Work\{CreateRequest, UpdateRequest};
use App\Services\Admin\Portfolio\WorkService;
use App\Repositories\Eloquent\Portfolio\{WorkRepository, CategoryRepository};

/**
 * Admin portfolio work controller.
 */
class WorkController extends Controller
{
    /**
     * Portfolio work service object.
     * 
     * @access protected
     * 
     * @var App\Services\Admin\Portfolio\WorkService $workService
     */
    protected $workService;

    /**
     * Constructor.
     * 
     * @param App\Services\Admin\Portfolio\WorkService $workService Portfolio work service class.
     * 
     * @return void
     */
    public function __construct(WorkService $workService)
    {
        $this->workService = $workService;
    }

    /**
     * Display portfolio works page.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('admin.portfolio.work.index');
    }

    /**
     * Get datatable data works.
     *
     * @param Illuminate\Http\Request                            $request  Request object.
     * @param App\Repositories\Eloquent\Portfolio\WorkRepository $workRepo Work repository.
     * 
     * @return null|string JSON.
     */
    public function getDataTable(Request $request, WorkRepository $workRepo)
    {
        if (!$request->ajax()) {
            return null;
        }

        $query = $workRepo->getModel()->query();

        return DataTables::eloquent($query)
            ->addColumn('actions', 'admin.portfolio.work.datatable_actions_column')
            ->rawColumns(['actions'])
            ->toJson();
    }

    /**
     * Display portfolio work create form.
     *
     * @param Illuminate\Http\Request                                $request      Request Object.
     * @param App\Repositories\Eloquent\Portfolio\CategoryRepository $categoryRepo Portfolio category repository.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function create(Request $request, CategoryRepository $categoryRepo)
    {
        return view('admin.portfolio.work.create', [
            'listCategories' => $categoryRepo->collection(),
        ]);
    }

    /**
     * Create new portfolio work.
     *
     * @param App\Http\Requests\Admin\Portfolio\Work\CreateRequest $request Form request.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function store(CreateRequest $request, WorkRepository $workRepo)
    {
        $image  = $this->workService->getImageFromRequest($request);
        $fields = $this->workService->getStoreDataFromRequest($request);
        $model  = $workRepo->create($fields);

        if ($model) {
            $this->workService->saveImage($model, $image);
        }

        return redirect()->route('admin.portfolio.works.index');
    }

    /**
     * Display portfolio work edit form.
     *
     * @param Illuminate\Http\Request                                $request      Request object.
     * @param App\Models\Portfolio\Work                              $work         Portfolio work model.
     * @param App\Repositories\Eloquent\Portfolio\CategoryRepository $categoryRepo Portfolio category repository.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, Work $work, CategoryRepository $categoryRepo)
    {
        return view('admin.portfolio.work.edit', [
            'work'           => $work,
            'listCategories' => $categoryRepo->collection(),
        ]);
    }

    /**
     * Update portfolio work.
     *
     * @param App\Http\Requests\Admin\Portfolio\Work\UpdateRequest $request Form request.
     * @param App\Models\Portfolio\Work                            $work    Portfolio work model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(UpdateRequest $request, Work $work)
    {
        $image  = $this->workService->getImageFromRequest($request);
        $fields = $this->workService->getStoreDataFromRequest($request);

        $work->update($fields);

        if ($image) {
            $this->workService->deleteImageDir($work->id);
            $this->workService->saveImage($work, $image);
        }

        return redirect()->route('admin.portfolio.works.index');
    }

    /**
     * Delete portfolio work.
     *
     * @param Illuminate\Http\Request   $request Request object.
     * @param App\Models\Portfolio\Work $work    Portfolio work model.
     * 
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function delete(Request $request, Work $work)
    {
        $work->delete();

        $this->workService->deleteImageDir($work->id);

        return redirect()->route('admin.portfolio.works.index');
    }
}
