@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap(for pagination).min.css">
<link rel="stylesheet" href="/assets/css/adminProducts.css">
<link rel="stylesheet" href="/assets/css/userProducts.css">
<title>Edit Product</title>

<section class="adminDashboardBody kld--display-flex">
    <section class="kld--site kld--min-width-dvw-100">
        <main>
            <div class="kld--container">
                <section class="edit-user kld--margin-bottom-3">
                    <div class="edit-user-container">
                        <h1>Edit Product</h1>
                        @if($errors->any())
                            <div
                                class="kld--padding-1 kld--margin-1 kld--background-color-error-dark-2 kld--text-color-white">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('products.updateProduct', $product->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="kld--display-flex kld--align-items-center kld--justify-center">
                                @if($product->product_image)
                                    <img src="{{ Storage::url($product->product_image) }}" alt="Product Image"
                                        class="profile-picture">
                                @else
                                    <img src="{{ asset('assets/img/default-profile.jpg') }}"
                                        alt="Default Product Image" class="profile-picture">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_image">Product Image:</label>
                                <input type="file" name="product_image"
                                    class="upload-button kld--min-width-percent-100">
                            </div>
                            <div class="form-group">
                                <label for="product_name">Product Name:</label>
                                <input type="text" name="product_name"
                                    value="{{ old('product_name', $product->product_name) }}"
                                    class="form-control kld--border">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity"
                                    value="{{ old('quantity', $product->quantity) }}"
                                    class="form-control kld--border">
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" step="0.01" name="price"
                                    value="{{ old('price', $product->price) }}"
                                    class="form-control kld--border">
                            </div>
                            <div class="form-group">
                                <label for="supplier_id">Supplier:</label>
                                <select name="supplier_id" class="form-control kld--border">
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->supplier_id }}"
                                            {{ old('supplier_id', $product->supplier_id) == $supplier->supplier_id ? 'selected' : '' }}>
                                            {{ $supplier->supplier }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="expiration_date">Expiration Date:</label>
                                <input type="date" name="expiration_date"
                                    value="{{ old('expiration_date', $product->expiration_date) }}"
                                    class="form-control kld--border">
                            </div>
                            <div class="kld--display-flex kld--justify-flex-end kld--margin-top-1">
                                <div>
                                    <a href="{{ route('posAdminDashboard.products') }}"
                                        class="kld--button-error kld--text-color-white kld--padding-button-1 kld--border-radius-medium kld--margin-right-half">
                                        Cancel
                                    </a>
                                    <button type="submit"
                                        class="kld--button-primary kld--text-color-white kld--padding-button-1 kld--border-radius-medium kld--margin-left-half">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </section>
</section>
@endsection
