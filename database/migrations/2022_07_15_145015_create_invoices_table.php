<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('berita_id');
            $table->integer("kode_invoice");
            $table->string('untuk_keperluan');
            $table->string('unit_kerja');
            $table->integer('total');
            $table->string('uraian');
            $table->string('kode_mata_angsuran');
            $table->string('jumlah_angsuran');
            $table->string('realisasi');
            $table->integer('sisa_anggaran');
            $table->string('permintaan');
            $table->string('metode_pembayaran');
            $table->string('status');
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
};
