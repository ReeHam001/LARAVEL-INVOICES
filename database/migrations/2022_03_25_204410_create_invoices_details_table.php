<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_Invoice');  // id الفاتورة
            $table->string('invoice_number', 50);
            $table->foreign('id_Invoice')->references('id')->on('invoices')->onDelete('cascade');
            $table->string('product', 50);
            $table->string('Section', 999);
            $table->string('Status', 50);   // حالة الفاتورة مدفوعة - غير مدفوعة
            $table->integer('Value_Status');  // 1 - غير مدفوعة
            $table->date('Payment_Date')->nullable();
            $table->text('note')->nullable();
            $table->string('user',300);  // مين يلي ضاف الفاتورة
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
        Schema::dropIfExists('invoices_details');
    }
}
