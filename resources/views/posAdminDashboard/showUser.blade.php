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
                    <h1 class="kld--text-align-center">User Details</h1>
                    <hr class="kld--margin-bottom-1">
                    <div>
                        <strong>First Name:</strong>
                        {{ $user->first_name }}
                    </div>
                    <div>
                        <strong>Middle Name:</strong>
                        {{ $user->middle_name }}
                    </div>
                    <div>
                        <strong>Last Name:</strong>
                        {{ $user->last_name }}
                    </div>
                    <div>
                        <strong>Suffix:</strong>
                        {{ $user->suffix_name }}
                    </div>
                    <div>
                        <strong>Birthday:</strong>
                        {{ $user->birthday }}
                    </div>
                    <div>
                        <strong>Gender:</strong>
                        {{ $user->gender->gender }}
                    </div>
                    <div>
                        <strong>Address:</strong>
                        {{ $user->address }}
                    </div>
                    <div>
                        <strong>Contact Number:</strong>
                        {{ $user->contact_number }}
                    </div>
                    <div>
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                    <div>
                        <strong>Username:</strong>
                        {{ $user->username }}
                    </div>
                    <div>
                        <strong>Role:</strong>
                        {{ $user->role->role }}
                    </div>
                    <div class="kld--display-flex kld--justify-flex-end">
                        <a href="{{ route('admin-users') }}"
                            class="kld--padding-button-1 kld--button-error kld--border-radius-medium kld--text-color-white kld--margin-right-half kld--margin-top-1">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                        <button type="" onclick="window.print()"
                            class="kld--padding-button-1 kld--button-primary kld--margin-left-half kld--border-radius-medium
                            kld--text-color-white kld--margin-top-1">
                            <i class="fa-solid fa-print"></i>
                        </button>
                    </div>
                </div>
            </section>
        </main>
    </section>
</section>
@endsection
