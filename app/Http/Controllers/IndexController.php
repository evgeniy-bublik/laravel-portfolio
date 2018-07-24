<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\ProfessionalSkill;

/**
 * Index controller.
 */
class IndexController extends Controller
{
    /**
     * Display index page.
     *
     * @param \Illuminate\Http\Request $request Request
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('index', [
            'professionalSkills' => ProfessionalSkill::active()->orderBy('display_order', 'desc')->get(),
        ]);
    }
}
