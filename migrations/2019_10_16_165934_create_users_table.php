<?php

use Carbon\Carbon;
use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id');
            $table->string('account', 20)->default('')->comment('帐号');
            $table->string('password', 150)->default('')->comment('密码');
            $table->string('avatar', 150)->nullable()->default('')->comment('头像');
            $table->unsignedTinyInteger('gender')->nullable()->default('0')->comment('性别[0:未知;1:男;2:女]');
            $table->string('email', 60)->nullable()->default('')->comment('邮箱');
            $table->string('mobile', 20)->nullable()->default('')->comment('手机号');
            $table->timestamp('last_time')->nullable()->default(Carbon::now())->comment('最后一次登录时间');
            $table->tinyInteger('status')->nullable()->default('1')->comment('状态[-1:删除;0:禁用;1启用]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
