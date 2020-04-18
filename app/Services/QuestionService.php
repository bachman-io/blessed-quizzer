<?php


namespace App\Services;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionService
{
    public function createNew(Request $request)
    {
        $this->validateQuestion($request);

        $userId = Session::get('discord_user')->id;

        $user = User::findOrFail($userId);

        $question = new Question([
            'category_id' => $request->input('category_id'),
            'question_text' => $request->input('question_text'),
            'answer_text' => $request->input('answer_text'),
            'source_url' => $request->input('source_url'),
            'status' => 'Approved'
        ]);

        $user->questions()->save($question);

    }

    public function updateExisting(Request $request)
    {
        $this->validateQuestion($request);

        $userId = Session::get('discord_user')->id;

        $user = User::findOrFail($userId);

        $question = Question::findOrFail($request->input('id'));

        if ($question->user_id !== $userId && !$user->is_admin){
            abort(403, 'Unauthorized action.');
        }

        $question->category_id = $request->input('category_id');
        $question->question_text = $request->input('question_text');
        $question->answer_text = $request->input('answer_text');
        $question->source_url = $request->input('source_url');
        $question->save();
    }

    private function validateQuestion(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question_text' => 'required|unique:questions|ends_with:?',
            'answer_text' => 'required',
            'source_url' => 'required|url'
        ]);
    }
}
