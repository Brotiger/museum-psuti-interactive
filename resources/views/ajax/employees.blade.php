@if(count($employees))
    <ul>
        @foreach($employees as $employee)
            <li>{{ $employee->lastName }} {{ $employee->firstName }} {{ $employee->secondName }}</li>
            <hr>
        @endforeach
        <li class="text-center">. . .</li>
    </ul>
    <input type="button" value="Подробнее" id="employeeMore">
@else
    <p class="text-center">Ничего не найдено</p>
@endif