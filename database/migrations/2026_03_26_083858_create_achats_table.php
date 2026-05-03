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
    Schema::create('achats', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('client_id');
        $table->unsignedBigInteger('produit_id'); // ← زيدتيه
        $table->decimal('montant', 10, 2);
        $table->integer('points_gagnes');
        $table->integer('points_utilises')->default(0);
        $table->timestamps();

        $table->foreign('client_id')
              ->references('idClient')
              ->on('clients')
              ->onDelete('cascade');

        $table->foreign('produit_id')
              ->references('idProduit')
              ->on('produits')
              ->onDelete('cascade');
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achats');
    }
};
