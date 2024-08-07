<x-guest-layout>
    <div id="auth-left">
        <h1 class="auth-title">Log in.</h1>
        <p class="mb-5 auth-subtitle" style="font-size: smaller;">Log in with your data that you entered during registration.</p>
        @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ session('status') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4 form-group position-relative has-icon-left">
                <input class="form-control form-control-xl" type="email" name="email" placeholder="Email"
                    value="{{ old('email') }}">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="mb-4 form-group position-relative has-icon-left">
                <input type="password" class="form-control form-control-xl" name="password" placeholder="Password"
                    placeholder="Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <div class="form-check form-check-lg d-flex align-items-end">
                <input class="form-check-input me-2" type="checkbox" name="remember" id="flexCheckDefault">
                <label class="text-gray-600 form-check-label" for="flexCheckDefault">
                    Keep me logged in
                </label>
            </div>
            <button class="mt-5 shadow-lg btn btn-primary btn-block btn-lg">Log in</button>
        </form>
        <a href="{{ route('home') }}" class="mt-3 text-gray-600 d-block">
            kembali ke home
        </a>
    </div>
</x-guest-layout>