<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostumerShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumer_shipping_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('costumer_email', 35)->index();
            $table->string('address', 50);
            $table->string('kecamatan', 20);
            $table->string('kotamadya', 20);
            $table->string('provinsi', 20);
            $table->string('postal_code', 6);
            $table->string('receiver_name', 20);
            $table->string('receiver_phone_number', 18);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costumer_shipping_addresses');
    }
}
