<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_forms',function(Blueprint $table){
            $table->increments('id');
            $table->string('NID',64);
            $table->string('gender',30);
            $table->string('fname',30);
            $table->string('faname',30);
            $table->string('gfaname',30);
            $table->string('lname',30);
            $table->string('birth_date',30);
            $table->string('nationality',64);
            $table->integer('phone',false,true);
            $table->integer('cellphone',false,true);
            $table->string('email',255);
            $table->string('qualification',255);
            $table->string('major',255);
            $table->string('department',255);
            $table->string('section',255);
            $table->integer('employee_ID',false,true);
            $table->boolean('is_contract');
            $table->string('job_title',255);
            $table->string('supervisor',255);
            $table->string('su_email',255);
            $table->integer('su_phone',false,true);
            $table->integer('su_cellphone',false,true);

            $table->string('center',255);
            $table->boolean('el_exams_Before');
            $table->integer('el_exams_num',false,true);
            $table->boolean('other_exams_Before');
            $table->longText('other_exams');


            $table->string('IBAN',30);
            $table->string('bank_name',255);
            $table->string('account_holder_name',255);

            $table->string('emergency_name',255);
            $table->string('emer_relation',25);
            $table->integer('emer_cellphone',false,true);

            $table->timestamps();
            $table->string('center_name');
            //$table->integer('user_id',false,true)->index();

            $table->text('job_identity_file');

            $table->unique('NID');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reg_forms');
    }
}
