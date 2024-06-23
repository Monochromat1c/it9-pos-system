<style>
    .center-content {
        text-align: center;
        vertical-align: middle;
    }

    .center-image {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap(for pagination).min.css">
<link rel="stylesheet" href="/assets/css/adminProducts.css">
<title>Records</title>

<section class="adminDashboardBody kld--display-flex">
    <section class="mobileSidebar kld--display-none"></section>
    <section class="kld--site kld--min-width-dvw-100">
        <header class="kld--display-flex kld--align-items-center adminDashboardNavbar custom-pattern">
            <section class="adminNavbarContent kld--navbar kld--display-flex kld--align-items-center">
                <a href="/admin/dashboard">
                    <p class="kld--text-color-white kld--site-title dashboardTitle">Sari-Savvy Store</p>
                </a>
                <ul class="kld--text-color-white kld--display-flex kld--align-items-center navbarLink">
                    <li class="kld--padding-1"><a href="/admin/products"
                            class="kld--text-color-white kld--text-hover-info-light-4">Products</a></li>|
                    <li class="kld--padding-1"><a href="/admin/records"
                            class="kld--text-color-info kld--text-hover-info-light-4">Users</a></li>|
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
                <button type="button" class="hamburgerIcon">
                    <i class="fa-solid fa-bars kld--font-size-large kld--text-color-white"></i>
                </button>
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
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Suffix</th>
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
                                    <td class="center-content">{{ $user->suffix_name }}</td>
                                    <td class="center-content">
                                        <a href="/admin/{id}"
                                            class="kld--button-secondary kld--padding-button-2 kld--border-radius-medium kld kld--text-color-white">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                        <a href="{{ route('users.editUser', $user->user_id) }}"
                                            class="kld--button-info kld--padding-button-2 kld--border-radius-medium kld kld--text-color-white kld--margin-half">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form
                                            action="{{ route('users.destroyUser', $user->user_id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="kld--button-error kld--padding-button-2 kld--border-radius-medium kld kld--text-color-white"
                                                onclick="return confirm('Are you sure you want to delete this user?');">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="kld--display-flex kld--justify-space-between kld--margin-top-1 kld--align-items-center">
                    <a href="{{ route('users.createUser') }}" class="kld--text-color-white">
                        Want to add a new user? <span class="kld--text-color-info">Click here.</span>
                    </a>
                    <button type="button" onclick="printUsers()"
                        class="kld--padding-button-1 kld--button-purple kld--margin-left-half kld--border-radius-medium kld--text-color-white">
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
        fetch("{{ route('fetchAllUsersforAdmin') }}")
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
@endsection
