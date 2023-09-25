<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('danh_mucs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_danh_muc');
            $table->string('ten_danh_muc');
            $table->string('slug_danh_muc');
            $table->integer('is_open');
            $table->integer('id_danh_muc_cha');
            $table->string('hinh_anh')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('danh_mucs');
    }
};
