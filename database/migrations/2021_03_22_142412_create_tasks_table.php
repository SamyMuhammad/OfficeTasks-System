<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('task_status_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->date('activation_date')->nullable();
            $table->date('closing_date');
            $table->date('status_changing_date');
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
        Schema::dropIfExists('tasks');
    }
}
