<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Cek dulu apakah column sudah ada
        if (!Schema::hasColumn('forms', 'file_size')) {
            Schema::table('forms', function (Blueprint $table) {
                $table->bigInteger('file_size')->default(0)->after('file_path');
            });
        }
    }

    public function down()
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->dropColumn('file_size');
        });
    }
};