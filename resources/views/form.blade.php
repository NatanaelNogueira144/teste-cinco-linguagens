@extends('_layouts.app', ['title' => 'Teste'])

@section('content')
<div class="card rounded">
    <form action="{{ route('form.submit') }}" method="post">
        @csrf
        <div class="card-body">
            <h5 class="card-title">Teste das Cinco Linguagens do Amor</h5>
            <p>
                Responda sinceramente a cada uma das perguntas abaixo, marcando a caixa correspondente ao lado das perguntas 
                que forem afirmativas para você, e deixando em branco aquelas que não forem. Quando terminar de avaliar todas as perguntas, 
                clique em "Enviar".
            </p>

            @error('answers')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <table class="table table-bordered table-striped align-middle">
                <thead class="text-center">
                    <th class="align-middle">Marcar</th>
                    <th class="align-middle">Questão</th>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td class="align-middle text-center">
                                <input 
                                    type="checkbox"
                                    class="form-check-input"
                                    name="answers[]"
                                    value="{{ $question->id }}"
                                />
                            </td>
                            <td class="align-middle">{{ $question->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer d-block text-center brb-15">
            <input type="submit" class="btn btn-primary btn-md" value="Enviar">
        </div>
    </form>
</div>
@endsection