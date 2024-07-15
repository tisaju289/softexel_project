@extends('dashboard.layout.landing-app')


@section('content')

<div class="content">
    <div class="container my-5">
        <div class="row mb-4">
            <div class="col text-center">
                <h1>Welcome to Our Product Showcase</h1>
                <p class="lead">Explore our range of products</p>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top fixed-image" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h5 class="card-title text-danger">{{ $product->price }} tk</h5>
                            <p class="card-text">{{ $product->subcategory->name }}</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transactionModal"
                                data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}"
                                data-product-price="{{ $product->price }}">Buy Now</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Transaction Modal -->
<div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionModalLabel">Create Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="transactionForm" action="{{ route('transaction.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="text" class="form-control" id="product_price" name="product_price" readonly>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="total_price">Total Price</label>
                        <input type="number" class="form-control" id="total_price" name="total_price" readonly>
                    </div>
                    <input type="hidden" id="product_id" name="product_id">
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
