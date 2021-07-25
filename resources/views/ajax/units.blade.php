@if(count($units))
    <ul>
        @foreach($units as $index => $unit)
            <li>{{ $unit->fullUnitName }} {{ $unit->shortUnitName ? '('. $unit->shortUnitName .')' : '' }}</li>
            @if($index != count($units) - 1)
                <hr>
            @endif
        @endforeach
        @if(count($units) >= 7)
            <li class="text-center">. . .</li>
        @endif
    </ul>
    <input type="button" value="Подробнее" id="unitMore">
@else
    <p class="text-center">Ничего не найдено</p>
    <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
@endif