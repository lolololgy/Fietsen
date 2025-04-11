<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('fietsen', function (Blueprint $table) {
            $table->text('Beschrijving')->nullable()->after('Prijs'); // nullable voorkomt problemen met bestaande data
        });
    }

    public function down()
    {
        Schema::table('fietsen', function (Blueprint $table) {
            $table->dropColumn('Beschrijving');
        });
    }
};
