<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('engineer_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->enum('priority', ['ALTA', 'MEDIA', 'BAJA'])->nullable();
            $table->mediumText('activity')->nullable();
            $table->text('notes')->nullable();
            $table->string('folio')->nullable();
            $table->boolean('archived')->nullable();

            $table->timestamps();

            //Relation
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('engineer_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
