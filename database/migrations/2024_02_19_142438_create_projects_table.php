<?php

use App\Models\ActivitySphere;
use App\Models\Investor;
use App\Models\Region;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(ActivitySphere::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Region::class)->constrained()->cascadeOnDelete();
            $table->decimal('estimated_cost', 40, 2);
            $table->unsignedBigInteger('potential_investor_id')->nullable(); // Добавление столбца перед ограничением внешнего ключа
            $table->string('responsible_person');
            $table->string('local_partner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
