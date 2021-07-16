@if(count($events))
    <ul>
        @foreach($events as $event)
            <li>{{ $event->name }}</li>
            <hr>
        @endforeach
        <li class="text-center">. . .</li>
    </ul>
    <input type="button" value="Подробнее" id="eventMore">
@else
    <p class="text-center">Ничего не найдено</p>
@endif