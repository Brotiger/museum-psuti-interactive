@if(count($units))
    <ul>
        @foreach($units as $index => $unit)
            <li>{{ $unit->fullUnitName }} {{ $unit->shortUnitName ? '('. $unit->shortUnitName .')' : '' }}</li>
            @if($index != count($units) - 1)
                <hr>
            @endif
        @endforeach
    </ul>
@else
    <p class="text-center">Ничего не найдено</p>
    <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
@endif