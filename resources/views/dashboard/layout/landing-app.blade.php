<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softexel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .fixed-image {
            height: 150px;
            object-fit: cover;
            border: 1px solid #ddd;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            background-color: darkgray;
        }
        .shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand m-1 p-2 ml-4" href="/">Softexel</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link mr-4" href="{{ url('dashboard') }}">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>


    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $('#transactionModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var productId = button.data('product-id');
            var productName = button.data('product-name');
            var productPrice = button.data('product-price');

            var modal = $(this);
            modal.find('.modal-title').text('Buy ' + productName);
            modal.find('#product_name').val(productName);
            modal.find('#product_price').val(productPrice);
            modal.find('#product_id').val(productId);
            modal.find('#quantity').val(1);
            modal.find('#total_price').val(productPrice);

            modal.find('#quantity').on('input', function () {
                var quantity = $(this).val();
                var totalPrice = quantity * productPrice;
                modal.find('#total_price').val(totalPrice);
            });
        });
    </script>
</body>
</html>
