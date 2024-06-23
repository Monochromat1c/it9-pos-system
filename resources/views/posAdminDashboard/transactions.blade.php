@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap(for pagination).min.css">
<link rel="stylesheet" href="/assets/css/adminProducts.css">
<title>Transactions</title>
<style>
    .transactions-table > *{
        color: white;
    }
</style>

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
                    <li class="kld--padding-1"><a href="/admin/products"
                            class="kld--text-color-white kld--text-hover-info-light-4">Products</a></li>|
                    <li class="kld--padding-1"><a href="/admin/users"
                            class="kld--text-color-white kld--text-hover-info-light-4">Users</a></li>|
                    <li class="kld--padding-1"><a href="/admin/view/statistics"
                            class="kld--text-color-white kld--text-hover-info-light-4">Statistics</a></li>|
                    <li class="kld--padding-1"><a href="/admin/view/transactions"
                            class="kld--text-color-info kld--text-hover-info-light-4">Transactions</a></li>
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
                <input type="checkbox" name="check" id="check" class="checkbox kld--display-none">
                <label for="check" class="margin-right-1" class="hamburger">
                    <i class="fa fa-bars border-radius-full kld--text-color-white kld--font-size-large hamburger"></i>
                </label>
            </section>
        </header>
        <main>
            <div class="header kld--margin-top-2 kld--margin-bottom-1">
                <h1 class="kld--text-color-white kld--text-align-center">Transaction Records</h1>
            </div>
            <section class="kld--container">
                @if(session('success'))
                    <div id="success-message"
                        class="kld--background-color-secondary kld--min-width-percent-100 kld--text-color-white kld--padding-1 kld--border-radius-medium kld--margin-bottom-1">
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
                        <div class="kld--display-flex kld--justify-center kld--text-color-white">
                            {{ $transactions->links() }}
                        </div>
                        <div class="kld--display-flex kld--justify-center kld--text-color-white">
                            {{ $transactions->links('vendor.pagination.custom-pagination') }}
                        </div>
                    </div>
                    <div
                        class="transactions-table overflow-y-scroll overflow-x-scroll kld--margin-top-1 kld--margin-bottom-2">
                        <table class="">
                            <thead class="">
                                <tr class="sticky">
                                    <th>Transaction ID</th>
                                    <th>Cashier</th>
                                    <th>Payment Method</th>
                                    <th>Discount</th>
                                    <th>Total Amount</th>
                                    <th>Amount Paid</th>
                                    <th>Change Amount</th>
                                    <th>Transaction Date</th>
                                    <th>Products Ordered</th>
                                </tr>
                            </thead>
                            <tbody id="" class="">
                                @foreach($transactions as $transaction)
                                    <tr
                                        class="table-row{{ $loop->last ? ' last-row' : '' }}">
                                        <td>{{ $transaction->transaction_id }}</td>
                                        <td>
                                            @if($transaction->user)
                                                {{ $transaction->user->first_name }}
                                                {{ $transaction->user->last_name }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $transaction->paymentMethod->payment_method }}</td>
                                        <td>{{ $transaction->discount ? $transaction->discount->discount_name : 'N/A' }}
                                        </td>
                                        <td>{{ $transaction->total_amount }}</td>
                                        <td>{{ $transaction->amount_paid }}</td>
                                        <td>{{ $transaction->change_amount }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                        <td>
                                            <ul>
                                                @foreach($transaction->products as $product)
                                                    <li>{{ $product->product_name }}
                                                        ({{ $product->pivot->quantity }} x
                                                        {{ $product->pivot->price }})</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

<script src="/assets/js/mobile-sidebar.js"></script>
@endsection
