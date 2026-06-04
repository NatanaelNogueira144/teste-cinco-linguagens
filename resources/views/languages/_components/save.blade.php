@if(isset($language->id))
    <form method="post" action="{{ route('languages.update', ['language' => $language->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('languages.store') }}">
        @csrf
@endif
    <div class="form-group mb-3">
        <label>Nome</label>
        <input 
            class="form-control @error('name') is-invalid @enderror"
            name="name"
            placeholder="Digite o nome..."
            required
            type="text"
            value="{{ old('name') ?? $language->name ?? '' }}"
        >

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="d-flex justify-content-around">
        <input type="submit" class="btn btn-primary btn-md" value="Salvar" />
    </div>
</form>