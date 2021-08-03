<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivorcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divorces', function (Blueprint $table) {
            $table->id();
            $table->string('lieu_divorce');
            $table->date('date_divorce');
            $table->string('path');
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('homme_id');
            $table->unsignedBigInteger('femme_id');
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
        Schema::dropIfExists('divorces');
    }
}
