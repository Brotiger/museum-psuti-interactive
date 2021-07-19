@if(count($units))
    <ul>
        @foreach($units as $unit)
            <li>{{ $unit->fullUnitName }} {{ $unit->shortUnitName ? '('. $unit->shortUnitName .')' : '' }}</li>
            <hr>
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