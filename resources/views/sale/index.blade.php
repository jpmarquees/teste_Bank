<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Cliente da Venda</th>
                    <th scope="col">Total da Venda</th>
                    <th scope="col">Itens da venda</th>
                    <th class="text-center" scope="col">
                        <a role="button" class="btn" href="/sales/create"
                            style="display: inline; padding: 0.375rem 0.2rem;">
                                <span style="font-size: 1.875em; color: green;">
                                    <i class="fa fa-plus"></i>
                                </span>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->customer->name }}</td>
                        <td>R${{ $sale->totalPrice }}</td>
                        <td>
                        @foreach ($sale->items as $item)
                            <p>{{$item->description}}</p>
                        @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>