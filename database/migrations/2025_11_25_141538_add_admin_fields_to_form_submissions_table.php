<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('form_submissions', function (Blueprint $table) {
            $table->text('admin_notes')->nullable()->after('status');
            $table->timestamp('processed_at')->nullable()->after('admin_notes');
        });
    }

    public function down()
    {
        Schema::table('form_submissions', function (Blueprint $table) {
            $table->dropColumn(['admin_notes', 'processed_at']);
        });
    }
};