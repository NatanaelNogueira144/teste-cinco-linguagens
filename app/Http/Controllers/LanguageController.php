<?php

namespace App\Http\Controllers;

use App\Filters\LanguagesFilter;
use App\Models\Language;
use App\Http\Requests\UpdateLanguageRequest;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        $filter = new LanguagesFilter();
        $filterItems = $filter->transform($request);

        $languages = Language::where($filterItems);

        return view('languages.index', [
            'languages' => $languages->paginate(10)->appends($request->query()),
            'request' => $request->all()
        ]);
    }

    public function edit(Language $language)
    {
        return view('languages.edit', ['language' => $language]);
    }

    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $language->update($request->only('name'));
        return redirect()->route('languages.index')->with('status', [
            'type' => 'success',
            'message' => "A linguagem \"{$language->name}\" foi atualizada com sucesso!"
        ]);
    }
}
