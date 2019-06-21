<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coalition Test</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form id="product_form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" required class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" required min="1" class="form-control" id="quantity" name="quantity" placeholder="Quantity in Stock">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" required min="1" class="form-control" id="price" name="price" placeholder="Price per item">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="t_container">
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    //product data submit logic
    $(document).on('submit', '#product_form', function (e) {
        e.preventDefault();
        $.post('{{url('product')}}', $(this).serialize(), function (data) {
            $('#t_container').html(data);
        });
    });

    //get products
    $(document).ready(function () {
        $.get('{{url('products')}}', function (data) {
            $('#t_container').html(data);
        });
    })
</script>
