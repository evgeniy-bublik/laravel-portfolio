<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio\Category;
use App\Models\Portfolio\Work;
use App\Services\SiteCorePageService;

/**
 * Portfolio work controller.
 */
class WorkController extends Controller
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
        $page = $this->sitePageService->getPortfolioPage();

        return view('portfolio.index', [
            'categories' => Category::active()->orderBy('display_order', 'desc')->get(),
            'works' => Work::active()->orderBy('date', 'desc')->paginate(),
            'metaTitle' => $page->meta_title,
            'metaKeywords' => $page->meta_keywords,
            'metaDescription' => $page->meta_description,
        ]);
    }

    /**
     * Display item portfolio work.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param string $itemSlug Portfolio work slug
     * @return \Illuminate\Support\Facades\View
     */
    public function portfolioWork(Request $request, $itemSlug)
    {
        $work = Work::active()->where('slug', $itemSlug)->firstOrFail();

        return view('portfolio.item', compact('work'));
    }
}
