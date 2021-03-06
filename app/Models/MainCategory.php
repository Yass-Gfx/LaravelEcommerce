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

    public function scopeSelection($query)
    {
        return $query->select('id', 'translation_lang', 'translation_of', 'name', 'slug', 'photo', 'active');
    }

    public function getActive()
    {
        return $this->active == 1 ? __('messages.Active') : __('messages.Inactive');
    }

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";
    }
}