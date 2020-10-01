<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->String('size')->nullable();
            $table->String('sleep_time')->nullable();
            $table->String('care_item1')->nullable();
            $table->String('care_item2')->nullable();
            $table->String('care_item3')->nullable();
            $table->String('care_item4')->nullable();
            $table->String('alcohol')->nullable();
            $table->String('stress')->nullable();
            $table->String('remarks', 200)->nullable();
            $table->text('public_id')->nullable();
            $table->text('image_path')->nullable();
            $table->date('day');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
