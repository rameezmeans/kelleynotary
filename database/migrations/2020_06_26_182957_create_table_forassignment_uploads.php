<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableForassignmentUploads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_uploads', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('message_from');
            $table->foreign('message_from')->references('id')->on('users');
            
            $table->string('hash');
            $table->string('assignment_type');
            $table->text('message');
            $table->text('file');

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
        Schema::dropIfExists('assignment_uploads');
    }
}
