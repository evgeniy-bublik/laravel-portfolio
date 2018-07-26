<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\ProfessionalSkill;
use App\Http\Requests\SupportMessageRequest;
use App\Models\Support;
use App\Models\Portfolio\Work;
use App\Models\Portfolio\Category;
use App\Services\SiteCorePageService;

/**
 * Index controller.
 */
class IndexController extends Controller
{
    /**
     * Site page service.
     *
     * @access private
     * @var \App\Services\SiteCorePageService $sitePageService
     */
    private $sitePageService;

    /**
     * {$inheritdoc}
     *
     * @return void
     */
    public function __construct(SiteCorePageService $sitePageService)
    {
        $this->sitePageService = $sitePageService;
    }

    /**
     * Display index page.
     *
     * @param \Illuminate\Http\Request $request Request
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $page = $this->sitePageService->getIndexPage();

        return view('index', [
            'professionalSkills' => ProfessionalSkill::active()->orderBy('display_order', 'desc')->get(),
            'portfolioCategories' => Category::active()->orderBy('display_order', 'desc')->get(),
            'portfolioWorks' => Work::active()->orderBy('date', 'desc')->paginate(),
            'metaTitle' => $page->meta_title,
            'metaKeywords' => $page->meta_keywords,
            'metaDescription' => $page->meta_description,
        ]);
    }

    /**
     * Display contacts page.
     *
     * @param \Illuminate\Http\Request $request Request
     * @return \Illuminate\Support\Facades\View
     */
    public function contacts(Request $request)
    {
        $page = $this->sitePageService->getContactsPage();

        return view('contacts', [
            'metaTitle' => $page->meta_title,
            'metaKeywords' => $page->meta_keywords,
            'metaDescription' => $page->meta_description,
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
