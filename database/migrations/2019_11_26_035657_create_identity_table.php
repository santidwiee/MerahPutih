<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identity', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama', 20);
            $table->string('username', 20);
            $table->string('password');
            $table->date('tanggallahir');   
            $table->text('alamat');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->string('umur', 20);
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
        Schema::dropIfExists('identity');
    }
}
