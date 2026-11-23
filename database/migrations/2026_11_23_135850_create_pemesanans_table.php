<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->restrictOnDelete();
            $table->foreignId('kamar_id')->constrained('kamars')->restrictOnDelete();
            $table->date('tanggal_pemesanan');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->unsignedInteger('jumlah_malam');
            $table->decimal('harga_per_malam', 12, 2);
            $table->decimal('total_harga', 12, 2);
            $table->string('status')->default('menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
