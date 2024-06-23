@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap(for pagination).min.css">
<link rel="stylesheet" href="/assets/css/adminProducts.css">
<title>Profile</title>

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
        <main>
            <div class="header kld--margin-top-2">
                <h1 class="kld--text-color-white kld--text-align-center">Profile</h1>
            </div>
            <section class="kld--container kld--margin-top-1 responsive-container kld--margin-bottom-2">
                <form action="{{ route('profile.updatePicture') }}" method="post" 
                    enctype="multipart/form-data" class="kld--margin-bottom-1">
                    @csrf
                        @if(session('success'))
                        <div id="success-message"
                            class="kld--background-color-secondary kld--min-width-percent-100 kld--text-color-white kld--padding-1 kld--border-radius-medium kld--margin-bottom-1">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="kld--text-color-error-light-2 kld--padding-bottom-1">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    @if(Auth::user()->profile_picture)
                        <div class="kld--display-flex kld--min-width-percent-100 kld--justify-center kld--margin-bottom-1">
                            <img src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="Profile Picture"
                                width="150" class="profile-picture">
                        </div>
                    @endif
                    <label for="profile_picture" class="kld--text-color-white">Profile Picture:</label>
                    <input type="file"
                        class="kld--border upload-button kld--display-block kld--min-width-percent-100 kld--margin-bottom-1 kld--margin-top-half"
                        id="profile_picture" name="profile_picture" accept="image/*">
                    <button type="submit" class="kld--button-secondary kld--text-color-white kld--padding-button-2
                            kld--border-radius-medium kld--min-width-percent-100 kld--margin-bottom-1">
                        Upload
                    </button>
                </form>
                <hr class="kld--margin-bottom-1">
                <form action="{{ route('profile.updatePassword') }}" method="post">
                    @csrf
                    <h2 class="kld--text-color-white kld--margin-bottom-1">
                        Change your password:
                    </h2>
                    <label for="current_password" class="kld--text-color-white">Current Password:</label>
                    <input type="password"
                        class="kld--padding-1 kld--border kld--border-radius-medium kld--min-width-percent-100 kld--margin-bottom-1 kld--margin-top-half"
                        id="current_password" name="current_password" required>
                    <label for="new_password" class="kld--text-color-white">New Password:</label>
                    <input type="password"
                        class="kld--padding-1 kld--border kld--border-radius-medium kld--min-width-percent-100 kld--margin-bottom-1 kld--margin-top-half"
                        id="new_password" name="new_password" required>
                    <label for="new_password_confirmation" class="kld--text-color-white">Confirm New Password:</label>
                    <input type="password"
                        class="kld--padding-1 kld--border kld--border-radius-medium kld--min-width-percent-100 kld--margin-bottom-1 kld--margin-top-half"
                        id="new_password_confirmation" name="new_password_confirmation" required>
                    <button type="submit"
                        class="kld--button-primary kld--text-color-white kld--padding-button-2 kld--border-radius-medium
                        kld--min-width-percent-100 kld--margin-bottom-2 kld--margin-top-1">Update
                        Password
                    </button>
                </form>
                <hr class="display-hidden-on-mobile">
                <form action="{{ route('logout') }}" method="post" class="kld--margin-top-2">
                    @csrf
                    <button type="submit"
                        class="display-hidden-on-mobile kld--button-red kld--text-color-white kld--padding-button-2
                        kld--border-radius-medium kld--min-width-percent-100">Logout</button>
                </form>
            </section>
        </main>
    </section>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 1000);
        }
    });
</script>

<script src="/assets/js/mobile-sidebar.js"></script>
@endsection
