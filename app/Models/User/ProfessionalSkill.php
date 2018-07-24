<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Model for table `prefessional_skills`.
 */
class ProfessionalSkill extends Model
{
    /**
     * Scope for get professional skills by active field.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }
}
