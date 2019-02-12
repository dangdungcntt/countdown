<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Site
 * @package App
 *
 * @property integer $author
 */
class Site extends Model
{
    protected $table = 'sites';

    protected $fillable = [
        'name', 'slug', 'template_id', 'author_id', 'data'
    ];

    protected $casts = [
        'is_draft' => 'boolean',
        'data' => 'array'
    ];

    //relationships
    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    //static function
    public static function findByField($field, $value, $fail = false) {
        return self::query()->where($field, $value)->{$fail ? 'firstOrFail' : 'first'}();
    }
}
