@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap(for pagination).min.css">
<link rel="stylesheet" href="/assets/css/adminProducts.css">
<link rel="stylesheet" href="/assets/css/userProducts.css">
<title>Add New User</title>

<section class="adminDashboardBody kld--display-flex">
    <section class="kld--site kld--min-width-dvw-100">
        <main>
            <div class="kld--container">
                <section class="edit-user kld--margin-bottom-3">
                    <div class="edit-user-container">
                        <h1 class="kld--text-align-center">Add New User</h1>
                        <hr>
                        <div class="kld--margin-top-1">
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
                            <form action="{{ route('users.storeUser') }}" method="POST"
                                enctype="multipart/form-data" id="form">
                                @csrf
                                <div class="form-group span">
                                    <label for="profile_picture">Profile Picture:</label>
                                    <input type="file" name="profile_picture"
                                        class="upload-button kld--min-width-percent-100">
                                </div>
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" name="first_name"
                                        value="{{ old('first_name') }}"
                                        class="form-control kld--border">
                                </div>
                                <div class="form-group">
                                    <label for="middle_name">Middle Name:</label>
                                    <input type="text" name="middle_name"
                                        value="{{ old('middle_name') }}"
                                        class="form-control kld--border">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                                        class="form-control kld--border">
                                </div>
                                <div class="form-group">
                                    <label for="suffix_name">Suffix:</label>
                                    <input type="text" name="suffix_name"
                                        value="{{ old('suffix_name') }}"
                                        class="form-control kld--border">
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Birthday:</label>
                                    <input type="date" name="birthday" value="{{ old('birthday') }}"
                                        class="form-control kld--border">
                                </div>
                                <div class="form-group">
                                    <label for="gender_id">Gender:</label>
                                    <select name="gender_id" class="form-control kld--border">
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->gender_id }}"
                                                {{ old('gender_id') == $gender->gender_id ? 'selected' : '' }}>
                                                {{ $gender->gender }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group span">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" value="{{ old('address') }}"
                                        class="form-control kld--border">
                                </div>
                                <div class="form-group">
                                    <label for="contact_number">Contact Number:</label>
                                    <input type="text" name="contact_number"
                                        value="{{ old('contact_number') }}"
                                        class="form-control kld--border">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control kld--border">
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role:</label>
                                    <select name="role_id" class="form-control kld--border">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->role_id }}"
                                                {{ old('role_id') == $role->role_id ? 'selected' : '' }}>
                                                {{ $role->role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" name="username" value="{{ old('username') }}"
                                        class="form-control kld--border">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" class="form-control kld--border">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control kld--border">
                                </div>
                                <div></div>
                                <div class="kld--display-flex kld--justify-flex-end kld--margin-top-1">
                                    <div>
                                        <a href="{{ route('admin-users') }}"
                                            class="kld--button-error kld--text-color-white responsive-button kld--border-radius-medium kld--margin-right-half">
                                            Cancel
                                        </a>
                                        <button type="submit"
                                            class="kld--button-primary kld--text-color-white responsive-button kld--border-radius-medium kld--margin-left-half">
                                            Add User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </section>
</section>
@endsection
