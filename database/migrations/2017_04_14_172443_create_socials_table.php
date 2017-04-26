<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->unique();
          $table->string('type')->default('Social');
          $table->timestamps();
          $table->softDeletes();
        });

        DB::table('socials')->insert([
          'name' => 'Reddit',
        ]);

        DB::table('socials')->insert([
          'name' => 'Twitter',
        ]);

        DB::table('socials')->insert([
          'name' => 'Instagram',
        ]);

        DB::table('socials')->insert([
          'name' => 'Facebook',
        ]);

        DB::table('socials')->insert([
          'name' => 'Google-Plus',
        ]);

        DB::table('socials')->insert([
          'name' => 'YouTube',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socials');
    }
}
