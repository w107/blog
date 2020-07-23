<?php

namespace Inn20\Blog\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }

    public function scopeRecent(Builder $query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeReverseOrder(Builder $query)
    {
        return $query->orderBy('order', 'desc');
    }

}