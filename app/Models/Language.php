<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['abbr', 'locale', 'name', 'flag', 'direction', 'active'];


    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'name', 'abbr', 'direction', 'flag', 'active');
    }
}