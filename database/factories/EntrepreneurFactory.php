<?php

namespace Database\Factories;

use App\Models\ActivitySphere;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entrepreneur>
 */
class EntrepreneurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'full_name' => $this->faker->name,
          'activity_sphere_id' => ActivitySphere::inRandomOrder()->first()->id, // Предполагается, что у вас уже есть записи в таблице activity_spheres
          'region_id' => Region::inRandomOrder()->first()->id, // Предполагается, что у вас уже есть записи в таблице regions
          'company_contact_info' => $this->faker->address,
        ];
    }
}
