<?php

use App\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Status::create([
            'name' => 'Order Placed',
            'percent' => 10,
        ]);

        Status::create([
            'name' => 'Prep',
            'percent' => 30,
        ]);

        Status::create([
            'name' => 'Bake',
            'percent' => 50,
        ]);

        Status::create([
            'name' => 'Quality Check',
            'percent' => 70,
        ]);

        Status::create([
            'name' => 'Out for Delivery',
            'percent' => 100,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
