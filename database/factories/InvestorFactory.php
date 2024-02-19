<?php

namespace Database\Factories;

use App\Models\ActivitySphere;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Investor>
 */
class InvestorFactory extends Factory
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
          'country_of_origin' => $this->faker->country,
          'projects_in_uzbekistan' => [
            [
              'project_name' => $this->faker->words(3, true),
              'signed_agreements' => $this->faker->imageUrl(),
            ]
          ],
          'total_investment' => $this->faker->randomFloat(2, 100000, 10000000), // Сгенерирует десятичное число с двумя знаками после запятой в диапазоне от 100000 до 100000000
          'company_contact_info' => $this->faker->phoneNumber,
          'company_reference_list' => $this->faker->optional()->sentences(3, true), // Генерирует null или строку из трех предложений
        ];
    }
}
