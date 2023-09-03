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
        Schema::create('tbl_octo_logistics', function (Blueprint $table) {
            $table->id();
            $table->string('collecPostalCode',10);
            $table->string('delPostalCode',10);
            $table->date('pickDate');
            $table->date('delDate');
            $table->string('itemName',30);
            $table->string('disCode',30);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_octo_logistics');
    }
};
