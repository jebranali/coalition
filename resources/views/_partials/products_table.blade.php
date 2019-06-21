@if($products)
    <table class="table">
        <thead id="t_head">
        <tr>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Price</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody id="table_body">
        @foreach($products as $product)
            <tr>
                <td>{{$product->product_name}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Total: {{$products->sum('quantity') * $products->sum('price')}}</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>
@endif