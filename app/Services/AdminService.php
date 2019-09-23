<?php

namespace App\Services;

use App\Models\User\AboutMe;
use App\Models\SiteCorePage;
use App\Models\User\ProfessionalSkill;
use App\Models\User\SocialLink;

/**
 * Admin service class.
 */
class AdminService
{
    /**
     * Update site core page meta information.
     * 
     * @param App\Models\SiteCorePage $page Site core page model.
     * @param array $data Request site core page meta information.
     * 
     * @return bool 
     */
    public function updateSiteCorePageMetaInformation(SiteCorePage $page, $data)
    {
        return $page->update($data);
    }

    /**
     * Create professional skill.
     * 
     * @param array $data Request professiona skill data.
     * 
     * @return
     */
    public function createProfessioanlSkill($data)
    {  
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        return ProfessionalSkill::create($data);
    }

    /**
     * Update professional skill.
     * 
     * @param App\Models\User\ProfessionalSkill $skill Professional skill model.
     * @param array $data Request professiona skill data.
     * 
     * @return bool
     */
    public function updateProfessionalSkill(ProfessionalSkill $skill, $data)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        return $skill->update($data);
    }

    /**
     * Create social link.
     * 
     * @param array $data Request professiona skill data.
     * 
     * @return
     */
    public function createSocialLink($data)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        return SocialLink::create($data);
    }

    /**
     * Update social link.
     * 
     * @param App\Models\User\SocialLink $link Social link model.
     * @param array $data Request social link data.
     * 
     * @return bool
     */
    public function updateSocialLink(SocialLink $link, $data)
    {
        $data[ 'active' ] = (is_null($data[ 'active' ])) ? 0 : 1;

        return $link->update($data);
    }
}
