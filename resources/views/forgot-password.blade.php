@extends('_layouts.app', ['title' => 'Solicitação de Senha'])

@section('content')
<div class="row d-flex justify-content-around">
    <div class="col-md-8 mb-4">
        <div class="card rounded">
            <div class="card-header">
                <h5 class="card-title mb-0">Solicitar Redefinição de Senha</h5>
            </div>

            <div class="card-body">
                <p>Digite abaixo o seu email para receber o link para redefinir sua senha.</p>
                <form action="{{ route('forgotPassword.submit') }}" method="post" onsubmit="disableButtonOnSubmit(event, this);">
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

                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary btn-md">
                            Solicitar Redefinição de Senha
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function disableButtonOnSubmit(event, form) {
        event.preventDefault();
        form.querySelector('button[type=submit]').disabled = true;
        form.submit();
    }
</script>
@endsection