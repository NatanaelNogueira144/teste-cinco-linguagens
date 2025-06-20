@if(isset($question->id))
    <form method="post" action="{{ route('questions.update', ['question' => $question->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('questions.store') }}">
        @csrf
@endif
    <div class="form-group mb-3">
        <label>Descrição</label>
        <input 
            class="form-control @error('description') is-invalid @enderror"
            name="description"
            placeholder="Digite a descrição..."
            required
            type="text"
            value="{{ $question->description ?? old('description') }}"
        >

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="d-flex justify-content-around">
        <input type="submit" class="btn btn-primary btn-md" value="Salvar" />
    </div>
</form>