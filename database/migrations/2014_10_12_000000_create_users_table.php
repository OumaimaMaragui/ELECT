<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('challenge_id')->nullable();
            $table->foreign('challenge_id')->references('id')->on('challenges');
            $table->unsignedInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->string('nom');
            $table->string('prenom');
            $table->string('client');
            $table->string('abonnement');
            $table->string('compteur');
            $table->string('cin');
            $table->string('email');
            $table->string('password');
            $table->string('telephone');
            $table->string('ville');
            $table->string('rue');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
