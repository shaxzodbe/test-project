<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    const ROLE_PENDING = 0;
    const ROLE_PROCESSING = 1;
    const ROLE_CLOSED = 2;
}
