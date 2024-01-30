<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $slug
 * @property numeric $value
 */
class Characteristic extends Model
{
    protected $table = 'characteristics';

    protected $fillable = [
        'title',
        'slug',
        'value'
    ];
}
