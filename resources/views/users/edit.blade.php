@extends('_layouts.app', ['title' => 'Editar Usuário'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex align-items-center">
        <h5 class="card-title m-0">Editar Usuário - {{ $user->name }}</h5>
    </div>

    <div class="card-body">
        <p>Preencha os campos abaixo para editar os dados do usuário "{{ $user->name }}".</p>
        @component('users._components.save', ['user' => $user])
        @endcomponent
    </div>
</div>
@endsection