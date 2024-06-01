<x-site.template>
<div class="page-section">
<div class="page-section bg-light">
        <div class="container">
            <h1 class="text-center wow fadeInUp"> Our Services </h1>
            <div class="row mt-5">
                @foreach ($categories as $category)        
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <a href="#">{{ $category->name }}</a>
                            </div>
                            <a href="blog-details.html" class="post-thumb">
                                <img src="{{asset('SiteAssets/assets/img/blog/blog_3.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a href="blog-details.html">{{ $category->name }}</a></h5>
                            <ul>
                                @foreach ($category->services as $service)
                                        <li>
                                                {{ $service->name }}
                                        </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-12 text-center mt-4 wow zoomIn">
                    <a href="{{ route('reservation.create') }}" class="btn btn-primary">Make Reservation</a>
                </div>

            </div>
        </div>
    </div> <!-- .page-section -->
</div>
</x-site.template>