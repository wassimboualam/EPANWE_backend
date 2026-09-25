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
        Schema::create('partnership_requests', function (Blueprint $table) {
            $table->id();


            // ---- Informations sur l'entreprise ---------------------------------
            $table->string('company_name');
            $table->string('ice', 20)->unique();         // Identifiant Commun de l'Entreprise
            $table->string('address');
            $table->string('phone_number', 30);
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('legal_form', 50);            // Entreprise privée, Association, …
            $table->string('activity_field', 100);       // Éducation, Social, BTP, …
            $table->text('description')->nullable();

            // ---- Contact référent ----------------------------------------------
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone_number', 30);

            // ---- Détails du partenariat ----------------------------------------
            $table->string('age_range', 20)->nullable(); // 8- 12, 13- 17, 18- 25, 26- 100
            $table->unsignedInteger('number_of_users')->nullable();

            $table->timestamps();

            // ---- Index ---------------------------------------------------------
            $table->index('company_name');
            $table->index('email');
            $table->index('activity_field');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnership_requests');
    }
};
