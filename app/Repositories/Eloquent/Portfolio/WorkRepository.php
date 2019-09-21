<?php

namespace App\Repositories\Eloquent\Portfolio;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Portfolio\Work;

class WorkRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return
     */
    public function getModelClass()
    {
        return Work::class;
    }

    /**
     * Get active portfolio works.
     * 
     * @return \App\Models\Portfolio\Work[]
     */
    public function getActiveItems()
    {
        return $this->model->active()->orderBy('date', 'desc')->paginate();
    }
}