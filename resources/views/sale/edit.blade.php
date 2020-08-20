<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<form action="/api/products/{{$product->id}}" method="POST"
        enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">
        Descrição:
        </label>
        <div class="col-sm-6">
            <input id="description" type="text" name="description" class="form-control"
                    value="{{ $product->description }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="document" class="col-sm-2 col-form-label">
            Valor: 
        </label>
        <div class="col-sm-6">
            <input id="price" type="text" name="price" class="form-control"
                value="{{ $product->price }}" required>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="document" class="col-sm-2 col-form-label">
            Quantidade: 
        </label>
        <div class="col-sm-6">
            <input id="available" type="number" name="available" class="form-control"
            value="{{ $product->available }}" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
</form>