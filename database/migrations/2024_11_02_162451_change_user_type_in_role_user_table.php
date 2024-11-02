<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('role_user', function (Blueprint $table) {
            if (!Schema::hasColumn('role_user', 'user_type')) {
                $table->string('user_type')->default('App\Models\User')->after('user_id');
            }
            $table->dropPrimary(['user_id', 'role_id']);
            $table->primary(['user_id', 'role_id', 'user_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role_user', function (Blueprint $table) {
            $table->dropPrimary(['user_id', 'role_id', 'user_type']);
            $table->dropColumn('user_type');
        });
    }
};
