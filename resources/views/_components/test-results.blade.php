<div class="row">
    @foreach($results as $index => $result)
        <div class="col-md-4">
            <div class="card text-center my-2">
                <div>
                    <p class="mt-2 mb-0">
                        <strong>
                            @switch($index)
                                @case(0)
                                    Linguagem Dominante:
                                    @break
                                @case(1)
                                    Linguagem de Influência 1:
                                    @break
                                @case(2)
                                    Linguagem de Influência 2:
                                    @break
                            @endswitch
                        </strong>
                    </p>
                </div>
                <div>
                    <img src="<?= asset($result->language->image) ?>">
                </div>
                <div>
                    <p class="mb-2">
                        <strong><?= sprintf('Pontuação: %s', $result->total) ?></strong>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>