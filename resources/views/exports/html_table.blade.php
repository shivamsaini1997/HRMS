<table class="table table-striped custom-table table-nowrap mb-0">
    <thead>
        <tr>
            <th>Employee</th>
            @foreach (range(1, 31) as $day)
                <th>{{ $day }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {!! $htmlTableData !!}
    </tbody>
</table>