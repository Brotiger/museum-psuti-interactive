@if(count($events))
    <ul>
        @foreach($events as $index => $event)
            <li>{{ $event->name }}</li>
            @if($index != count($events) - 1)
                <hr>
            @endif
        @endforeach
    </ul>
@else
    <p class="text-center">Ничего не найдено</p>
    <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
@endif