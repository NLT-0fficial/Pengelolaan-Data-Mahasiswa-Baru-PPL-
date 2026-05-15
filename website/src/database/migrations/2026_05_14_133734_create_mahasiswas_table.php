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
        Schema::create(
            'mahasiswas',
            function (Blueprint $table)
        {

            $table->id();

            $table->foreignId(
                'program_studi_id'
            )
            ->constrained(
                'program_studis'
            )
            ->onDelete(
                'cascade'
            );

            $table->string(
                'nim'
            )->unique();

            $table->string(
                'nama'
            );

            $table->text(
                'alamat'
            );

            $table->string(
                'email'
            )->unique();

            $table->string(
                'no_hp'
            );

            /*
            |--------------------------------------------------------------------------
            | Tambahan baru
            |--------------------------------------------------------------------------
            */

            $table->unsignedTinyInteger(
                'semester'
            );

            $table->string(
                'password'
            );

            $table->enum(
                'status_akun',
                [
                    'Aktif',
                    'Nonaktif'
                ]
            );

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(
            'mahasiswas'
        );
    }
};