<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('statistics', function (Blueprint $table) {
			$table->id();
			$table->string('country');
			$table->string('country_code')->references('code')->on('countries');
			$table->integer('confirmed');
			$table->integer('recovered');
			$table->integer('critical');
			$table->integer('deaths');
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
		Schema::dropIfExists('statistics');
	}
};
