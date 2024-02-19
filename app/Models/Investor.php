<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
      'total_investment' => 'decimal:2', // Указывает, что значение должно быть преобразовано в десятичное с двумя знаками после запятой
    ];

    public function activitySphere(): BelongsTo
    {
        return $this->belongsTo(ActivitySphere::class);
    }
}
