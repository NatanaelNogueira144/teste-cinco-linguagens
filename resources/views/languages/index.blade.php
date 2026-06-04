@extends('_layouts.app', ['title' => 'Lista de Linguagens'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Lista de Linguagens</h5>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <form action="#" method="get">
                    @csrf
                    <div class="input-group mb-3">
                        <input 
                            class="form-control"
                            name="name[like]"
                            placeholder="Buscar por..."
                            type="search"
                            value="{{ isset($request['name']['like']) ? $request['name']['like'] : '' }}"
                        >

                        <button type="submit" class="btn btn-primary btn-md">
                            <i class="icofont-search-1"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @component('_components.paginator', ['paginator' => $languages])
        @endcomponent

        @component('_components.paginator-results', ['paginator' => $languages])
        @endcomponent

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <th class="align-middle">Nome</th>
                    <th class="align-middle">Ações</th>
                </thead>
                <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <td class="align-middle">
                                <div class="d-flex gap-1 align-items-center">
                                    <img 
                                        src="{{ asset($language->image) }}"
                                        class="rounded-circle"
                                        width="42"
                                        height="42"
                                        alt="{{ $language->name }}"
                                    />
                                    {{ $language->name }}
                                </div>
                            </td>
                            <td class="align-middle">
                                <a 
                                    href="{{ route('languages.edit', ['language' => $language->id]) }}" 
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