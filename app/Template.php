<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 * @package App
 *
 * @property string $slug
 */
class Template extends Model
{
    protected $fillable = [
        'name', 'slug', 'preview_img'
    ];
}
