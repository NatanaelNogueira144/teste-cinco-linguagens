@if($paginator->total() != 0)
<p>
    Mostrando {{ $paginator->count() }} de {{ $paginator->total() }} 
    (de {{ $paginator->firstItem() }} à {{ $paginator->lastItem() }})
</p>
@endif