<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePapers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {	if(!Schema::hasTable('papers')){
			Schema::create('papers', function (Blueprint $table) {
			   $table->increments('id');
			   $table->string('title', 150);
			   $table->text('text');
               $table->string('discr', 440);
			   $table->integer('contview')->nullable();
			   $table->timestamps();
			});
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papers');
    }
}
