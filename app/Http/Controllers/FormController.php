<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\{ Answer, Language, Question, Result };
use Illuminate\Http\Request;
use App\Mail\TestResultsMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;

class FormController extends Controller
{
    public function index() 
    {
        $user = Auth::user();
        if(Result::where('user_id', $user->id)->exists()) {
            return view('result', [
                'results' => Result::where('user_id', $user->id)->orderBy('total', 'desc')->with('language')->get()
            ]);
        }

        $questions = Question::get();
        return view('form', ['questions' => $questions]);
    }

    public function submit(TestRequest $request) 
    {
        $user = Auth::user();
        if(Result::where('user_id', $user->id)->exists()) {
            return redirect()->route('form');
        }

        DB::transaction(function() use ($user, $request) {
            $answers = [];
            foreach($request->answers as $questionId) {
                $answers[] = Answer::create([
                    'user_id' => $user->id,
                    'question_id' => $questionId
                ]);
            }

            $languageScore = [];
            foreach($answers as $answer) {
                if(!isset($languageScore[$answer->question->language_id])) {
                    $languageScore[$answer->question->language_id] = 0;
                }
                $languageScore[$answer->question->language_id] += 1;
            }

            $languages = Language::get();
            foreach($languages as $language) {
                Result::create([
                    'user_id' => $user->id,
                    'language_id' => $language->id,
                    'total' => $languageScore[$language->id]
                ]);
            }
        });

        return redirect()->route('form');
    }
}
