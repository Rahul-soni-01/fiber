<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignItemsTable extends Migration
{
    public function up()
    {
        Schema::create('assign_items', function (Blueprint $table) {
            $table->id();
            $table->string('temp')->nullable();               // Temporary info
            $table->string('sr_no_fiber')->nullable();         // Serial number (fiber)
            $table->unsignedBigInteger('cid');                // Category ID or Customer ID
            $table->unsignedBigInteger('scid');               // Sub-category ID
            $table->integer('qty');                           // Quantity
            $table->string('sr_no')->nullable();              // Serial number
            $table->string('emp')->nullable();                // Assigned employee
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assign_items');
    }
}
