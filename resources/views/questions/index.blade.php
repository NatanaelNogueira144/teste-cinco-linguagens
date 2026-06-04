@extends('_layouts.app', ['title' => 'Lista de Perguntas'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Lista de Perguntas</h5>
    </div>

    <div class="card-body">
        <form action="#" method="get">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="languageId[eq]">
                        <option value="">Todas as Linguagens</option>
                        @foreach($languages as $language)
                            <option 
                                value="{{ $language->id }}" 
                                {{ isset($request['languageId']['eq']) && $request['languageId']['eq'] == $language->id ? 'selected' : '' }}
                            >
                                {{ $language->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input 
                            class="form-control"
                            name="description[like]"
                            placeholder="Buscar por..."
                            type="search"
                            value="{{ isset($request['description']['like']) ? $request['description']['like'] : '' }}"
                        >

                        <button type="submit" class="btn btn-primary btn-md">
                            <i class="icofont-search-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        @component('_components.paginator', ['paginator' => $questions])
        @endcomponent

        @component('_components.paginator-results', ['paginator' => $questions])
        @endcomponent

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <th class="align-middle">Descrição</th>
                    <th class="align-middle">Linguagem</th>
                    <th class="align-middle">Ações</th>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td class="align-middle">{{ $question->short_description }}</td>
                            <td class="align-middle">{{ $question->language->name }}</td>
                            <td class="align-middle">
                                <a 
                                    href="{{ route('questions.edit', ['question' => $question->id]) }}" 
                                    class="btn btn-primary rounded-circle"
                                >
                                    <i class="icofont-edit" style="font-size: 16px;"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection