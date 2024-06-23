@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap(for pagination).min.css">
<link rel="stylesheet" href="/assets/css/userProducts.css">
<title>Products</title>

<section class="adminDashboardBody kld--display-flex">
    <div id="sidebar" class="sidebar kld--site kld--min-width-dvw-100 kld--min-height-dvh-100">
        <header class="kld--display-flex kld--align-items-center adminDashboardNavbar custom-pattern">
            <section class="adminNavbarContent kld--navbar kld--display-flex kld--align-items-center">
                <a href="/user/dashboard">
                    <p class="kld--text-color-white kld--site-title dashboardTitle">Sari-Savvy Store</p>
                </a>
                <ul class="kld--text-color-white kld--display-flex kld--align-items-center navbarLink">
                    <li class="kld--padding-1"><a href="/user/products"
                            class="kld--text-color-info kld--text-hover-info-light-4">Products</a></li>|
                    <li class="kld--padding-1"><a href="/user/records"
                            class="kld--text-color-white kld--text-hover-info-light-4">Users</a></li>|
                    <li class="kld--padding-1"><a href="/user/statistics"
                            class="kld--text-color-white kld--text-hover-info-light-4">Statistics</a></li>|
                    <li class="kld--padding-1"><a href="/user/transactions"
                            class="kld--text-color-white kld--text-hover-info-light-4">Transactions</a></li>
                </ul>
                <section class="navbarProfile kld--text-color-white">
                    <a href="/user/profile" class="kld--text-color-white kld--text-hover-info-light-4 kld--display-flex
                        kld--align-items-center kld--justify-center">
                        <div class="kld--display-flex kld--align-items-center kld--justify-center kld--margin-right-1">
                            @if($user->profile_picture)
                                <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture"
                                    class="navbar-profile">
                            @else
                                <img src="{{ asset('assets/img/default-profile.jpg') }}"
                                    alt="Default Profile Picture" class="navbar-profile">
                            @endif
                        </div>
                        <div>
                            {{ $user->first_name }}
                            {{ $user->last_name }}
                        </div>
                    </a>
                </section>
            </section>
            <section class="mobileHamburger kld--margin-right-2">
                <!-- <button type="button" class="hamburgerIcon">
                    <i class="fa-solid fa-bars kld--font-size-large kld--text-color-white"></i>
                </button> -->
                <input type="checkbox" name="check" id="check" class="checkbox kld--display-none">
                <label for="check" class="margin-right-1" class="hamburger">
                    <i class="fa fa-bars border-radius-full kld--text-color-white kld--font-size-large hamburger"></i>
                </label>
            </section>
        </header>
        <main class="kld--container kld--margin-top-1">
            <section>
                <nav>
                    <ul>
                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="/user/products">Products</a>
                            </p>
                        </li>
                        <hr class="kld--margin-top-half kld--margin-bottom-half">
                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="/user/records">Users</a>
                            </p>
                        </li>
                        <hr class="kld--margin-top-half kld--margin-bottom-half">
                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="/user/statistics">Statistics</a>
                            </p>
                        </li>
                        <hr class="kld--margin-top-half kld--margin-bottom-half">
                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="/user/transactions">Transactions</a>
                            </p>
                        </li>
                    </ul>
                </nav>
            </section>
        </main>
        <footer class="kld--container kld--margin-bottom-1 ">
            <nav>
                <ul>
                    <li>
                        <p class="kld--text-align-center kld--padding-bottom-half">
                            <a class="kld--font-size-medium kld--button-primary kld--text-color-white kld--padding-button-2 kld--border-radius-medium kld--min-width-percent-100 kld--display-block"
                                href="/user/profile">Profile</a>
                        </p>
                    </li>
                    <hr class="kld--margin-top-half kld--margin-bottom-half">
                    <li>
                        <p class="kld--text-align-center">
                            <form action="{{ route('logout') }}" method="post"
                                class="kld--margin-top-1">
                                @csrf
                                <button type="submit"
                                    class="kld--button-red kld--text-color-white kld--padding-button-2 kld--border-radius-medium kld--min-width-percent-100">Logout</button>
                            </form>
                        </p>
                    </li>
                </ul>
            </nav>
        </footer>
    </div>
    <section class="kld--site kld--min-width-dvw-100">
        <header class="kld--display-flex kld--align-items-center adminDashboardNavbar custom-pattern">
            <section class="adminNavbarContent kld--navbar kld--display-flex kld--align-items-center">
                <a href="/user/dashboard">
                    <p class="kld--text-color-white kld--site-title dashboardTitle">Sari-Savvy Store</p>
                </a>
                <ul class="kld--text-color-white kld--display-flex kld--align-items-center navbarLink">
                    <li class="kld--padding-1"><a href="#"
                            class="kld--text-color-info kld--text-hover-info-light-4">Products</a></li>|
                    <li class="kld--padding-1"><a href="{{ route('posUserDashboard.records') }}"
                            class="kld--text-color-white kld--text-hover-info-light-4">Users</a></li>|
                    <li class="kld--padding-1"><a href="/user/statistics"
                            class="kld--text-color-white kld--text-hover-info-light-4">Statistics</a></li>|
                    <li class="kld--padding-1"><a href="/user/transactions"
                            class="kld--text-color-white kld--text-hover-info-light-4">Transactions</a></li>
                </ul>
                <section class="navbarProfile kld--text-color-white">
                    <a href="/user/profile" class="kld--text-color-white kld--text-hover-info-light-4 kld--display-flex
                        kld--align-items-center kld--justify-center">
                        <div class="kld--display-flex kld--align-items-center kld--justify-center kld--margin-right-1">
                            @if($user->profile_picture)
                                <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture"
                                    class="navbar-profile">
                            @else
                                <img src="{{ asset('assets/img/default-profile.jpg') }}"
                                    alt="Default Profile Picture" class="navbar-profile">
                            @endif
                        </div>
                        <div>
                            {{ $user->first_name }}
                            {{ $user->last_name }}
                        </div>
                    </a>
                </section>
            </section>
            <section class="mobileHamburger kld--margin-right-2">
                <input type="checkbox" name="check" id="check" class="checkbox kld--display-none">
                <label for="check" class="margin-right-1" class="hamburger">
                    <i class="fa fa-bars border-radius-full kld--text-color-white kld--font-size-large hamburger"></i>
                </label>
            </section>
        </header>
        <main>
            <div class="header kld--margin-top-2">
                <h1 class="kld--text-color-white kld--text-align-center">Product Record</h1>
            </div>
            <section class="kld--container kld--margin-top-1">
                @if(session('success'))
                    <div id="success-message"
                        class="kld--bac kld--background-color-secondary kld--min-width-percent-100 kld--text-color-white kld--padding-1 kld--border-radius-medium kld--margin-bottom-1">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-container">
                    <div class="table-navbar">
                        <div class="search-bar">
                            <form id="search-bar-container" class="search-bar-container" action="" method="GET">
                                <input class="search-bar-input" type="text" name="q" value=""
                                    placeholder="Search for products...">
                                <button class="search-button" type="submit">
                                    <i class="fa-solid fa-magnifying-glass kld--background-color-white"></i>
                                </button>
                            </form>
                        </div>
                        <div class=" kld--display-flex kld--justify-center kld--text-color-white">
                            {{ $products->links() }}
                        </div>
                        <div class=" kld--display-flex kld--justify-center kld--text-color-white">
                            {{ $products->links('vendor.pagination.custom-pagination') }}
                        </div>
                    </div>
                    <div class="products-table kld--margin-bottom-2">
                        <table class="">
                            <thead class="">
                                <tr class="sticky">
                                    <th class="kld--text-align-center">Image</th>
                                    <th class="kld--text-align-center">Product</th>
                                    <th class="kld--text-align-center">Quantity</th>
                                    <th class="kld--text-align-center">Price</th>
                                    <th class="kld--text-align-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="" class="">
                                @foreach($products as $product)
                                    @if($product->quantity > 0)
                                        <tr
                                            class="table-row{{ $loop->last ? ' last-row' : '' }}">
                                            <td class="center-content">
                                                <div
                                                    class="kld--display-flex kld--align-items-center kld--justify-center">
                                                    @if($product->product_image)
                                                        <img src="{{ Storage::url($product->product_image) }}"
                                                            alt="Product Image" class="center-image">
                                                    @else
                                                        <img src="{{ asset('assets/img/default-product.jpg') }}"
                                                            alt="Default Product Image" class="center-image">
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="center-content">{{ $product->product_name }}</td>
                                            <td class="center-content">{{ $product->quantity }}</td>
                                            <td class="center-content">{{ $product->price }}</td>
                                            <td
                                                class="{{ $loop->last ? 'last-td-last-row' : '' }} table-button center-content">
                                                <form action="{{ route('add-to-cart') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <button type="submit"
                                                        class="kld--button-secondary kld--text-color-white kld--padding-button-1 kld--border-radius-medium">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="kld--display-flex kld--justify-flex-end kld--margin-bottom-2 kld--align-items-center">
                        <button type="button" onclick="printProducts()"
                            class="responsive-button kld--button-purple kld--margin-left-half kld--border-radius-medium
                            kld--text-color-white">
                            <i class="fa-solid fa-print"></i> Print Products Record
                        </button>
                    </div>
                </div>
                <hr>
                <div class="products-sidebar kld--margin-top-2">
                    <div class="cart-container kld--text-color-white">
                        <h2>Cart</h2>
                        @if($cartItems->isEmpty())
                            <p class="kld--padding-1">No items in cart.</p>
                        @else
                            <form class="cart" action="{{ route('bulk-remove-from-cart') }}"
                                method="POST">
                                @csrf
                                <ul>
                                    <li class="kld--margin-1">
                                        <input type="checkbox" id="select-all" class="select-all">
                                        <label for="select-all">Select All</label>
                                    </li>
                                    @foreach($cartItems as $item)
                                        <li class="cart-item kld--border-radius-medium">
                                            <input type="checkbox" name="cart_ids[]" value="{{ $item->cart_id }}">
                                            <td class="center-content">
                                                <div class="kld--display-flex kld--align-items-center">
                                                    @if($item->product->product_image)
                                                        <img src="{{ Storage::url($item->product->product_image) }}"
                                                            alt="Product Image" class="center-image">
                                                    @else
                                                        <img src="{{ asset('assets/img/default-product.jpg') }}"
                                                            alt="Default Product Image" class="center-image">
                                                    @endif
                                                </div>
                                            </td>
                                            <strong>{{ $item->product->product_name }}</strong><br>
                                            Quantity: {{ $item->quantity }}<br>
                                            Price: {{ $item->price }}<br>
                                            <a href="#"
                                                class="kld--button-red kld--text-color-white kld--padding-button-1 kld--border-radius-medium"
                                                onclick="submitForm('{{ route('decreaseProduct', ['id' => $item->cart_id]) }}')">-</a>
                                            <a href="#"
                                                class="kld--button-secondary kld--text-color-white kld--padding-button-1 kld--border-radius-medium"
                                                onclick="submitForm('{{ route('increaseProduct', ['id' => $item->cart_id]) }}')">+</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="kld--display-flex kld--justify-flex-end kld--margin-1 kld--margin-bottom-2">
                                    <button type="submit"
                                        class="delete-selected-items kld--button-red kld--text-color-white kld--padding-button-2 kld--border-radius-medium">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </form>
                            <form id="item-action-form" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endif
                    </div>
                    <div class="receipt-container kld--text-color-white">
                        <h2>Receipt</h2>
                        <form class="kld--padding-left-1 kld--padding-right-1"
                            action="{{ route('calculate-receipt') }}" method="POST">
                            @csrf
                            <div class="">
                                <label for="cashier">Cashier: </label>
                                <select
                                    class="kld--margin-top-half kld--form-content kld--padding-half kld--border-radius-medium"
                                    name="cashier" id="cashier">
                                    @foreach($cashiers as $cashier)
                                        <option value="{{ $cashier->user_id }}">{{ $cashier->first_name }}
                                            {{ $cashier->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment_method">Payment Method: </label>
                                <select
                                    class="kld--min-width-percent-100 kld--margin-top-half kld--form-content kld--padding-half kld--border-radius-medium"
                                    name="payment_method" id="payment_method">
                                    @foreach($paymentMethods as $method)
                                        <option value="{{ $method->payment_method_id }}">
                                            {{ $method->payment_method }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount: </label>
                                <select
                                    class="kld--margin-top-half kld--form-content kld--padding-half kld--border-radius-medium"
                                    name="discount" id="discount">
                                    @foreach($discounts as $discount)
                                        <option value="{{ $discount->discount_id }}">{{ $discount->discount_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="total_amount">Total Amount: </label>
                                <p class="kld--margin-top-half kld-- kld--background-color-white kld--text-color-black kld--form-content kld--padding-half kld--border-radius-medium"
                                    id="total_amount">{{ $totalAmount }}</p>
                            </div>
                            <div class="form-group">
                                <label for="amount_paid">Amount Paid: </label>
                                <input
                                    class="kld--margin-top-half kld--form-content kld--padding-half kld--border kld--border-radius-medium"
                                    type="number" step="0.01" name="amount_paid" id="amount_paid"
                                    oninput="calculateChange()">
                            </div>
                            @error('amount_paid')
                                <div class="kld--text-color-error-light-2 kld--padding-bottom-1">{{ $message }}</div>
                            @enderror
                            <div class="kld--min-width-percent-100 kld--display-flex kld--justify-flex-end">
                                <button type="submit"
                                    class="kld--button-primary kld--text-color-white kld--border-radius-medium kld--padding-button-2 kld--margin-1 kld--margin-bottom-2"
                                    onclick="calculateTotalWithDiscount()">Calculate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </section>
</section>

<!-- Message timer -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 1000); // Hide success message after 3 seconds
        }
    });
</script>

<!-- Select all button for items in the cart -->
<script>
    document.getElementById('select-all').onclick = function () {
        var checkboxes = document.querySelectorAll('input[name="cart_ids[]"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    };
</script>

<!-- Increase or decrease item quantity in the cart -->
<script>
    function submitForm(action) {
        var form = document.getElementById('item-action-form');
        form.action = action;
        form.submit();
    }
</script>

<!-- Print Products Record -->
<script>
    function printProducts() {
        fetch("{{ route('fetchAllProductsforUsers') }}")
            .then(response => response.json())
            .then(products => {
                products.sort((a, b) => a.product_name.localeCompare(b.product_name)); // Sort by product name
                let printWindow = window.open('', '', 'height=600,width=800');
                printWindow.document.write('<html><head><title>All Products</title>');
                printWindow.document.write(
                    '<style>table { width: 100%; border-collapse: collapse; } th, td { padding: 8px; text-align: left; border: 1px solid #ddd; } th { background-color: #f2f2f2; }</style>'
                );
                printWindow.document.write('</head><body>');
                printWindow.document.write('<h1>All Products</h1>');
                printWindow.document.write(
                    '<table><thead><tr><th>Product Name</th><th>Quantity</th><th>Price</th><th>Supplier</th><th>Expiration Date</th><th>Created At</th><th>Updated At</th></tr></thead><tbody>'
                );
                products.forEach(product => {
                    printWindow.document.write(`<tr>
                        <td>${product.product_name}</td>
                        <td>${product.quantity}</td>
                        <td>${product.price}</td>
                        <td>${product.supplier ? product.supplier.supplier : 'N/A'}</td>
                        <td>${product.expiration_date ?? 'N/A'}</td>
                        <td>${product.created_at}</td>
                        <td>${product.updated_at}</td>
                    </tr>`);
                });
                printWindow.document.write('</tbody></table>');
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            });
    }
</script>

<script src="/assets/js/mobile-sidebar.js"></script>
@endsection
