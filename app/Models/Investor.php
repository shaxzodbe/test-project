<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Investor extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'activity_sphere_id',
        'country_of_origin',
        'projects_in_uzbekistan',
        'total_investment',
        'company_contact_info',
        'company_reference_list',
    ];

    protected $casts = [
      'projects_in_uzbekistan' => 'array', // JSON столбец будет автоматически преобразован в массив
      'total_investment' => MoneyCast::class,
    ];

    public function activitySphere(): BelongsTo
    {
        return $this->belongsTo(ActivitySphere::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    // Аксессор
    public function getProjectsInUzbekistanAttribute($value)
    {
        return json_decode($value, true);
    }

    // Мутатор
    public function setProjectsInUzbekistanAttribute($value): void
    {
        $this->attributes['projects_in_uzbekistan'] = json_encode($value);
    }
}
