<?php namespace Webmaxx\Forms\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class CreateFeedbacksTable extends Migration
{
    public function up()
    {
        Schema::create('webmaxx_forms_feedbacks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('code')->index();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('comment')->nullable();
            $table->text('page')->nullable();
            $table->boolean('is_new')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('webmaxx_forms_feedbacks');
    }
}
