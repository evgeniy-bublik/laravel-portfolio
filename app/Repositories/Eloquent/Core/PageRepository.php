<?php

namespace App\Repositories\Eloquent\Core;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\SiteCorePage;

class PageRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return
     */
    public function getModelClass()
    {
        return SiteCorePage::class;
    }

    /**
     * Get index page model.
     * 
     * @return \App\Models\SiteCorePage|null
     */
    public function getIndexPage()
    {
        return $this->findSitePageByCode(SiteCorePage::PAGE_INDEX_CODE);
    }

    /**
     * Get contact page model.
     * 
     * @return \App\Models\SiteCorePage|null
     */
    public function getContactsPage()
    {
        return $this->findSitePageByCode(SiteCorePage::PAGE_CONTACTS_CODE);
    }

    /**
     * Get portfolio page model.
     * 
     * @return \App\Models\SiteCorePage|null
     */
    public function getPortfolioIndexPage()
    {
        return $this->findSitePageByCode(SiteCorePage::PAGE_PORTFOLIO_CODE);
    }

    /**
     * Get blog page model.
     * 
     * @return \App\Models\SiteCorePage|null
     */
    public function getBlogIndexPage()
    {
        return $this->findSitePageByCode(SiteCorePage::PAGE_BLOG_CODE);
    }

    /**
     * Find object page.
     *
     * @access protected
     * 
     * @param string $code Code page for find.
     * 
     * @return \App\Models\SiteCorePage|null
     */
    protected function findSitePageByCode($code)
    {
        return $this->findWhereFirst('code', $code);
    }
}