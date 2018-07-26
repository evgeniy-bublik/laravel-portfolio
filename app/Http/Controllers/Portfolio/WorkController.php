<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio\Category;
use App\Models\Portfolio\Work;

/**
 * Portfolio work controller.
 */
class WorkController extends Controller
{
    /**
     * Display index page.
     *
     * @param \Illuminate\Http\Request $request Request
     * @return \Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        return view('portfolio.index', [
            'categories' => Category::active()->orderBy('display_order', 'desc')->get(),
            'works' => Work::active()->orderBy('date', 'desc')->paginate(),
            'metaTitle' => 'Мои работы | ' . env('SITE_NAME', ''),
            'metaKeywords' => '',
            'metaDescription' => '',
        ]);
    }

    public function portfolioWork(Request $request, $itemSlug)
    {
        $work = Work::active()->where('slug', $itemSlug)->firstOrFail();

        return view('portfolio.item', compact('work'));
    }
}
