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
        Schema::create('klanten', function (Blueprint $table) {
            $table->id('KlantId');
            $table->string('Naam');
            $table->string('Email')->unique();
            $table->string('Wachtwoord');
            $table->string('Telefoon')->nullable();
            $table->string('Adres');
            $table->string('Postcode');
            $table->string('Rechten')->default('user');
            $table->timestamps();
        });

        Schema::create('fietsen', function (Blueprint $table) {
            $table->id('FietsId');
            $table->string('Naam');
            $table->decimal('Prijs', 10, 2);
            $table->integer('Voorraad');
            $table->string('Productcategorieën');
            $table->string('Merk');
            $table->string('SN')->unique();
            $table->string('FrameMateriaal');
            $table->string('BatterijTypen')->nullable();
            $table->string('WielMaat');
            $table->string('Versnelling');
            $table->string('KleurVarianten');
            $table->integer('GarantieInMaand');
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id('ImageId');
            $table->foreignId('FietsId')->constrained('fietsen')->onDelete('cascade');
            $table->string('Src');
            $table->integer('Positie');
            $table->timestamps();
        });

        Schema::create('accessoires', function (Blueprint $table) {
            $table->id('AccessoireId');
            $table->string('Naam');
            $table->decimal('Prijs', 10, 2);
            $table->text('Beschrijving');
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id('ReviewId');
            $table->foreignId('KlantId')->constrained('klanten')->onDelete('cascade');
            $table->foreignId('FietsId')->nullable()->constrained('fietsen')->onDelete('cascade');
            $table->foreignId('AccessoireId')->nullable()->constrained('accessoires')->onDelete('cascade');
            $table->integer('SterrenAantal');
            $table->date('Datum');
            $table->text('Beschrijving');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderId');
            $table->foreignId('KlantId')->constrained('klanten')->onDelete('cascade');
            $table->date('Datum');
            $table->decimal('TotalPrijs', 10, 2);
            $table->foreignId('FietsId')->nullable()->constrained('fietsen')->onDelete('cascade');
            $table->foreignId('AccessoireId')->nullable()->constrained('accessoires')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('accessoires');
        Schema::dropIfExists('images');
        Schema::dropIfExists('fietsen');
        Schema::dropIfExists('klanten');
    }
};
