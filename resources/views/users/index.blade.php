@extends('_layouts.app', ['title' => 'Lista de Usuários'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Lista de Usuários</h5>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="icofont-plus"></i>
            Cadastrar Usuário
        </a>
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

        @component('_components.paginator', ['paginator' => $users])
        @endcomponent

        @component('_components.paginator-results', ['paginator' => $users])
        @endcomponent

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="align-middle">#{{ $user->id }}</td>
                            <td class="align-middle">
                                <div class="d-flex gap-1 align-items-center">
                                    <img 
                                        src="{{ $user->avatar_image_url }}"
                                        class="rounded-circle"
                                        width="42"
                                        height="42"
                                        alt="{{ $user->name }}"
                                    />
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">
                                <div class="d-flex gap-1">
                                    <a 
                                        href="{{ route('users.show', ['user' => $user->id]) }}" 
                                        class="btn btn-secondary rounded-circle"
                                    >
                                        <i class="icofont-list" style="font-size: 16px;"></i>
                                    </a>

                                    <a 
                                        href="{{ route('users.edit', ['user' => $user->id]) }}" 
                                        class="btn btn-primary rounded-circle"
                                    >
                                        <i class="icofont-edit" style="font-size: 16px;"></i>
                                    </a>

                                    <form 
                                        id="form_{{ $user->id }}" 
                                        method="post" 
                                        action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                        onsubmit="disableButtonOnSubmit(event, this);"
                                    >
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger rounded-circle btn-md">
                                            <i class="icofont-bin" style="font-size: 16px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function disableButtonOnSubmit(event, form) {
        event.preventDefault();
        if(confirm('Você tem certeza que deseja excluir este usuário?')) {
            form.querySelector('button[type=submit]').disabled = true;
            form.submit();
        }
    }
</script>
@endsection