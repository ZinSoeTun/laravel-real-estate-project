<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('overview_id')->constrained()->cascadeOnDelete();
            $table->unique(['user_id', 'overview_id']);
            $table->timestamps();
        });

        // carry over likes stored in the old overviews.user_id column
        $now = now();
        DB::table('overviews')
            ->join('users', 'users.id', '=', 'overviews.user_id')
            ->where('overviews.user_id', '!=', 0)
            ->select('overviews.user_id', 'overviews.id as overview_id')
            ->get()
            ->each(function ($like) use ($now) {
                DB::table('likes')->insert([
                    'user_id' => $like->user_id,
                    'overview_id' => $like->overview_id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            });

        Schema::table('overviews', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('overviews', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->after('agent_id');
        });
        Schema::dropIfExists('likes');
    }
};
