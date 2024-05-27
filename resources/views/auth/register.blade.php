<x-site.template>
    @section('styles')
    <style>
        .text-danger {
            color: red;
        }
    </style>
    @endsection
    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Create New Account</h1>

            <form class="main-form" method="POST" action="{{ route('register') }}">
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
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" class="form-control" placeholder="First name" name="first_name" value="{{ old('first_name') }}">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{ old('last_name') }}">
                    </div>
                    <!-- <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" class="form-control" placeholder="Mid name (optional)" name="mid_name" value="{{ old('mid_name') }}">
                    </div> -->
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="email" name="email" class="form-control" placeholder="Email address.." value="{{ old('email') }}">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="number" min="1" class="form-control" placeholder="Age" name="age" value="{{ old('age') }}">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="genderMale" name="gender" value="male">
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="genderFemale" name="gender" value="female">
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 wow zoomIn" style="width: 100%;">Register</button>
                <div class="text-center mt-3 wow fadeInRight">
                    <a href="{{ route('login') }}" class="btn btn-link"><span class="text-dark">Already have an account? </span>Login</a>
                </div>
            </form>
        </div>
    </div> <!-- .page-section -->
</x-site.template>
