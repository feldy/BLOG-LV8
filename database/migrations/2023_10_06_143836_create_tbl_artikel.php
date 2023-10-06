<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblArtikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbl_artikel', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('judul', 100);
            $table->string('author', 36)->nullable(); //relasi
            $table->text('isi');
            $table->string('category', 50)->nullable();
            $table->string('sub_category', 50)->nullable();
            $table->string('sumber', 100)->nullable();
            $table->string('cover', 100)->nullable();;
            $table->integer('viewed')->default(0);
            $table->boolean('is_publish')->default(1);
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
        Schema::dropIfExists('tbl_artikel');
    }
}
