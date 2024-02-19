<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ActivitySphere extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function investors(): HasMany
    {
        return $this->hasMany(Investor::class);
    }
}
