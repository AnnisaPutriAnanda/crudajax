<table class="table">
    <tr>
        <th>NO</th>
        <th>ID</th>
        <th>NAME</th>
        <th>ACTION</th>
    </tr>
    @foreach ($data as $x)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$x->id}}</td>
        <td>{{$x->name}}</td>
        <td><button class="btn btn-warning" onclick="show({{$x->id}})">Edit</button>  <button class="btn btn-danger" onclick="destroy({{$x->id}})">Hapus</button></td>
    </tr>
        @endforeach
</table>

