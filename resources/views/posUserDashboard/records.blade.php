@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap(for pagination).min.css">
<link rel="stylesheet" href="/assets/css/adminProducts.css">
<title>Records</title>

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
                    <li class="kld--padding-1"><a href="{{ route('posUserDashboard.products') }}"
                            class="kld--text-color-white kld--text-hover-info-light-4">Products</a></li>|
                    <li class="kld--padding-1"><a href="#"
                            class="kld--text-color-info kld--text-hover-info-light-4">Users</a></li>|
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
            <section class="kld--container">
                <div class="header kld--margin-top-2 kld--margin-bottom-1">
                    <h1 class="kld--text-color-white kld--text-align-center">User Record</h1>
                </div>
                @if(session('success'))
                    <div id="success-message"
                        class="kld--bac kld--background-color-secondary kld--min-width-percent-100 kld--text-color-white kld--padding-1 kld--border-radius-medium kld--margin-bottom-1">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-navbar">
                    <div class="search-bar">
                        <form id="search-bar-container" class="search-bar-container" action="" method="GET">
                            <input class="search-bar-input" type="text" name="q" value=""
                                placeholder="Search for users...">
                            <button class="search-button" type="submit">
                                <i class="fa-solid fa-magnifying-glass kld--background-color-white"></i>
                            </button>
                        </form>
                    </div>
                    <div class="kld--display-flex kld--justify-center kld--text-color-white">
                        {{ $users->links() }}
                    </div>
                    <div class="kld--display-flex kld--justify-center kld--text-color-white">
                        {{ $users->links('vendor.pagination.custom-pagination') }}
                    </div>
                </div>
                <div class="users-table overflow-x-scroll overflow-y-scroll kld--margin-bottom-2 kld--margin-top-1">
                    <table class="">
                        <thead class="">
                            <tr class="sticky">
                                <th class="kld--text-align-center">Profile Picture</th>
                                <th class="kld--text-align-center">Last Name</th>
                                <th class="kld--text-align-center">First Name</th>
                                <th class="kld--text-align-center">Middle Name</th>
                                <th class="kld--text-align-center">Role</th>
                                <th class="kld--text-align-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="" class="">
                            @foreach($users as $user)
                                <tr
                                    class="table-row{{ $loop->last ? ' last-row' : '' }}">
                                    <td class="center-content">
                                        <div class="kld--display-flex kld--align-items-center kld--justify-center">
                                            @if($user->profile_picture)
                                                <img src="{{ Storage::url($user->profile_picture) }}"
                                                    alt="Profile Picture" class="center-image">
                                            @else
                                                <img src="{{ asset('assets/img/default-profile.jpg') }}"
                                                    alt="Default Profile Picture" class="center-image">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="center-content">{{ $user->last_name }}</td>
                                    <td class="center-content">{{ $user->first_name }}</td>
                                    <td class="center-content">{{ $user->middle_name }}</td>
                                    <td class="center-content">{{ $user->role->role }}</td>
                                    <td
                                        class="{{ $loop->last ? 'last-td-last-row' : '' }} center-content">
                                        <a href="{{ route('users.showUserforUsers', $user->user_id) }}"
                                            class="kld--button-secondary kld--padding-button-1 kld--border-radius-medium kld kld--text-color-white">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="kld--display-flex kld--justify-flex-end kld--margin-top-1 kld--align-items-center">
                    <button type="button" onclick="printUsers()"
                        class="responsive-button kld--button-purple kld--margin-left-half kld--border-radius-medium
                        kld--text-color-white">
                        <i class="fa-solid fa-print"></i> Print Users Record
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

<!-- Print User Data -->
<script>
    function printUsers() {
        fetch("{{ route('fetchAllUsersforUsers') }}")
            .then(response => response.json())
            .then(users => {
                users.sort((a, b) => a.last_name.localeCompare(b.last_name)); // Sort by last name
                let printWindow = window.open('', '', 'height=400,width=400');
                printWindow.document.write('<html><head><title>All Users</title>');
                printWindow.document.write(
                    '<style>table { width: 100%; border-collapse: collapse; } th, td { padding: 8px; text-align: left; border: 1px solid #ddd; } th { background-color: #f2f2f2; }</style>'
                    );
                printWindow.document.write('</head><body>');
                printWindow.document.write('<h1>All Users</h1>');
                printWindow.document.write(
                    '<table><thead><tr><th>Last Name</th><th>First Name</th><th>Middle Name</th><th>Suffix</th><th>Gender</th><th>Birthday</th><th>Address</th><th>Contact Number</th><th>Email</th><th>Username</th><th>Role</th></tr></thead><tbody>'
                    );
                users.forEach(user => {
                    printWindow.document.write(`<tr>
                    <td>${user.last_name}</td>
                    <td>${user.first_name}</td>
                    <td>${user.middle_name}</td>
                    <td>${user.suffix_name}</td>
                    <td>${user.gender.gender}</td>
                    <td>${user.birthday}</td>
                    <td>${user.address}</td>
                    <td>${user.contact_number}</td>
                    <td>${user.email}</td>
                    <td>${user.username}</td>
                    <td>${user.role.role}</td>
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
