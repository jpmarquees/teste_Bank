<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<form action="/api/customers/{{$customer->id}}" method="POST"
        enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">
            Nome:
        </label>
        <div class="col-sm-6">
            <input id="name" type="text" name="name" class="form-control"
                    value="{{ $customer->name }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="document" class="col-sm-2 col-form-label">
            Documento: 
        </label>
        <div class="col-sm-6">
            <input id="document" type="text" name="document" class="form-control"
                    value="{{ $customer->document }}" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
</form>