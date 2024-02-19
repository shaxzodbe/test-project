<?php

use App\Models\ActivitySphere;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->foreignIdFor(ActivitySphere::class)->constrained()->cascadeOnDelete();
            $table->string('country_of_origin');
            $table->json('projects_in_uzbekistan'); // JSON столбец для списка проектов и сканов
            $table->decimal('total_investment', 40, 2); // Пример использования decimal для суммы инвестиций
            $table->text('company_contact_info');
            $table->text('company_reference_list')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investors');
    }
};
