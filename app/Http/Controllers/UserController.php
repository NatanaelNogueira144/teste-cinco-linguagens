<?php

namespace App\Http\Controllers;

use App\Filters\UsersFilter;
use App\Models\{ Answer, Question, Result, User };
use App\Http\Requests\{ StoreUserRequest, UpdateUserRequest };
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filter = new UsersFilter();
        $filterItems = $filter->transform($request);

        $users = User::where($filterItems);

        return view('users.index', [
            'users' => $users->paginate(10)->appends($request->query()),
            'request' => $request->all()
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create(['user_type' => 2] + $request->only('name', 'email', 'password'));
        return redirect()->route('users.index')->with('status', [
            'type' => 'success',
            'message' => "O usuário \"{$user->name}\" foi cadastrado com sucesso!"
        ]);
    }

    public function show(User $user)
    {
        $hasTestDone = false;
        $questions = [];
        $answers = [];
        $results = [];

        if(Result::where('user_id', $user->id)->exists()) {
            $hasTestDone = true;
            $dbAnswers = Answer::where('user_id', $user->id)->orderBy('id')->with('question')->get();
            foreach($dbAnswers as $answer) {
                $answers[$answer->question_id] = true;
            }

            $questions = Question::with('language')->get();
            $results = Result::where('user_id', $user->id)->orderBy('total', 'desc')->with('language')->get();
        }

        return view('users.show', [
            'user' => $user,
            'hasTestDone' => $hasTestDone,
            'questions' => $questions,
            'results' => $results,
            'answers' => $answers
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->only('name', 'email', 'password'));
        return redirect()->route('users.index')->with('status', [
            'type' => 'success',
            'message' => "O usuário \"{$user->name}\" foi atualizado com sucesso!"
        ]);
    }

    public function destroy(User $user)
    {
        if($user->user_type == 1) {
            return redirect()->route('users.index')->with('status', [
                'type' => 'danger',
                'message' => "Não é possível excluir o Administrador!"
            ]);
        }

        DB::transaction(function() use ($user) {
            $user->answers()->delete();
            $user->results()->delete();
            $user->delete();
        });

        return redirect()->route('users.index')->with('status', [
            'type' => 'success',
            'message' => "O usuário \"{$user->name}\" foi excluído com sucesso!"
        ]);
    }
}
