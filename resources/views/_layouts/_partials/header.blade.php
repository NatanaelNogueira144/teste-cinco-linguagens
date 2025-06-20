<nav class="navbar navbar-expand bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img 
                src="{{ asset('images/logo.png') }}"
                width="auto"
                height="50px"
                alt="Logo"
            />
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            @auth
                <div class="dropstart">
                    <div 
                        class="dropdown-toggle" 
                        style="cursor: pointer;" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false" 
                        role="button"
                    >
                        <img 
                            src="{{ Auth::user()->avatar_image_url }}"
                            class="rounded-circle"
                            width="50px"
                            alt="Avatar"
                        />
                    </div>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('form') }}">Teste/Resultados</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @if(Auth::user()->is_admin)
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">Usuários</a></li>
                            <li><a class="dropdown-item" href="{{ route('languages.index') }}">Linguagens</a></li>
                            <li><a class="dropdown-item" href="{{ route('questions.index') }}">Perguntas</a></li>
                            <li><hr class="dropdown-divider"></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('auth.edit') }}">Editar Dados</a></li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Sair</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>