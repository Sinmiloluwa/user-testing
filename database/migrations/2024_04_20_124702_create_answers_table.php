<?php

use App\Models\User;
use App\Models\Project;
use App\Models\Question;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->longText('answer');
            $table->foreignIdFor(User::class, 'user_id');
            $table->foreignIdFor(Question::class, 'question_id');
            $table->foreignIdFor(Project::class, 'project_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
