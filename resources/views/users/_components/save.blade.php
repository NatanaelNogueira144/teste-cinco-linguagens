@if(isset($user->id))
    <form method="post" action="{{ route('users.update', ['user' => $user->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('users.store') }}">
        @csrf
@endif
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label>Nome</label>
                <input 
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    placeholder="Digite o nome..."
                    required
                    type="text"
                    value="{{ old('name') ?? $user->name ?? '' }}"
                >

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
                <label>Email</label>
                <input 
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    placeholder="Digite o email..."
                    required
                    type="email"
                    value="{{ old('email') ?? $user->email ?? '' }}"
                >

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label>Senha</label>
                <input 
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    placeholder="Digite a senha..."
                    required
                    type="password"
                >

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
                <label>Confirmar Senha</label>
                <input 
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation"
                    placeholder="Confirme a senha..."
                    required
                    type="password"
                >

                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-around">
        <input type="submit" class="btn btn-primary btn-md" value="Salvar" />
    </div>
</form>