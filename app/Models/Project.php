<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'estimated_cost',
        'responsible_person',
        'local_partner',
    ];

    public function activitySphere(): BelongsTo
    {
        return $this->belongsTo(ActivitySphere::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function potentialInvestor(): BelongsTo
    {
        return $this->belongsTo(Investor::class, 'potential_investor_id');
    }
}
