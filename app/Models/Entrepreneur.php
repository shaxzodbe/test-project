<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entrepreneur extends Model
{
    use HasFactory;

    protected $fillable = [
      'full_name',
      'company_contact_info'
    ];

    public function activitySphere(): BelongsTo
    {
        return $this->belongsTo(ActivitySphere::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
