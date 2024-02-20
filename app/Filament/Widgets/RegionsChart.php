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
        $regionsData = Project::query()
          ->join('regions', 'projects.region_id', '=', 'regions.id')
          ->select('regions.title', DB::raw('count(*) as total'))
          ->groupBy('regions.title')
          ->get()
          ->mapWithKeys(function ($item) {
              return [$item['title'] => $item['total']];
          })
          ->toArray();

        $labels = array_keys($regionsData);
        $values = array_values($regionsData);

        return [
          'labels' => $labels,
          'datasets' => [
            [
              'label' => 'Project count in Regions',
              'data' => $values,
              'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
              'borderColor' => 'rgba(54, 162, 235, 1)',
              'fill' => true,
            ],
          ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
