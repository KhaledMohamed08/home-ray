<x-site.template>
    @csrf
    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Login To Your Account</h1>

            <form class="main-form" method="POST" action="{{ route('login') }}">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row mt-5">
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 wow zoomIn" style="width: 100%;">Login</button>
                <div class="text-center mt-3 wow fadeInRight">
                    <a href="{{ route('register') }}" class="btn btn-link"><span class="text-dark">have not an account yet? </span>Register</a>
                </div>
            </form>
        </div>
    </div> <!-- .page-section -->
</x-site.template>