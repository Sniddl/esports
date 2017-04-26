<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->longtext('json');
            $table->timestamps();
        });

        DB::table('colors')->insert([
          'name' => 'primary',
          'json' => '{"hsl":{"h":205.22292993630577,"s":0.9921,"l":0.498,"a":1},"hex":"#0193FD","rgba":{"r":1,"g":147,"b":253,"a":1},"hsv":{"h":205.22292993630577,"s":0.9960343356257216,"v":0.9920658,"a":1},"oldHue":205.22292993630575,"source":"hsl","a":1}'
        ]);

        DB::table('colors')->insert([
          'name' => 'info',
          'json' => '{"hsl":{"h":191.46496815286628,"s":0.7414000000000001,"l":0.7117,"a":1},"hex":"#7FD7EC","rgba":{"r":127,"g":215,"b":236,"a":1},"hsv":{"h":191.46496815286628,"s":0.46193015641480906,"v":0.92544562,"a":1},"oldHue":191.46496815286625,"source":"hsl","a":1}'
        ]);

        DB::table('colors')->insert([
          'name' => 'warning',
          'json' => '{"hsl":{"h":49.3548387096774,"s":1,"l":0.5144444444444445,"a":1},"hex":"#FFD307","rgba":{"r":255,"g":211,"b":7,"a":1},"hsv":{"h":49.3548387096774,"s":0.9711111111111111,"v":1,"a":1},"oldHue":49.354838709677416,"source":"rgb","a":1}'
        ]);

        DB::table('colors')->insert([
          'name' => 'success',
          'json' => '{"hsl":{"h":115.64516129032258,"s":0.5384615384615384,"l":0.4508064516129033,"a":1},"hex":"#3EB135","rgba":{"r":62,"g":177,"b":53,"a":1},"hsv":{"h":115.64516129032258,"s":0.7,"v":0.6935483870967742,"a":1},"oldHue":115.64516129032258,"source":"rgb","a":1}'
        ]);

        DB::table('colors')->insert([
          'name' => 'danger',
          'json' => '{"hsl":{"h":0,"s":0.6990525729147317,"l":0.517652329749104,"a":1},"hex":"#DA2E2E","rgba":{"r":218,"g":46,"b":46,"a":1},"hsv":{"h":0,"s":0.7888888888888889,"v":0.8548387096774194,"a":1},"oldHue":0,"source":"rgb","a":1}'
        ]);

        DB::table('colors')->insert([
          'name' => 'background',
          'json' => '{"hsl":{"h":240,"s":0.10429447852760734,"l":0.1898745519713262,"a":1},"hex":"#2B2B35","rgba":{"r":43,"g":43,"b":53,"a":1},"hsv":{"h":240,"s":0.18888888888888886,"v":0.20967741935483872,"a":1},"oldHue":240,"source":"rgb","a":1}'
        ]);

        DB::table('colors')->insert([
          'name' => 'panel-headers',
          'json' => '{"hsl":{"h":253.8461538461539,"s":0.08303249097472927,"l":0.3052956989247312,"a":1},"hex":"#4A4754","rgba":{"r":74,"g":71,"b":84,"a":1},"hsv":{"h":253.8461538461539,"s":0.1533333333333334,"v":0.33064516129032256,"a":1},"oldHue":253.84615384615387,"source":"rgb","a":1}'
        ]);

        DB::table('colors')->insert([
          'name' => 'foreground',
          'json' => '{"hsl":{"h":230.7692307692308,"s":0.10974106041923555,"l":0.22527777777777777,"a":1},"hex":"#333540","rgba":{"r":51,"g":53,"b":64,"a":1},"hsv":{"h":230.7692307692308,"s":0.19777777777777783,"v":0.25,"a":1},"oldHue":230.7692307692308,"source":"rgb","a":1}'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colors');
    }
}
