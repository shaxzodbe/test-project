<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Permission\Traits\HasRoles;

class ActivitySphere extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['title'];

    public function investors(): HasMany
    {
        return $this->hasMany(Investor::class);
    }

    public function entrepreneurs(): HasMany
    {
        return $this->hasMany(Entrepreneur::class);
    }
}
