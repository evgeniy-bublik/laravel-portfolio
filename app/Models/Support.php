<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    /**
     * {@inheritdoc}
     * 
     * @access protected
     * 
     * @var array $fillable.
     */
    protected $fillable = [
        'name',
        'email',
        'site',
        'subject',
        'text',
        'ip',
        'user_agent',
    ];
}
