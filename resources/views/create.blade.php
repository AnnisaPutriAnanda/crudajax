<div class="p-2">
    <div class="form-group">
        <div class="error">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $r)
            <li>{{$r}}</li>
            @endforeach
        </ul>
        @endif
    </div>
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <br>
    <div class="form-group">
        <button class="btn btn-success" onclick="store()">Create</button>
    </div>
</div>