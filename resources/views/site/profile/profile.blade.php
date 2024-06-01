<x-site.template>
    @section('styles')
    <style>
        .page-section {
            padding: 40px 0;
        }

        .card {
            background-color: #fff;
            border: 1px solid #e3e6f0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card h6 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card p.text-muted {
            margin-bottom: 0;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        @media (max-width: 768px) {
            .card-body .row .col-12 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
    <style>
        .page-section {
            padding: 40px 0;
        }

        .card {
            background-color: #fff;
            border: 1px solid #e3e6f0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card h6 {
            font-weight: 600;
            font-size: 1.25rem;
            /* Larger font size for titles */
            margin-bottom: 10px;
        }

        .card p.text-muted {
            margin-bottom: 0;
            font-size: 1rem;
            /* Adjust font size for content */
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .nav-tabs .nav-link {
            color: #495057;
        }

        .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        @media (min-width: 768px) {
            .jumbotron h1 {
                font-size: 2rem;
                /* Adjust font size for medium-sized screens */
            }
        }

        @media (min-width: 992px) {
            .jumbotron h1 {
                font-size: 2.5rem;
                /* Adjust font size for large screens */
            }
        }

        @media (min-width: 1200px) {
            .jumbotron h1 {
                font-size: 3rem;
                /* Adjust font size for extra-large screens */
            }
        }
    </style>
    @endsection
    <div class="page-hero bg-image overlay-dark" style="background-image: url({{asset('SiteAssets/assets/img/bg_image_1.jpg')}});">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">Let's make your life happier</span>
                @auth
                <h1 class="display-4">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h1>
                @else
                <h1 class="display-4">Healthy Living</h1>
                @endauth
                <a href="#" class="btn btn-primary">go to your settings</a>
            </div>
        </div>
    </div>
    <div class="page-section bg-light">
        <div class="container-fluid">
            <h1 class="text-center wow fadeInUp mt-3" style="font-size: 2.5rem;">My Information</h1>
            <div class="row d-flex justify-content-center align-items-center mt-5">
                <div class="col-12 col-lg-10">
                    <div class="card" style="border-radius: .5rem;">
                        <div class="card-body">
                            <h6 style="font-size: 1.5rem;">Information</h6>
                            <hr class="mt-0 mb-4">
                            <div class="text-end mb-4">
                                <a href="#" class="btn btn-primary">Edit Information</a>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-3 mb-3">
                                    <h6 style="font-size: 1.25rem;">First Name</h6>
                                    <p class="text-muted" style="font-size: 1rem;">{{ auth()->user()->first_name }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <h6 style="font-size: 1.25rem;">Last Name</h6>
                                    <p class="text-muted" style="font-size: 1rem;">{{ auth()->user()->last_name }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <h6 style="font-size: 1.25rem;">Email</h6>
                                    <p class="text-muted" style="font-size: 1rem;">{{ auth()->user()->email }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <h6 style="font-size: 1.25rem;">Phone</h6>
                                    <p class="text-muted" style="font-size: 1rem;">{{ auth()->user()->phone }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <h6 style="font-size: 1.25rem;">Address</h6>
                                    <p class="text-muted" style="font-size: 1rem;">{{ auth()->user()->address }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <h6 style="font-size: 1.25rem;">Age</h6>
                                    <p class="text-muted" style="font-size: 1rem;">{{ auth()->user()->age }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <h6 style="font-size: 1.25rem;">Gender</h6>
                                    <p class="text-muted" style="font-size: 1rem;">{{ auth()->user()->gender }}</p>
                                </div>
                                <!-- Add additional fields here if needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light">
        <div class="page-section bg-light">
            <div class="container-fluid">
                <h1 class="text-center wow fadeInUp mt-3" style="font-size: 2.5rem;">My Activity</h1>
                <div class="row d-flex justify-content-center align-items-center mt-5">
                    <div class="col-12 col-lg-10">
                        <div class="card" style="border-radius: .5rem;">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">My Nursing</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">My Radiology</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="other-tab" data-bs-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">My Analtics</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                        <div class="row pt-3">
                                            @if (auth()->user()->nursingServices())
                                            @foreach (auth()->user()->nursingServices() as $service)    
                                            <div class="col-12 mb-2 mt-2">
                                                <h3 class="fadeInUp" style="font-size: 2rem; font-weight: bold;">{{ $service->name }}</h3>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Name</h6>
                                                <p class="text-muted">{{ $service->pivot->name}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Age</h6>
                                                <p class="text-muted">{{ $service->pivot->age}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Gender</h6>
                                                <p class="text-muted">{{ $service->pivot->gender}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Price</h6>
                                                <p class="text-muted">{{ $service->price}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Address</h6>
                                                <p class="text-muted">{{ $service->pivot->address}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Note</h6>
                                                <p class="text-muted">{{ $service->pivot->note}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>created_at</h6>
                                                <p class="text-muted">{{ $service->pivot->created_at}}</p>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="col-12 col-md-12 mb-3">
                                                <div class="jumbotron jumbotron-fluid" style="background-color: white;">
                                                    <div class="container d-flex flex-column justify-content-center align-items-center">
                                                        <h1 class="display-4" style="font-size: 2rem;">There Is No Nursing Yet!</h1>
                                                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                                                        <a href="{{ route('reservation.create') }}" class="btn btn-primary">Make Reservation</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row pt-3">
                                            @if (auth()->user()->radiologyServices())
                                            @foreach (auth()->user()->radiologyServices() as $service)    
                                            <div class="col-12 mb-2 mt-2">
                                                <h3 class="fadeInUp" style="font-size: 2rem; font-weight: bold;">{{ $service->name }}</h3>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Name</h6>
                                                <p class="text-muted">{{ $service->pivot->name}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Age</h6>
                                                <p class="text-muted">{{ $service->pivot->age}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Gender</h6>
                                                <p class="text-muted">{{ $service->pivot->gender}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Price</h6>
                                                <p class="text-muted">{{ $service->price}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Address</h6>
                                                <p class="text-muted">{{ $service->pivot->address}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Note</h6>
                                                <p class="text-muted">{{ $service->pivot->note}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>created_at</h6>
                                                <p class="text-muted">{{ $service->pivot->created_at}}</p>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="col-12 col-md-12 mb-3">
                                                <div class="jumbotron jumbotron-fluid" style="background-color: white;">
                                                    <div class="container d-flex flex-column justify-content-center align-items-center">
                                                        <h1 class="display-4" style="font-size: 2rem;">There Is No Nursing Yet!</h1>
                                                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                                                        <a href="{{ route('reservation.create') }}" class="btn btn-primary">Make Reservation</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                                    <div class="row pt-3">
                                            @if (auth()->user()->analysisServices())
                                            @foreach (auth()->user()->analysisServices() as $service)    
                                            <div class="col-12 mb-2 mt-2">
                                                <h3 class="fadeInUp" style="font-size: 2rem; font-weight: bold;">{{ $service->name }}</h3>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Name</h6>
                                                <p class="text-muted">{{ $service->pivot->name}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Age</h6>
                                                <p class="text-muted">{{ $service->pivot->age}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Gender</h6>
                                                <p class="text-muted">{{ $service->pivot->gender}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Price</h6>
                                                <p class="text-muted">{{ $service->price}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Address</h6>
                                                <p class="text-muted">{{ $service->pivot->address}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>Note</h6>
                                                <p class="text-muted">{{ $service->pivot->note}}</p>
                                            </div>
                                            <div class="col-6 col-md-3 mb-3">
                                                <h6>created_at</h6>
                                                <p class="text-muted">{{ $service->pivot->created_at}}</p>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="col-12 col-md-12 mb-3">
                                                <div class="jumbotron jumbotron-fluid" style="background-color: white;">
                                                    <div class="container d-flex flex-column justify-content-center align-items-center">
                                                        <h1 class="display-4" style="font-size: 2rem;">There Is No Nursing Yet!</h1>
                                                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                                                        <a href="{{ route('reservation.create') }}" class="btn btn-primary">Make Reservation</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="text-end mt-4">
                                    <a href="#" class="btn btn-primary">Edit Information</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section pb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1>Welcome to Your Health <br> Center</h1>
                        <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
                        <a href="about.html" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                        <div class="img-place custom-img-1">
                            <img src="{{asset('SiteAssets/assets/img/bg-doctor.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->
</x-site.template>