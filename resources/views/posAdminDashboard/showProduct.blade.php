@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap(for pagination).min.css">
<link rel="stylesheet" href="/assets/css/adminProducts.css">
<link rel="stylesheet" href="/assets/css/userProducts.css">
<title>View User</title>

<section class="adminDashboardBody kld--display-flex">
    <section class="mobileSidebar kld--display-none">

    </section>
    <section class="kld--site kld--min-width-dvw-100">
        <main>
            <section class="kld--container view-user">
                <div class="view-user-card">
                    <h1 class="kld--text-align-center">Product Details</h1>
                    <hr>
                    <div class="kld--margin-top-half">
                        <div class="card-header">
                            <h2>{{ $product->product_name }}</h2>
                        </div>
                        <div class="card-body">
                            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                            <p><strong>Price:</strong> {{ $product->price }}</p>
                            <p><strong>Supplier:</strong> {{ $product->supplier->supplier }}</p>
                            <p><strong>Expiration Date:</strong>
                                {{ $product->expiration_date ?? 'N/A' }}</p>
                        </div>
                        <div class="kld--display-flex kld--justify-flex-end">
                            <a href="{{ route('posAdminDashboard.products') }}"
                                class="kld--padding-button-1 kld--button-error kld--border-radius-medium kld--text-color-white kld--margin-right-half kld--margin-top-1">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                            <button type="" onclick="window.print()" class="kld--padding-button-1 kld--button-primary kld--margin-left-half kld--border-radius-medium
                            kld--text-color-white kld--margin-top-1">
                                <i class="fa-solid fa-print"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </section>
</section>
@endsection
