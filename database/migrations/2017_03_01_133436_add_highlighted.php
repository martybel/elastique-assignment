<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHighlighted extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books',function(Blueprint $table) {
          $table->tinyInteger('highlighted')->default(0);
        });

        \Illuminate\Support\Facades\DB::query('UPDATE books SET highlighted = round(RAND())');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('books',function(Blueprint $table) {
        $table->dropColumn(['highlighted']);
      });
    }
}
