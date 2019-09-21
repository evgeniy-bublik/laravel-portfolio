<?php

namespace App\Repositories\Eloquent\User;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\User\ProfessionalSkill;

class ProfessionalSkillRepository extends BaseRepository
{
    /**
     * {@inheritdoc}
     * 
     * @return
     */
    public function getModelClass()
    {
        return ProfessionalSkill::class;
    }

    /**
     * Get active professional skills.
     * 
     * @return \App\Models\User\ProfessionalSkill[]
     */
    public function getActiveItems()
    {
        return $this->model->active()->orderBy('display_order', 'desc')->get();
    }
}