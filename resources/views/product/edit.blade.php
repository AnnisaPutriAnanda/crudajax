<div class="p-2">
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" value="{{ $data->name }}" class="form-control">
    </div>
    <br>
    <div class="form-group">
        <button class="btn btn-success" onclick="update({{ $data->id }})">Edit</button>
    </div>
</div>