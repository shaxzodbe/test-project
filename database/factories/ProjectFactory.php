<?php

namespace Database\Factories;

use App\Models\ActivitySphere;
use App\Models\Investor;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name' => $this->faker->sentence,
          'activity_sphere_id' => ActivitySphere::inRandomOrder()->first()->id, // Предполагается, что у вас уже есть записи в таблице activity_spheres
          'region_id' => Region::inRandomOrder()->first()->id, // Предполагается, что у вас уже есть записи в таблице regions
          'estimated_cost' => $this->faker->randomFloat(2, 100000, 10000000),
          'potential_investor_id' => rand(0, 1) ? optional(Investor::inRandomOrder()->first())->id : null,
          'responsible_person' => $this->faker->name,
          'local_partner' => $this->faker->company,
        ];
    }
}
