<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('configurations')) {
          return;
        }
        Schema::create('configurations', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('telephone', 24);
            $table->string('cellphone', 24);
            $table->string('address', 250);
            $table->string('from_email', 250);
            $table->text('home_text');
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
        Schema::dropIfExists('gallery');
    }
}
