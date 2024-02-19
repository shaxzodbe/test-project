<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RegionsChart extends ChartWidget
{
    protected static ?string $heading = 'Regions Chart';

    protected function getData(): array
    {
        // Получаем количество проектов в каждом регионе
        $projectsCount = Project::query()
          ->select('region_id', DB::raw('count(*) as total'))
          ->groupBy('region_id')
          ->pluck('total', 'region_id')
          ->all();

        // Подготовка данных для графика
        $labels = array_keys($projectsCount);
        $values = array_values($projectsCount);

        return [
          'labels' => $labels,
          'datasets' => [
            [
              'label' => 'Projects Count',
              'data' => $values,
              'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
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
