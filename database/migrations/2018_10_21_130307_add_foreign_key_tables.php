<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cab_factura', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('usuario_id')->references('id')->on('users');
        });
        Schema::table('det_factura', function (Blueprint $table) {
            $table->foreign('cab_factura_id')->references('id')->on('cab_factura');
            $table->foreign('producto_id')->references('id')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cab_factura', function (Blueprint $table) {
            $table->dropForeign('cab_factura_cliente_id_foreign');
            $table->dropForeign('cab_factura_usuario_id_foreign');
        });
        Schema::table('det_factura', function (Blueprint $table) {
            $table->dropForeign('det_factura_cab_factura_id_foreign');
            $table->dropForeign('det_factura_producto_id_foreign');
        });
    }
}
