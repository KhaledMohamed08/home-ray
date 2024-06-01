<x-site.template>
    @section('styles')
    <style>
        .text-danger {
            color: red;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Edit Reservation</h1>
            <!-- <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy', $reservation->id) }}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <a href="javascript:void(0);" onclick="document.getElementById('delete-form-{{ $reservation->id }}').submit();" style="color: red; text-decoration: none;">
                    delete reservation
                </a>
            </form> -->


            <form class="main-form" method="POST" action="{{ route('reservation.update', $reservation->id) }}">
                @csrf
                @method('PUT')
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session('alert'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: "Cancel Reservation",
                            text: "{{ session('alert') }}",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#00D9A5",
                            cancelButtonColor: "red",
                            confirmButtonText: "Yes, cancel it!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                async function deleteReservation() {
                                    try {
                                        let response = await fetch(`http://www.localhost:8000/api/reservation/{{ $reservation->id }}`, {
                                            method: 'DELETE',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            }
                                        });

                                        if (response.ok) {
                                            let data = await response.json();
                                            Swal.fire({
                                                title: "Canceled!",
                                                text: "Your reservation has been canceled.",
                                                icon: "success",
                                                confirmButtonColor: "#00D9A5",
                                            });
                                        } else {
                                            Swal.fire({
                                                title: "Error!",
                                                text: "There was a problem canceling your reservation.",
                                                icon: "error",
                                                confirmButtonColor: "#d33",
                                            });
                                        }
                                    } catch (error) {
                                        console.error('Error:', error);
                                        Swal.fire({
                                            title: "Error!",
                                            text: "There was a problem canceling your reservation.",
                                            icon: "error",
                                            confirmButtonColor: "#d33",
                                        });
                                    }
                                }

                                deleteReservation();
                            }
                        });
                    });
                </script>
                @endif

                @foreach ($reservation->services as $service)
                <div class="row mt-5 align-items-center" id="first_service_data">
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="category_id{{$loop->index}}" id="category" class="custom-select" onchange="servicesByCategoryId(this)" required>
                            <option selected value="{{ $service->category->id }}">{{ $service->category->name }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="service_id{{$loop->index}}" id="service" class="custom-select" required>
                            <option selected value="{{ $service->id }}">{{ $service->name }}</option>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" name="name{{$loop->index}}" class="form-control" placeholder="Patient Name" required value="{{ $service->pivot->name }}">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="number" name="age{{$loop->index}}" class="form-control" placeholder="Patient Age" required value="{{ $service->pivot->age }}">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" name="address{{$loop->index}}" class="form-control" placeholder="Patient Address" value="{{ $service->pivot->address }}">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="genderMale{{$loop->index}}" name="gender{{$loop->index}}" value="male" {{ $service->pivot->gender == 'male' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="genderFemale" name="gender{{$loop->index}}" value="female" {{ $service->pivot->gender == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea name="note{{$loop->index}}" id="note" class="form-control" rows="6" placeholder="Enter note..">{{ $service->pivot->note }}</textarea>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <button class="btn btn-primary ml-2 remove_service" type="button" style="background-color: red">-</button>
                        <label class="form-check-label" for="add_service">Remove This Service</label>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight add-btn-container" data-wow-delay="300ms">
                        <button type="button" id="add_service" class="btn btn-primary ml-2 add_service">+</button>
                        <label class="form-check-label" for="add_service">Add Other Service</label>
                    </div>
                </div>
                @endforeach
                <div id="submit_btn" class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-primary wow zoomIn" style="width: 48%;">Save Edits</button>
                    <button type="button" class="btn btn-danger wow zoomIn" style="width: 48%;" onclick="deleteReservationAlert()">Delete Reservation</button>
                </div>

            </form>
        </div>
    </div> <!-- .page-section -->

    @section('scripts')
    <script>
        function deleteReservationAlert() {
            Swal.fire({
                title: "Cancel Reservation",
                text: "are you sure to cancel this reservation?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#00D9A5",
                cancelButtonColor: "red",
                confirmButtonText: "Yes, cancel it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    async function deleteReservation() {
                        try {
                            let response = await fetch(`http://www.localhost:8000/api/reservation/{{ $reservation->id }}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            });

                            if (response.ok) {
                                let data = await response.json();
                                Swal.fire({
                                    title: "Canceled!",
                                    text: "Your reservation has been canceled.",
                                    icon: "success",
                                    confirmButtonColor: "#00D9A5",
                                });
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: "There was a problem canceling your reservation.",
                                    icon: "error",
                                    confirmButtonColor: "#d33",
                                });
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            Swal.fire({
                                title: "Error!",
                                text: "There was a problem canceling your reservation.",
                                icon: "error",
                                confirmButtonColor: "#d33",
                            });
                        }
                    }

                    deleteReservation();
                }
            });
        }
    </script>
    <script>
        async function fetchServices() {
            try {
                let response = await fetch('http://www.localhost:8000/api/services');
                let data = await response.json();
                return data;
            } catch (error) {
                console.error('Error:', error);
                return []; // Return an empty array in case of an error
            }
        }

        async function servicesByCategoryId(categoryElement) {
            let categoryId = categoryElement.value;
            let serviceSelectId = categoryElement.id.replace('category', 'service');
            console.log(`Selected Category ID: ${categoryId}`);

            let services = await fetchServices();

            let servicesByCategoryId = services.filter(service => service.category_id == categoryId);

            console.log(servicesByCategoryId);

            let serviceSelect = document.getElementById(serviceSelectId);
            serviceSelect.innerHTML = '<option disabled selected>Select One...</option>'; // Clear existing options

            servicesByCategoryId.forEach(service => {
                let option = document.createElement('option');
                option.value = service.id;
                option.textContent = service.name;
                serviceSelect.appendChild(option);
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            let addBtn = document.getElementById('add_service');
            let submitBtn = document.getElementById('submit_btn');
            let form = document.querySelector('form.main-form');
            let serviceCounter = <?php echo e(count($reservation->services) - 1); ?>;
            console.log(serviceCounter);

            function addServiceData() {
                serviceCounter++;
                let serviceData = document.createElement('div');
                serviceData.className = 'row mt-5 align-items-center';
                serviceData.id = `service_index${serviceCounter}`;
                serviceData.innerHTML = `
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="category_id${serviceCounter}" id="category${serviceCounter}" class="custom-select" onchange="servicesByCategoryId(this)" required>
                            <option disabled selected>Select One...</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="service_id${serviceCounter}" id="service${serviceCounter}" class="custom-select" required>
                            <option disabled selected>Select One...</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" name="name${serviceCounter}" class="form-control" placeholder="Patient Name" required>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="number" name="age${serviceCounter}" class="form-control" placeholder="Patient Age" required>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" name="address${serviceCounter}" class="form-control" placeholder="Patient Address" required>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="genderMale${serviceCounter}" name="gender${serviceCounter}" value="male" required>
                            <label class="form-check-label" for="genderMale${serviceCounter}">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="genderFemale${serviceCounter}" name="gender${serviceCounter}" value="female">
                            <label class="form-check-label" for="genderFemale${serviceCounter}">Female</label>
                        </div>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea name="note${serviceCounter}" id="note${serviceCounter}" class="form-control" rows="6" placeholder="Enter note.."></textarea>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <button class="btn btn-primary ml-2 remove_service" type="button" style="background-color: red">-</button>
                        <label class="form-check-label" for="add_service">Remove This Service</label>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight add-btn-container" data-wow-delay="300ms">
                        <button class="btn btn-primary ml-2 add_service" type="button">+</button>
                        <label class="form-check-label" for="add_service">Add Other Service</label>
                    </div>
                `;
                form.insertBefore(serviceData, submitBtn);
                updateAddButton();
            }

            function updateAddButton() {
                // Remove add button from all but the last service section
                document.querySelectorAll('.add-btn-container').forEach((container, index, array) => {
                    if (index < array.length - 1) {
                        container.style.display = 'none';
                    } else {
                        container.style.display = 'block';
                    }
                });
            }

            // Event delegation for dynamically added buttons
            form.addEventListener('click', (event) => {
                if (event.target && event.target.classList.contains('add_service')) {
                    addServiceData();
                }
                if (event.target && event.target.classList.contains('remove_service')) {
                    Swal.fire({
                        title: "Delete This Service!",
                        // text: "{{ session('alert') }}",
                        // icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#00D9A5",
                        cancelButtonColor: "red",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let serviceSection = event.target.closest('.row');
                            if (serviceSection) {
                                serviceSection.remove();
                                updateAddButton();
                            }
                        }
                    });
                }
            });

            // Initial call to handle the initial add button
            updateAddButton();
        });
    </script>

    @endsection
</x-site.template>