@if($paginator->hasPages())
    <nav aria-label="Navegação">
        <ul class="pagination">
            @if($paginator->currentPage() != 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><</a>
                </li>
            @endif

            @foreach($paginator->getUrlRange((
                $paginator->currentPage() <= 5 || $paginator->lastPage() <= 10 ? 1 : (
                    $paginator->lastPage() - $paginator->currentPage() > 5 ? ($paginator->currentPage() - 4) : ($paginator->lastPage() - 9)
                )
            ), (
                $paginator->lastPage() <= 10 || $paginator->lastPage() - $paginator->currentPage() <= 5 
                    ? $paginator->lastPage() 
                    : ($paginator->currentPage() <= 5 ? 10 : $paginator->currentPage() + 5)
            )) as $index => $url)
                <li class="page-item {{ $paginator->currentPage() == $index ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $index }}</a>
                </li>
            @endforeach

            @if($paginator->currentPage() != $paginator->lastPage())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">></a>
                </li>
            @endif
        </ul>
    </nav>
@endif