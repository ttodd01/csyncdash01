<table class="table table-bordered">
    <thead>
    <tr>
        <th>Term</th>
        <th>Ranking</th>
        <th>Product URL</th>
        <th>Search URL</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data as $dat)
        <tr>
            <td>{{$dat->term}}</td>
            <td>{{$dat->ranking}}</td>
            <td><a href="https://www.google.com/trends/explore{{$dat->productUrl}}"><i class="fa fa-line-chart"></i> View on Trends</a></td>
            <td><a href="{{$dat->searchUrl}}"><i class="fa fa-google"></i> View Google Search</a> </td>
        </tr>
    @endforeach


    </tbody>
</table>