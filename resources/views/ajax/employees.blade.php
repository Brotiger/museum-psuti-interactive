@if(count($employees))
    <ul>
        @foreach($employees as $index => $employee)
            <li>{{ $employee->lastName }} {{ $employee->firstName }} {{ $employee->secondName }}</li>
            @if($index != count($employees) - 1)
                <hr>
            @endif
        @endforeach
    </ul>
@else
    <p class="text-center">Ничего не найдено</p>
    <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
@endif