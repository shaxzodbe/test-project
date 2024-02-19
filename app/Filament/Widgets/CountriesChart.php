<?php

namespace App\Filament\Widgets;

use App\Models\Investor;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class CountriesChart extends ChartWidget
{
    protected static ?string $heading = 'Countries Chart';

    protected function getData(): array
    {
        $investorsByCountry = Investor::query()
          ->select('country_of_origin', DB::raw('count(*) as total'))
          ->groupBy('country_of_origin')
          ->pluck('total', 'country_of_origin');

        // Преобразуем полученные данные для использования в графике
        $labels = $investorsByCountry->keys()->toArray();
        $data = $investorsByCountry->values()->toArray();

        return [
          'datasets' => [
            [
              'label' => 'Number of Investors by Country',
              'data' => $data,
              'backgroundColor' => array_fill(0, count($data), 'rgba(54, 162, 235, 0.5)'),
              'borderColor' => array_fill(0, count($data), 'rgba(54, 162, 235, 1)'),
              'borderWidth' => 1,
            ],
          ],
          'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
