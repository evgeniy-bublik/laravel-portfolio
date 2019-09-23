<?php

namespace App\Repositories\Eloquent\User;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\User\AboutMe;

class AboutMeRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return
     */
    public function getModelClass()
    {
        return AboutMe::class;
    }

    /**
     * Get model by key.
     * 
     * @param string $key Key row about me.
     * 
     * @return \App\Models\User\AboutMe|null
     */
    public function getModelByKey($key)
    {
        return $this->model->where('key', $key)->first();
    }
}