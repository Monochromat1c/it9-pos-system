@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/adminDashboard.css">
<title>Welcome!</title>

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
            <section class="kld--container">
                <section class="kld--margin-top-2 kld--margin-bottom-2">
                        <section class="card-container">
                            <a href="/admin/products" class="admin-dashboard-card-products admin-dashboard-card-products-hover card_product">
                                <div class="admin-dashboard-card-products-body">
                                    <img src="/assets/img/products-icon.png" width="123" height="123" alt=""
                                        class="card-image">
                                    <h2 class="kld--text-color-white kld--margin-bottom-1 nowrap">Products</h2>
                                    <p class="kld--text-color-white">Browse and manage the inventory of available items
                                        in
                                        the
                                        store. Easily add,
                                        update,
                                        or remove products as needed.
                                    </p>
                                </div>
                                <footer
                                    class="kld--text-align-center kld--text-color-white admin-dashboard-card-products-footer">
                                    Click here to view.
                                </footer>
                            </a>
                            <a href="/admin/users" class="admin-dashboard-card-records admin-dashboard-card-records-hover card_product">
                                <div class="admin-dashboard-card-records-body">
                                    <img src="/assets/img/records-icon.png" width="123" height="123" alt=""
                                        class="card-image">
                                    <h2 class="kld--text-color-white kld--margin-bottom-1 nowrap">Users</h2>
                                    <p class="kld--text-color-white">Access and maintain the database of users and
                                        employees. View, edit, or delete records to keep information up-to-date.
                                    </p>
                                </div>
                                <footer
                                    class="kld--text-align-center kld--text-color-white admin-dashboard-card-records-footer">
                                    Click here to view.
                                </footer>
                            </a>
                            <a href="{{ route('admin.statistics') }}"
                                class="admin-dashboard-card-statistics admin-dashboard-card-statistics-hover card_product">
                                <div class="admin-dashboard-card-statistics-body">
                                    <img src="/assets/img/statistics-icon.png" width="123" height="123" alt=""
                                        class="card-image kld--padding-1">
                                    <h2 class="kld--text-color-white kld--margin-bottom-1 nowrap">Statistics</h2>
                                    <p class="kld--text-color-white">View detailed analytics and performance metrics of
                                        the store. Track sales trends, inventory levels, and more.
                                    </p>
                                </div>
                                <footer
                                    class="kld--text-align-center kld--text-color-white admin-dashboard-card-statistics-footer">
                                    Click here to view.
                                </footer>
                            </a>
                            <a href="/admin/view/transactions"
                                class="admin-dashboard-card-transactions admin-dashboard-card-transactions-hover card_product">
                                <div class="admin-dashboard-card-transactions-body">
                                    <img src="/assets/img/transactions-icon.png" width="123" height="123" alt=""
                                        class="card-image kld--padding-1">
                                    <h2 class="kld--text-color-white kld--margin-bottom-1 nowrap">Transactions</h2>
                                    <p class="kld--text-color-white">Monitor and review all store transactions. Manage
                                        sales, returns, and other financial activities efficiently.
                                    </p>
                                </div>
                                <footer
                                    class="kld--text-align-center kld--text-color-white admin-dashboard-card-transactions-footer">
                                    Click here to view.
                                </footer>
                            </a>                        
                        </section>
                </section>
            </section>
        </main>
    </section>
</section>

<script src="/assets/js/mobile-sidebar.js"></script>
@endsection
