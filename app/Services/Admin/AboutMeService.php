<?php

namespace App\Services\Admin;

use App\Models\User\AboutMe;

class AboutMeService
{
    /**
     * Get modify value for model by key.
     * 
     * @param string $key Model key.
     * @param string $value Model value from request.
     * 
     * @return string
     */
    public function getModifyValueByKey($key, $value)
    {
        switch ($key) {
            case AboutMe::KEY_EMAILS:
            case AboutMe::KEY_PHONES:
                return json_encode(explode(',', $value));
            default:
                return $value;
        }
    }
}
