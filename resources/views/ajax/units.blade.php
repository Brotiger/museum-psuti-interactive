@if(count($units))
    <ul>
        @foreach($units as $unit)
            <li>{{ $unit->fullUnitName }} {{ $unit->shortUnitName ? '('. $unit->shortUnitName .')' : '' }}</li>
            <hr>
        @endforeach
        <li class="text-center">. . .</li>
    </ul>
    <input type="button" value="Подробнее" id="unitMore">
@else
    <p class="text-center">Ничего не найдено</p>
@endif