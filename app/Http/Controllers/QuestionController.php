<?php

namespace App\Http\Controllers;

use App\Filters\QuestionsFilter;
use App\Models\{ Language, Question };
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $filter = new QuestionsFilter();
        $filterItems = $filter->transform($request);

        $questions = Question::where($filterItems)->with('language');

        return view('questions.index', [
            'questions' => $questions->paginate(10)->appends($request->query()),
            'languages' => Language::get(),
            'request' => $request->all()
        ]);
    }

    public function edit(Question $question)
    {
        return view('questions.edit', ['question' => $question]);
    }

    public function update(Request $request, Question $question)
    {
        $question->update($request->only('description'));
        return redirect()->route('questions.index')->with('status', [
            'type' => 'success',
            'message' => "A pergunta foi atualizada com sucesso!"
        ]);
    }
}
