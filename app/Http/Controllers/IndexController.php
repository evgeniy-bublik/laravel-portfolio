<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupportMessageRequest;
use App\Models\Support;
use App\Repositories\Eloquent\User\{ProfessionalSkillRepository};
use App\Repositories\Eloquent\Portfolio\{CategoryRepository, WorkRepository};
use App\Repositories\Eloquent\Core\{PageRepository, SupportRepository};
use App\DTOs\Core\MetaDTO;
use App\Services\HomeService;

/**
 * Index controller.
 */
class IndexController extends Controller
{
    /**
     * Home service.
     * 
     * @access private
     * 
     * @var \App\Services\HomeService $homeService;
     */
    private $homeService;

    /**
     * {@inheritdoc}
     * 
     * @param \App\Services\HomeService $homeService Home service.
     * 
     * @return void
     */
    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    /**
     * Display index page.
     *
     * @param \Illuminate\Http\Request                                    $request               Request object.
     * @param \App\Repositories\Eloquent\User\ProfessionalSkillRepository $skillRepo             Professional skill repository.
     * @param \App\Repositories\Eloquent\Portfolio\CategoryRepository     $portfolioCategoryRepo Portfolio category repository.
     * @param \App\Repositories\Eloquent\Portfolio\WorkRepository         $portfolioWorkRepo     Portfolio work repository.
     * @param \App\Repositories\Eloquent\Core\PageRepository              $pageRepo              Core page repository.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(
        Request $request,
        ProfessionalSkillRepository $skillRepo,
        CategoryRepository $portfolioCategoryRepo,
        WorkRepository $portfolioWorkRepo,
        PageRepository $pageRepo
    ) {
        $page    = $pageRepo->getIndexPage();
        $metaDto = ($page) ? $this->homeService->getMetaFromPage($page) : $this->homeService->getEmptyMetaObject();

        return view('index', [
            'professionalSkills'  => $skillRepo->getActiveItems(),
            'portfolioCategories' => $portfolioCategoryRepo->getActiveItems(),
            'portfolioWorks'      => $portfolioWorkRepo->getActiveItems(),
            'metaDto'             => $metaDto,
        ]);
    }

    /**
     * Display contacts page.
     *
     * @param \Illuminate\Http\Request                       $request  Request object.
     * @param \App\Repositories\Eloquent\Core\PageRepository $pageRepo Core page repository.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function contacts(Request $request, PageRepository $pageRepo)
    {
        $page    = $pageRepo->getContactsPage();
        $metaDto = ($page) ? $this->homeService->getMetaFromPage($page) : $this->homeService->getEmptyMetaObject();

        return view('contacts', compact('metaDto'));
    }

    /**
     * Store support message.
     * 
     * @param \App\Http\Requests\SupportMessageRequest          $request     Request object.
     * @param \App\Repositories\Eloquent\Core\SupportRepository $supportRepo Support repository.
     * 
     * @return string JSON string.
     */
    public function storeSupportMessage(SupportMessageRequest $request, SupportRepository $supportRepo)
    {
        $response = [
            'status'  => false,
            'content' => view('modals.base_content', [
                'modalBodyText'   => 'Произошла ошибка, попробуйте позже',
                'modalHeaderText' => 'Ошибка',
            ])->render(),
        ];

        $supportData = $this->homeService->getDataForSupportMessageFromRequest($request);

        if ($supportRepo->create($supportData)) {
            $response[ 'status' ]  = true;
            $response[ 'content' ] = view('modals.base_content', [
                'modalBodyText'   => 'Ваша заявка в обработке, пожалуйста ожидайте ответа',
                'modalHeaderText' => 'Успешно отправлено',
            ])->render();
        }

        return response()->json($response);
    }
}
