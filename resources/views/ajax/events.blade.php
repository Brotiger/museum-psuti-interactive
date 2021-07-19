@if(count($events))
    <ul>
        @foreach($events as $event)
            <li>{{ $event->name }}</li>
            <hr>
        @endforeach
        @if(count($events) >= 7)
            <li class="text-center">. . .</li>
        @endif
    </ul>
    <input type="button" value="Подробнее" id="eventMore">
@else
    <p class="text-center">Ничего не найдено</p>
    <p class="text-center mt-3"><i class="fab fa-whmcs"></i></p>
@endif