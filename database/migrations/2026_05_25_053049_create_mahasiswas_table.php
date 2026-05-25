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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->char('npm', 10)->unique();
            $table->string('nama', 100);
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable(); // L = Laki-laki, P = Perempuan
            $table->text('alamat')->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('prodi_id')->constrained('prodis')->onDelete('restrict');
            $table->timestamps();
        });
    }

    //
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
