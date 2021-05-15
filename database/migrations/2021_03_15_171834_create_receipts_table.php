<?php

use App\Models\Receipt;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $statusOptions = Receipt::getEnumValues('status');
        $createdByOptions = Receipt::getEnumValues('created_by');
        Schema::create('receipts', function (Blueprint $table) use ($statusOptions, $createdByOptions) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->string('project');
            $table->foreignId('payment_method_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('category_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            // $table->double('paid', 10, 2);
            $table->enum('status', $statusOptions)->default($statusOptions[0]);
            $table->enum('created_by', $createdByOptions)->default($createdByOptions[0]);
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
        Schema::dropIfExists('receipts');
    }
}
