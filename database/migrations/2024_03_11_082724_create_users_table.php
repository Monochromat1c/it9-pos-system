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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('first_name',55);
            $table->string('middle_name',55)->nullable();
            $table->string('last_name',55);
            $table->string('suffix_name',55);
            $table->string('birth_date');
            $table->unsignedBigInteger('gender_id');
            $table->string('address',55);
            $table->string('contact_number',55);
            $table->string('email_address',55);
            $table->string('username',55)->unique();
            $table->string('password',255);
            $table->timestamps();

            $table->foreign('gender_id') //1st parenthesis column of the f key in the table
            ->references('gender_id') // 2nd the column what column the f key from the table of genders
            ->on('genders') //name of table where the f key from
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
