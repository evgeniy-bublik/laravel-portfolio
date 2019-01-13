<?php

namespace App\Http\Controllers\Admin;

use App\Models\User\AboutMe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminService;

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
     * Display index page.
     *
     * @param \Illuminate\Http\Request $request Request
     * @return \Illuminate\Support\Facades\View
     */
    public function edit(Request $request)
    {
        $aboutMe = $this->adminService->getAboutMeInformations();

        return view('admin.about.edit', compact('aboutMe'));
    }

    /**
     * Update information about me.
     *
     * @param \Illuminate\Http\Request $request Request
     * @return string JSON response.
     */
    public function update(Request $request)
    {
        $model = $this->adminService->getAboutMeInformationByKey($request->name);

        if (!$model) {
            return response()->json([
                'status' => false,
            ]);
        }

        return response()->json([
            'status' => $this->adminService->updateAboutMeInformation($model, $request->name, $request->value),
        ]);
    }
}
