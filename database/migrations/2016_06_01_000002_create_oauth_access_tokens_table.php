<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_access_tokens', function (Blueprint $table) {
            $table->string('id', 100)->primary();
            $table->foreignUuid('seller_id')
                ->nullable()
                ->constrained()
                ->on('sellers')
                ->onDelete('cascade');
            $table->foreignUuid('client_id')
                ->nullable()
                ->constrained()
                ->on('oauth_clients')
                ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('scopes', 300)->nullable();
            $table->boolean('revoked');
            $table->timestamps();
            $table->dateTime('expires_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oauth_access_tokens');
    }
};
