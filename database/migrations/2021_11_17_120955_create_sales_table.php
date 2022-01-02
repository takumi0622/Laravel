<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('sales')) {
                        Schema::create('sales', function (Blueprint $table) {
                            $table->bigIncrements('id');
                            $table->integer('product_id');
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
        Schema::dropIfExists('sales');
    }
}


// <?php

// use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Migrations\Migration;

// class CreateSalesTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         if (!Schema::hasTable('sales')) {
//             Schema::create('sales', function (Blueprint $table) {
//                 $table->bigIncrements('id');
//                 $table->integer('product_id');
//                 $table->timestamps();
//             });
//         }
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('sales');
//     }
// }