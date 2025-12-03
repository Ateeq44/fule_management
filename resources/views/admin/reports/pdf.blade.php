
<div class="container">

<h2>Fuel Report</h2>

<p><strong>Total Liters:</strong> {{ $totalLiters }}</p>
<p><strong>Total Cost:</strong> ${{ $totalCost }}</p>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Date</th>
            <th>Vehicle</th>
            <th>Driver</th>
            <th>Liters</th>
            <th>Cost</th>
            <th>Odometer</th>
            <th>Station</th>
        </tr>
    </thead>

    <tbody>
        @foreach($entries as $entry)
        <tr>
            <td>{{ $entry->date }}</td>
            <td>{{ $entry->vehicle->registration_number }}</td>
            <td>{{ $entry->driver->name }}</td>
            <td>{{ $entry->liters }}</td>
            <td>${{ $entry->total_cost }}</td>
            <td>{{ $entry->odometer }}</td>
            <td>{{ $entry->station_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

    
</div>