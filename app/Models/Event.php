<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    public function workshops(): HasMany
    {
        return $this->hasMany(Workshop::class);
    }

    public function scopeFuture(Builder $builder)
    {
        return $builder->whereHas('workshops', function($query) {
            $query->where('start', '>=', Carbon::now());
        });
    }
}
