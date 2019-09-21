<?php

namespace App\Repositories\Eloquent\Core;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Support;

class SupportRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return
     */
    public function getModelClass()
    {
        return Support::class;
    }
}
