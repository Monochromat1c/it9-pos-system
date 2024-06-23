@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="/assets/css/loginPage.css">
<title>Log In Page</title>

<section class="body loginPageBody">
    <section class="contentContainer kld--container kld--min-height-dvh-100">
        <section class="formContainer kld--card">
            <form action="{{ route('processLogin') }}" method="post" class="kld--padding-2">
                @csrf
                <section class="kld--form-flex">
                    <h1 class="kld--text-align-center kld--margin-bottom-2 kld--text-color-white">Please Log In To
                        Continue</h1>
                    @if($errors->any())
                        <div class="kld--text-color-error-light-2 kld--padding-bottom-1">
                            {{ $errors->first('error') }}
                        </div>
                    @endif
                    <label for="username" class="kld--text-color-white">Username:</label>
                    <input type="text" class="kld--padding-1 kld--border kld--border-radius-small kld--margin-bottom-1"
                        id="username" name="username" placeholder="Enter your username"
                        value="{{ old('username') }}" required />
                    <label for="password" class="kld--text-color-white">Password:</label>
                    <input type="password"
                        class="kld--padding-1 kld--border kld--border-radius-small kld--margin-bottom-half"
                        id="password" name="password" placeholder="Enter your password" required />
                </section>
                <button type="submit" class="kld--button-orange loginButton kld--text-color-white kld--padding-button-2
                    kld--border-radius-small kld--min-width-percent-100 kld--margin-top-1">
                    <span>Log In</span>
                </button>
            </form>
        </section>
    </section>
</section>
@endsection
