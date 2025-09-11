<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('scb_account')->nullable();
            $table->string('cell_no')->nullable();
            $table->string('etin')->nullable();
            $table->date('dob')->nullable();
            $table->date('marriage_date')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('passport_place_issue')->nullable();
            $table->date('passport_expiry')->nullable();
            $table->string('nationality')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nid')->nullable();
            $table->string('nid_place_issue')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('passport_photo')->nullable();
            $table->string('signature')->nullable();
            // Address fields
            $table->string('present_house_no')->nullable();
            $table->string('present_road_no')->nullable();
            $table->string('present_apt_no')->nullable();
            $table->string('present_building')->nullable();
            $table->string('present_area')->nullable();
            $table->string('present_district')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('home_district')->nullable();
            // Family fields
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();
            // Emergency contact
            $table->string('emergency_name')->nullable();
            $table->string('emergency_relation')->nullable();
            $table->string('emergency_address')->nullable();
            $table->string('emergency_telephone')->nullable();
            $table->string('emergency_mobile')->nullable();
            // Reference
            $table->string('ref_name')->nullable();
            $table->string('ref_designation')->nullable();
            $table->text('ref_org')->nullable();
            $table->unsignedBigInteger('form_id')->nullable();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('set null');
            $table->timestamps();
        });
        // Dynamic grid tables will be separate for normalization
        Schema::create('employee_children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->timestamps();
        });
        Schema::create('employee_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('institute')->nullable();
            $table->string('degree')->nullable();
            $table->string('group')->nullable();
            $table->string('grade')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->timestamps();
        });
        Schema::create('employee_trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('institute')->nullable();
            $table->string('subject')->nullable();
            $table->string('duration')->nullable();
            $table->timestamps();
        });
        Schema::create('employee_qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('qualification')->nullable();
            $table->string('technical_training')->nullable();
            $table->string('membership')->nullable();
            $table->timestamps();
        });
        Schema::create('employee_nominees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('relation')->nullable();
            $table->string('address')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('percentage')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_nominees');
        Schema::dropIfExists('employee_qualifications');
        Schema::dropIfExists('employee_trainings');
        Schema::dropIfExists('employee_educations');
        Schema::dropIfExists('employee_children');
        Schema::dropIfExists('employees');
    }
};
