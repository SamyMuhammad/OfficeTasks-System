<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->string('description');
            $table->double('price', 10, 2);
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
        Schema::dropIfExists('receipt_service');
    }
}
