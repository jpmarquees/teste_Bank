<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<form action="/sales/process" method="POST"
        enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">
        Cliente:
        </label>
        <div class="col-sm-6">
            <select id="customer_id" class="form-control" name="customer_id">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">
        Produtos:
        </label>
        <div class="col-sm-6">
            @foreach($products as $product)
                <input type="checkbox" id="products" name="products[]" value="{{ $product->id }}">
                    {{ $product->description }}
                </input>
                <input type="number" id="quantityProduct{{$product->id}}" name="quantityProduct{{$product->id}}" value="{{$product->available}}" min="1" max="{{$product->available}}" >   
                <br/>
            @endforeach
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Revisar venda</button>
        </div>
    </div>
</form>