<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class IndustriesChart extends ChartWidget
{
    protected static ?string $heading = 'Sphere Chart';

    protected function getData(): array
    {
        // Агрегация количества проектов по сферам деятельности
        $activitySpheresData = Project::query()
          ->join('activity_spheres', 'projects.activity_sphere_id', '=', 'activity_spheres.id')
          ->select('activity_spheres.title', DB::raw('count(*) as total'))
          ->groupBy('activity_spheres.title')
          ->get()
          ->mapWithKeys(function ($item) {
              return [$item['title'] => $item['total']];
          })
          ->toArray();

        return [
          'labels' => array_keys($activitySpheresData),
          'datasets' => [
            [
              'label' => 'Number of Projects',
              'data' => array_values($activitySpheresData),
                // Настройте визуальные аспекты вашей диаграммы здесь
              'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
              'borderColor' => 'rgba(54, 162, 235, 1)',
              'borderWidth' => 1,
            ],
          ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
