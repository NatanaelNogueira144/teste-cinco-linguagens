@extends('_layouts.app', ['title' => $user->name])

@section('content')
<div class="card rounded">
    <div class="card-body">
        <h5 class="card-title">Resultado do Teste de {{ $user->name }}</h5>

        @if($hasTestDone) 
            @component('_components.test-results', ['results' => $results])
            @endcomponent

            <h5 class="card-title">Respostas</h5>
            <table class="table table-bordered table-striped align-middle">
                <thead class="text-center">
                    <th>Marcado?</th>
                    <th>Questão</th>
                    <th>Linguagem</th>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td class="align-middle text-center">
                                <i 
                                    class="icofont-{{ isset($answers[$question->id]) ? 'check text-success' : 'close text-danger' }}" 
                                    style="font-size: 20px;"
                                ></i>
                            </td>
                            <td class="align-middle">{{ $question->description }}</td>
                            <td class="align-middle">{{ $question->language->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-info mb-3" role="alert">
            O(A) {{ $user->name }} ainda não respondeu ao teste das Cinco Linguagens do Amor!
        </div>
        @endif
    </div>
</div>
@endsection