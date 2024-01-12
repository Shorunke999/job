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
        Schema::create('party', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('partyid', 11);
            $table->string('partyname', 11);
            $table->timestamps(); // This will add 'created_at' and 'updated_at' columns
            $table->unique('id');
        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('party');
    }
};
