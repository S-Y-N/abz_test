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
            $table->id();
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('position_id');
            $table->string('first_name',128);
            $table->string('middle_name',128);
            $table->string('last_name',128);
            $table->string('email',128)->unique();
            $table->string('password',256);;
            $table->string('phone',36);
            $table->string('photo')->default('user.png');

            $table->date('birth_day');

            $table->timestamps();

            //IDX
            $table->index('gender_id',name:'user_gender_idx');
            $table->index('city_id',name:'user_city_idx');
            $table->index('position_id',name:'user_position_idx');

            //FK
            $table->foreign('gender_id',name:'user_gender_fk')->on('genders')->references('id');
            $table->foreign('city_id',name:'user_city_fk')->on('cities')->references('id');
            $table->foreign('position_id',name:'user_position_fk')->on('positions')->references('id');

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
