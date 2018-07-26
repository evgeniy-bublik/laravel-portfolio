<?php

namespace App\Services;

use StdClass;
use App\Models\SiteCorePage;

/**
 * Site core page service.
 */
class SiteCorePageService
{
    /**
     * Get object index page.
     *
     * @return \StdClass|\App\Models\SiteCorePage
     */
    public function getIndexPage()
    {
        return $this->findSitePageByCode(SiteCorePage::PAGE_INDEX_CODE);
    }

    /**
     * Get object blog page.
     *
     * @return \StdClass|\App\Models\SiteCorePage
     */
    public function getBlogPage()
    {
        return $this->findSitePageByCode(SiteCorePage::PAGE_BLOG_CODE);
    }

    /**
     * Get object portfolio page.
     *
     * @return \StdClass|\App\Models\SiteCorePage
     */
    public function getPortfolioPage()
    {
        return $this->findSitePageByCode(SiteCorePage::PAGE_PORTFOLIO_CODE);
    }

    /**
     * Get object contacts page.
     *
     * @return \StdClass|\App\Models\SiteCorePage
     */
    public function getContactsPage()
    {
        return $this->findSitePageByCode(SiteCorePage::PAGE_CONTACTS_CODE);
    }

    /**
     * Find object page.
     *
     * @param string $code Code page for find.
     * @return \StdClass|\App\Models\SiteCorePage
     */
    private function findSitePageByCode($code)
    {
        $page = SiteCorePage::where('code', $code)->first();

        if (!$page) {
            $page = new StdClass();
            $page->meta_title = '';
            $page->meta_description = '';
            $page->meta_keywords = '';
        }

        return $page;
    }
}
