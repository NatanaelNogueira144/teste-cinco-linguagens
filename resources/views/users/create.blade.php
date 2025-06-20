@extends('_layouts.app', ['title' => 'Cadastrar Usuário'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex align-items-center">
        <h5 class="card-title m-0">Cadastrar Usuário</h5>
    </div>

    <div class="card-body">
        <p>Preencha os campos abaixo para cadastrar um novo usuário.</p>
        @component('users._components.save')
        @endcomponent
    </div>
</div>
@endsection