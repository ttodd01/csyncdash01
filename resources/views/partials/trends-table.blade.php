<table class="table table-bordered">
    <thead>
    <tr>
        <th>Term</th>
        <th>Times Searched</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data['table']['rows'] as $dat)
        <tr>
            <td>{{$term_name}}</td>
            <td>{{$dat['c'][1]['f']}}</td>
            <td>{{$dat['c'][0]['f']}}</td>
        </tr>
    @endforeach


    </tbody>
</table>