@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap(for pagination).min.css">
<link rel="stylesheet" href="/assets/css/adminProducts.css">
<title>Products</title>

<section class="adminDashboardBody kld--display-flex">
    <div id="sidebar" class="sidebar kld--site kld--min-width-dvw-100 kld--min-height-dvh-100">
        <header class="kld--display-flex kld--align-items-center adminDashboardNavbar custom-pattern">
            <section class="adminNavbarContent kld--navbar kld--display-flex kld--align-items-center">
                <a href="/admin/dashboard">
                    <p class="kld--text-color-white kld--site-title dashboardTitle">Sari-Savvy Store</p>
                </a>
                <ul class="kld--text-color-white kld--display-flex kld--align-items-center navbarLink">
                    <li class="kld--padding-1"><a href="#"
                            class="kld--text-color-info kld--text-hover-info-light-4">Products</a></li>|
                    <li class="kld--padding-1"><a href="/admin/users"
                            class="kld--text-color-white kld--text-hover-info-light-4">Users</a></li>|
                    <li class="kld--padding-1"><a href="/admin/view/statistics"
                            class="kld--text-color-white kld--text-hover-info-light-4">Statistics</a></li>|
                    <li class="kld--padding-1"><a href="{{ route('admin.transactions') }}"
                            class="kld--text-color-white kld--text-hover-info-light-4">Transactions</a></li>
                </ul>
                <section class="navbarProfile kld--text-color-white">
                    <a href="/admin/profile" class="kld--text-color-white kld--text-hover-info-light-4 kld--display-flex
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
                                    href="/admin/products">Products</a>
                            </p>
                        </li>
                        <hr class="kld--margin-top-half kld--margin-bottom-half">

                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="/admin/users">Users</a>
                            </p>
                        </li>
                        <hr class="kld--margin-top-half kld--margin-bottom-half">

                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="/admin/view/statistics">Statistics</a>
                            </p>
                        </li>
                        <hr class="kld--margin-top-half kld--margin-bottom-half">

                        <li>
                            <p class="kld--text-align-center">
                                <a class="kld--font-size-medium kld--padding-1 kld--text-color-white kld--display-block"
                                    href="{{ route('admin.transactions') }}">Transactions</a>
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
                                href="/admin/profile">Profile</a>
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
                <a href="/admin/dashboard">
                    <p class="kld--text-color-white kld--site-title dashboardTitle">Sari-Savvy Store</p>
                </a>
                <ul class="kld--text-color-white kld--display-flex kld--align-items-center navbarLink">
                    <li class="kld--padding-1"><a href="#"
                            class="kld--text-color-info kld--text-hover-info-light-4">Products</a></li>|
                    <li class="kld--padding-1"><a href="/admin/users"
                            class="kld--text-color-white kld--text-hover-info-light-4">Users</a></li>|
                    <li class="kld--padding-1"><a href="/admin/view/statistics"
                            class="kld--text-color-white kld--text-hover-info-light-4">Statistics</a></li>|
                    <li class="kld--padding-1"><a href="{{ route('admin.transactions') }}"
                            class="kld--text-color-white kld--text-hover-info-light-4">Transactions</a></li>
                </ul>
                <section class="navbarProfile kld--text-color-white">
                    <a href="/admin/profile" class="kld--text-color-white kld--text-hover-info-light-4 kld--display-flex
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
        <main>
            <section class="kld--container">
                <div class="header kld--margin-top-2 kld--margin-bottom-1">
                    <h1 class="kld--text-color-white kld--text-align-center">Product Record</h1>
                </div>
                @if(session('success'))
                    <div id="success-message"
                        class="kld--bac kld--background-color-secondary kld--min-width-percent-100 kld--text-color-white kld--padding-1 kld--border-radius-medium kld--margin-bottom-1">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-navbar">
                    <div class="search-bar">
                        <form id="search-bar-container" class="search-bar-container " action="" method="GET">
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
                                <th class="kld--text-align-center">Expiration Date</th>
                                <th class="kld--text-align-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="" class="">
                            @foreach($products as $product)
                                @if($product->quantity > 0)
                                    <tr
                                        class="table-row{{ $loop->last ? ' last-row' : '' }}">
                                        <td class="center-content">
                                            <div class="kld--display-flex kld--align-items-center kld--justify-center">
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
                                        <td class="center-content">
                                            {{ $product->expiration_date ?? 'N/A' }}
                                        </td>
                                        <td class="center-content button-container">
                                            <a href="{{ route('products.showProduct', $product->id) }}"
                                                class="kld--button-secondary kld--padding-button-1 kld--border-radius-medium kld kld--text-color-white">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            <a href="{{ route('products.editProduct', $product->id) }}"
                                                class="kld--button-info kld--padding-button-1 kld--border-radius-medium kld kld--text-color-white kld--margin-half">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <form
                                                action="{{ route('products.destroyProduct', $product->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="kld--button-error kld--padding-button-1 kld--border-radius-medium kld kld--text-color-white"
                                                    onclick="return confirm('Are you sure you want to delete this user?');">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="kld--display-flex kld--justify-space-between kld--margin-bottom-2 kld--align-items-center">
                    <a href="{{ route('products.createProduct') }}" class="kld--text-color-white">Want
                        to add another product? <span class="kld--text-color-info">Click here.</span></a>
                    <button type="button" onclick="printProducts()" class="responsive-button kld--button-purple kld--margin-left-half kld--border-radius-medium
                        kld--text-color-white">
                        <i class="fa-solid fa-print"></i> Print Product Record
                    </button>
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

<!-- Print Products Record -->
<script>
    function printProducts() {
        fetch("{{ route('fetchAllProductsforAdmin') }}")
            .then(response => response.json())
            .then(products => {
                products.sort((a, b) => a.product_name.localeCompare(b.product_name)); // Sort by product name
                let printWindow = window.open('', '', 'height=400,width=400');
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
