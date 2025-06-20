@extends('_layouts.app', ['title' => 'Redefinir Senha'])

@section('content')
<div class="row d-flex justify-content-around">
    <div class="col-md-8 mb-4">
        <div class="card rounded">
            <div class="card-header">
                <h5 class="card-title mb-0">Redefinir Senha</h5>
            </div>

            <div class="card-body">
                <p>Digite a sua nova senha e confirme ela nos campos abaixo para redefinir sua senha.</p>
                <form 
                    action="{{ route('resetPassword.submit', ['token' => $token]) }}" 
                    method="post" 
                    onsubmit="disableButtonOnSubmit(event, this);"
                >
                    @csrf
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input 
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            placeholder="Digite seu email..."
                            required
                            type="email"
                            value="{{ old('email') }}"
                        >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label>Senha</label>
                        <input 
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="Digite sua senha..."
                            required
                            type="password"
                        >

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label>Confirmar Senha</label>
                        <input 
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation"
                            placeholder="Confirme sua senha..."
                            required
                            type="password"
                        >

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary btn-md">
                            Redefinir Senha
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function disableButtonOnSubmit(event, form) {
        event.preventDefault();
        form.querySelector('button[type=submit]').disabled = true;
        form.submit();
    }
</script>
@endsection