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
        Schema::create('cotacao_frete', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('transportadora_id');
            $table->string('uf', 2);
            $table->decimal('percentual_cotacao', 10,2);
            $table->decimal('valor_extra', 10,2);
            $table->foreign('transportadora_id')
                ->references('id')
                ->on('transportadora')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('cotacao_frete');
    }
};
