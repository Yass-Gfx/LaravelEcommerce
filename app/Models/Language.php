<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['abbr', 'locale', 'name', 'direction', 'active'];


    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'name', 'abbr', 'direction', 'active');
    }

    public function getActive()
    {
        return $this->active == 1 ? __('messages.Active') : __('messages.Inactive');
    }
    public function getDirection()
    {
        return $this->direction == 'rtl' ? __('messages.Right to Left') : __('messages.Left to Right');
    }
}