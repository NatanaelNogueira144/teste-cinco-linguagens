@extends('_layouts.app', ['title' => 'Editar Pergunta'])

@section('content')
<div class="card rounded">
    <div class="card-header d-flex align-items-center">
        <h5 class="card-title m-0">Editar Pergunta - {{ $question->description }}</h5>
    </div>

    <div class="card-body">
        <p>Preencha os campos abaixo para editar os dados da pergunta "{{ $question->description }}".</p>
        @component('questions._components.save', ['question' => $question])
        @endcomponent
    </div>
</div>
@endsection