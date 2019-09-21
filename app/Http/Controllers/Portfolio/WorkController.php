<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio\Category;
use App\Models\Portfolio\Work;
use App\Services\PortfolioService;
use App\Repositories\Eloquent\Portfolio\{CategoryRepository, WorkRepository};
use App\Repositories\Eloquent\Core\{PageRepository};

/**
 * Portfolio work controller.
 */
class WorkController extends Controller
{
    /**
     * Portfolio service.
     *
     * @access private
     * 
     * @var \App\Services\PortfolioService $portfolioService.
     */
    private $portfolioService;

    /**
     * {@inheritdoc}
     *
     * @param \App\Services\PortfolioService $portfolioService $portfolioService Portfolio service.
     * 
     * @return void
     */
    public function __construct(PortfolioService $portfolioService)
    {
        $this->portfolioService = $portfolioService;
    }

    /**
     * Display index page.
     *
     * @param \Illuminate\Http\Request                                $request      Request object.
     * @param \App\Repositories\Eloquent\Portfolio\CategoryRepository $categoryRepo Portfolio category repository.
     * @param \App\Repositories\Eloquent\Portfolio\WorkRepository     $workRepo     Portfolio work repository.
     * @param \App\Repositories\Eloquent\Core\PageRepository          $pageRepo     Core page repository.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function index(
        Request $request,
        CategoryRepository $categoryRepo,
        WorkRepository $workRepo,
        PageRepository $pageRepo
    ) {
        $page    = $pageRepo->getPortfolioIndexPage();
        $metaDto = ($page) ? $this->portfolioService->getMetaFromPage($page) : $this->portfolioService->getEmptyMetaObject();

        return view('portfolio.index', [
            'categories' => $categoryRepo->getActiveItems(),
            'works'      => $workRepo->getActiveItems(),
            'metaDto'    => $metaDto,
        ]);
    }

    /**
     * Display item portfolio work.
     *
     * @param \Illuminate\Http\Request                            $request  Request object.
     * @param \App\Repositories\Eloquent\Portfolio\WorkRepository $workRepo Portfolio work repository.
     * @param string                                              $itemSlug Portfolio work slug.
     * 
     * @return \Illuminate\Support\Facades\View
     */
    public function portfolioWork(Request $request, WorkRepository $workRepo, $itemSlug)
    {
        $work    = $workRepo->findActiveWorkBySlug($itemSlug);
        $metaDto = $this->portfolioService->getMetaDtoFromWork($work);

        return view('portfolio.item', compact('work', 'metaDto'));
    }
}
