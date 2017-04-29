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
          $table->string('base_url')->unique();
          $table->string('type')->default('Social');
          $table->timestamps();
          $table->softDeletes();
        });

        DB::table('socials')->insert([
          'name' => 'Reddit',
          'base_url' => 'https://reddit.com/u/'
        ]);

        DB::table('socials')->insert([
          'name' => 'Twitter',
          'base_url' => 'https://twitter.com/'
        ]);

        DB::table('socials')->insert([
          'name' => 'Instagram',
          'base_url' => 'https://instagram.com/'
        ]);

        DB::table('socials')->insert([
          'name' => 'Facebook',
          'base_url' => 'https://facebook.com/'
        ]);

        DB::table('socials')->insert([
          'name' => 'Google-Plus',
          'base_url' => 'https://plus.google.com/'
        ]);

        DB::table('socials')->insert([
          'name' => 'YouTube',
          'base_url' => 'https://youtube.com/'
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
