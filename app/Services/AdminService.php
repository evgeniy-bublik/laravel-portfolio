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
     * Get list information about me.
     * 
     * @return
     */
    public function getAboutMeInformations()
    {
        return AboutMe::get();
    }

    /**
     * Get information about me by key.
     * 
     * @param strint $key Key about me.
     * 
     * @return App\Models\User\AboutMe
     */
    public function getAboutMeInformationByKey($key)
    {
        return AboutMe::where('key', $key)->first();
    }

    /**
     * Update about me information.
     * 
     * @param App\Models\User\AboutMe $aboutMe About me model.
     * @param string $key Key about me.
     * @param string $value Value about me.
     * 
     * @return bool
     */
    public function updateAboutMeInformation(AboutMe $aboutMe, $key, $value)
    {
        switch ($key) {
            case AboutMe::KEY_EMAILS:
            case AboutMe::KEY_PHONES:
                $value = json_encode(explode(',', $value));
                break;
            default:
                break;
        }

        return $aboutMe->update(['value' => $value]);
    }

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
