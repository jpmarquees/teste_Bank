<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<form action="/api/sales" method="POST"
        enctype="multipart/form-data">
    @csrf

    <input type="hidden" id="products" name="products[]" value="{{ json_encode($products) }}">
    <input type="hidden" id="totalPrice" name="totalPrice" value="{{ $totalPrice }}">
    <input type="hidden" id="customer_id" name="customer_id" value="{{ $customer_id }}">


    <div class="form-group row">
        <label class="col-sm-2 col-form-label">
            Produtos:
        </label>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Qtd. Pedida</th>
                    <th scope="col">Valor Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>-</td>
                    </tr>
                @endforeach
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>R${{ $totalPrice }}</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Finalizar venda</button>
        </div>
    </div>
</form>