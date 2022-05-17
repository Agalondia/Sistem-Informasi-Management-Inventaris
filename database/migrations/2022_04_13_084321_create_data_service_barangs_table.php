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
        Schema::create('data_service_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_inventaris')->constrained('data_inventaris');
            $table->string('serial_number_barang');
            $table->string('keterangan_service');
            $table->biginteger('harga_service');
            $table->date('tgl_service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_service_barangs');
    }
};
