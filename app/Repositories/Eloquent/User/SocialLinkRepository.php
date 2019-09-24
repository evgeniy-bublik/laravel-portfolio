<?php

namespace App\Repositories\Eloquent\User;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\User\SocialLink;

class SocialLinkRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return
     */
    public function getModelClass()
    {
        return SocialLink::class;
    }
}