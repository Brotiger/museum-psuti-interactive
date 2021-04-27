@foreach($employees as $employee)
    <tr class="recordRow" employee-id="{{ $employee->id }}">
        <td>{{ $employee->lastName }}</td>
        <td>{{ $employee->firstName }}</td>
        <td>{{ $employee->secondName }}</td>
        <td>{{ $employee->hired }}</td>
    </tr>
@endforeach