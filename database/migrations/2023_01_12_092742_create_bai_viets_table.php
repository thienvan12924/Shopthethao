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

            Schema::create('bai_viets', function (Blueprint $table) {
                $table->id();
                $table->string('tieu_de');
                $table->longText('noi_dung');
                $table->integer('admin_id');
                $table->longText('hinh_anh');
                $table->integer('chuyenmuc_id');
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
        Schema::dropIfExists('bai_viets');
    }
};
