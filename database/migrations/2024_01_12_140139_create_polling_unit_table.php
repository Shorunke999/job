<?php

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
        Schema::create('polling_unit', function (Blueprint $table) {
            $table->bigIncrements('uniqueid');
            $table->integer('polling_unit_id');
            $table->integer('ward_id');
            $table->integer('lga_id');
            $table->integer('uniquewardid')->nullable();
            $table->string('polling_unit_number', 50)->nullable();
            $table->string('polling_unit_name', 50)->nullable();
            $table->text('polling_unit_description')->nullable();
            $table->string('lat', 255)->nullable();
            $table->string('long', 255)->nullable();
            $table->string('entered_by_user', 50)->nullable();
            $table->dateTime('date_entered')->nullable();
            $table->string('user_ip_address', 50)->nullable();
            $table->timestamps(); // This will add 'created_at' and 'updated_at' columns
            $table->unique('uniqueid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polling_unit');
    }
};
