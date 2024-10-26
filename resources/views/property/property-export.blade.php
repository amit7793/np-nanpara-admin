<table id="trades-table" class="display">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Application No</th>
            <th>Construction Year</th>
            <th>Property Type</th>
            <th>Details of owner or director</th>
            <th>Description of building or land</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($getData as $key => $property)
        <tr>
            <td>{{ $key+1}}</td>
            <td>{{ $property->id ?? "NA" }}</td>
            <td>{{ $property->construction_year  ?? "NA"}}</td>
            <td>{{ $property->property ?? "NA" }}</td>
            <td>{{ $property->details_of_owner ?? "NA" }}</td>
            <td>{{ $property->land_building_description ?? "NA" }}</td>
            <td>{{ "INPROGRESS" }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
