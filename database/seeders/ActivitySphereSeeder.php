<?php

namespace Database\Seeders;

use App\Models\ActivitySphere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySphereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
          'Stock Market',
          'Bonds',
          'Real Estate',
          'Mutual Funds',
          'Exchange-Traded Funds (ETFs)',
          'Commodities',
          'Private Equity',
          'Hedge Funds',
          'Venture Capital',
          'Cryptocurrencies',
          'Foreign Exchange (Forex)',
          'Collectibles and Art',
          'Peer-to-Peer Lending',
          'Startups',
          'Sustainable and Responsible Investing',
          'Derivatives (Options, Futures)',
          'Precious Metals (Gold, Silver)',
          'Fixed Income Securities',
          'Insurance Products (Annuities)',
          'Cash and Cash Equivalents',
        ];

        foreach ($activities as $activity) {
            ActivitySphere::create(['title' => $activity]);
        }
    }
}
