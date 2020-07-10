<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $fillable = ['translation_lang', 'translation_of', 'name', 'slug', 'photo', 'active'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}