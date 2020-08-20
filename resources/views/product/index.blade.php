<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Qtd. em estoque</th>
                    <th scope="col">Criado em (UTC)</th>
                    <th class="text-center" scope="col">
                        <a role="button" class="btn" href="/products/create"
                            style="display: inline; padding: 0.375rem 0.2rem;">
                                <span style="font-size: 1.875em; color: green;">
                                    <i class="fa fa-plus"></i>
                                </span>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->description }}</td>
                        <td>R${{ $product->price }}</td>
                        <td>{{ $product->available }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td class="text-center">
                                <a role="button" class="btn" href="/products/edit/{{$product->id}}"
                                   style="display: inline; padding: 0.375rem 0.2rem;">
                                        <span style="font-size: 1.875em; /*color: Tomato;*/">
                                            <i class="fa fa-edit"></i>
                                        </span>
                                </a>
                                <form action="/api/products/{{$product->id}}" method="post"
                                      style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn"
                                            style="padding: 0.375rem 0.2rem; color: red; background-color: transparent; vertical-align: unset;">
                                        <span style="font-size: 1.875em;">
                                        <i class="fa fa-times-circle"></i>
                                    </span>
                                    </button>
                                </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>