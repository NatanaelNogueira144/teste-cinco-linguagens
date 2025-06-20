@extends('_layouts.app', ['title' => 'Não Encontrado'])

@section('content')
<div class="alert alert-info mb-3" role="alert">
    Lamentamos, mas a página que você estava procurando não existe!
</div>

<div class="d-flex justify-content-center">
    <a class="btn btn-primary" href={{ route('home') }}>Voltar ao Início</a>
</div>
@endsection