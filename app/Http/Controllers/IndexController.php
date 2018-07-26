<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\ProfessionalSkill;
use App\Http\Requests\SupportMessageRequest;
use App\Models\Support;
use App\Models\Portfolio\Work;
use App\Models\Portfolio\Category;

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
            'portfolioCategories' => Category::active()->orderBy('display_order', 'desc')->get(),
            'portfolioWorks' => Work::active()->orderBy('date', 'desc')->paginate(),
        ]);
    }

    public function storeSupportMessage(SupportMessageRequest $request)
    {
        $response = [
            'status' => false,
            'content' => view('modals.base_content', [
                'modalBodyText' => 'Произошла ошибка, попробуйте позже',
                'modalHeaderText' => 'Ошибка',
            ])->render(),
        ];

        if (Support::create($request->all())) {
            $response[ 'status' ] = true;
            $response[ 'content' ] = view('modals.base_content', [
                'modalBodyText' => 'Ваша заявка в обработке, пожалуйста ожидайте ответа',
                'modalHeaderText' => 'Успешно отправлено',
            ])->render();
        }

        return response()->json($response);
    }
}
