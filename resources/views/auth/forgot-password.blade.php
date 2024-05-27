<x-site.template>
    @section('styles')
    <style>
        .main-form {
            display: inline;
        }
    </style>
    @endsection
    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Forget Password</h1>
            <p class="text-center">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>
            <form class="main-form m-5" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row mt-5">
                    <div class="col-12 py-2 wow fadeInRight">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 wow zoomIn" style="width: 100%;">Send Password Reset Link</button>
            </form>
        </div>
    </div> <!-- .page-section -->
</x-site.template>