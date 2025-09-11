<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('code')->unique();
            $table->unsignedTinyInteger('status')->default(1); // 1=new, 2=draft, 3=submitted
            $table->unsignedBigInteger('recruitment_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forms');
    }
};
