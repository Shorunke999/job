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
        Schema::create('announced_pu_results', function (Blueprint $table) {
            $table->bigIncrements('result_id');
            $table->string('polling_unit_uniqueid', 50);
            $table->char('party_abbreviation', 4);
            $table->integer('party_score');
            $table->string('entered_by_user', 50);
            $table->dateTime('date_entered');
            $table->string('user_ip_address', 50);
            $table->timestamps(); // This will add 'created_at' and 'updated_at' columns
            $table->unique('result_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announced_pu_results');
    }
};
