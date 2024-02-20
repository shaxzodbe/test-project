<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Traits\HasRoles;

class Project extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'estimated_cost',
        'responsible_person',
        'local_partner',
    ];

    protected $casts = [
      'estimated_cost' => MoneyCast::class
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
