@extends('_layouts.app', ['title' => 'Resultado'])

@section('content')
<div class="card rounded">
    <div class="card-body">
        <h5 class="card-title">Resultado do Teste</h5>
        <p>Confira abaixo o resultado do seu teste!</p>

        @component('_components.test-results', ['results' => $results])
        @endcomponent
    </div>
</div>
@endsection