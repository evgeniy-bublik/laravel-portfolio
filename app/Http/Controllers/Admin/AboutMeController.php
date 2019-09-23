<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\AboutMeService;
use App\Repositories\Eloquent\User\AboutMeRepository;

/**
 * Admin about me controller.
 */
class AboutMeController extends Controller
{
    /**
     * Admin service object.
     * 
     * @access protected
     * 
     * @var App\Services\Admin\AboutMeService $aboutMeService
     */
    protected $aboutMeService;

    /**
     * Constructor.
     * 
     * @param App\Services\AboutMeService $aboutMeService Admin service class.
     * 
     * @return void
     */
    public function __construct(AboutMeService $aboutMeService)
    {
        $this->aboutMeService = $aboutMeService;
    }

    /**
     * Display index page.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request, AboutMeRepository $aboutMeRepo)
    {
        $aboutMeCollection = $aboutMeRepo->collection();

        return view('admin.about.edit', compact('aboutMeCollection'));
    }

    /**
     * Update information about me.
     *
     * @param Illuminate\Http\Request $request Request object.
     * 
     * @return string JSON response.
     */
    public function update(Request $request, AboutMeRepository $aboutMeRepo)
    {
        $model = $aboutMeRepo->getModelByKey($request->name);

        if (!$model) {
            return response()->json([
                'status' => false,
            ]);
        }

        $model->value = $this->aboutMeService->getModifyValueByKey($request->name, $request->value);

        return response()->json([
            'status' => $model->save(),
        ]);
    }
}
