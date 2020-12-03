<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')
                ->constrained('cities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('expertise_area_id')
                ->constrained('expertise_areas')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('name');
            $table->date('birth_date');
            $table->string('cpf', 14);
            $table->string('cell_phone', 15);
            $table->string('email', 150)->nullable();
            $table->string('responsible_name')->nullable();
            $table->unsignedInteger('responsible_cpf')->nullable();
            $table->string('occupation', 150);
            $table->unsignedInteger('available_time');
            // begin LGPD
            $table->ipAddress('ip');
            $table->string('user_agent');
            // end LGPD
            $table->timestamps();
        });
        
        Schema::create('volunteer_week_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_id')
                ->constrained('volunteers')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('week_day_id')
                ->constrained('week_days')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteer_week_days');
        Schema::dropIfExists('volunteers');
    }
}
