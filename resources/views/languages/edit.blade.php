@extends('_layouts.app', ['title' => 'Editar Linguagem'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex align-items-center">
        <h5 class="card-title m-0">Editar Linguagem - {{ $language->name }}</h5>
    </div>

    <div class="card-body">
        <p>Preencha os campos abaixo para editar os dados da linguagem "{{ $language->name }}".</p>
        @component('languages._components.save', ['language' => $language])
        @endcomponent
    </div>
</div>
@endsection