<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number', 50);  // رقم الفاتورة
            $table->date('invoice_Date')->nullable();  // تاريخها
            $table->date('Due_date')->nullable();  // تاريخ الاستحقاق
            $table->string('product', 50);  // المنتج

            $table->decimal('Amount_collection',8,2)->nullable();  //
            $table->decimal('Amount_Commission',8,2);
            $table->decimal('Discount',8,2);  // خصم الفاتورة
            $table->decimal('Value_VAT',8,2);  // قيمة الضريبة
            $table->string('Rate_VAT', 999);   // نسبة الضريبة
            $table->decimal('Total',8,2);  //   ارقام ورقمين بعد الفاصل 8
            $table->string('Status', 50);   // 50 -> حد العمود والا بياخد 255
            $table->integer('Value_Status');   // 1 مدفوعة - غير مدفوعة - مفوعة جزئياً 2 3

            $table->text('note')->nullable();
            $table->date('Payment_Date')->nullable();

            $table->bigInteger( 'section_id' )->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

            $table->softDeletes();

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
        Schema::dropIfExists('invoices');
    }
}
