@extends('_layouts.app', ['title' => 'Início'])

@section('content')
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card rounded">
            <div class="card-header">
                <h5 class="card-title mb-0">Cadastro</h5>
            </div>

            <div class="card-body">
                <p>Se é a sua primeira vez aqui, realize abaixo o seu cadastro para poder fazer o teste das Cinco Linguagens do Amor.</p>
                <form action="{{ route('auth.register') }}" method="post" onsubmit="disableButtonOnSubmit(event, this);">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Nome</label>
                        <input 
                            class="form-control @error('name') is-invalid @enderror"
                            name="name"
                            placeholder="Digite seu nome..."
                            required
                            type="text"
                            value="{{ old('name') }}"
                        >

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

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
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card rounded">
            <div class="card-header">
                <h5 class="card-title mb-0">Entrar</h5>
            </div>

            <div class="card-body">
                <p>Se você já realizou o teste antes e deseja ver o resultado novamente, faça o login abaixo.</p>
                <form action="{{ route('auth.login') }}" method="POST" onsubmit="disableButtonOnSubmit(event, this);">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input 
                            class="form-control @error('login_email') is-invalid @enderror"
                            name="login_email"
                            placeholder="Digite seu email..."
                            required
                            type="email"
                            value="{{ old('login_email') }}"
                        >

                        @error('login_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Senha</label>
                        <input 
                            class="form-control @error('login_password') is-invalid @enderror"
                            name="login_password"
                            placeholder="Digite sua senha..."
                            required
                            type="password"
                        >

                        @error('login_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary btn-md">
                            Entrar
                        </button>
                    </div>

                    <div class="d-flex justify-content-around">
                        <a class="btn btn-link" href="{{ route('forgotPassword.index') }}">
                            Esqueceu a Senha?
                        </a>
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