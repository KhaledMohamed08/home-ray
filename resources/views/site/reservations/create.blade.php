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
            <h1 class="text-center wow fadeInUp">Create New Reservation</h1>

            <form class="main-form" method="POST" action="{{ route('reservation.store') }}">
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
                <div class="row mt-5 align-items-center" id="first_service_data">
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="category_id0" id="category" class="custom-select" onchange="servicesByCategoryId(this)" required>
                            <option disabled selected>Select One...</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="service_id0" id="service" class="custom-select" required>
                            <option disabled selected>Select One...</option>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" name="name0" class="form-control" placeholder="Patient Name" required>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="number" name="age0" class="form-control" placeholder="Patient Age" required>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" name="address0" class="form-control" placeholder="Patient Address">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="genderMale" name="gender0" value="male" required>
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="genderFemale" name="gender0" value="female">
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea name="note0" id="note" class="form-control" rows="6" placeholder="Enter note.."></textarea>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight add-btn-container" data-wow-delay="300ms">
                        <button type="button" id="add_service" class="btn btn-primary ml-2 add_service">+</button>
                        <label class="form-check-label" for="add_service">Add Other Service</label>
                    </div>
                </div>
                <button id="submit_btn" type="submit" class="btn btn-primary mt-3 wow zoomIn" style="width: 100%;">Apply</button>
            </form>
        </div>
    </div> <!-- .page-section -->

    @section('scripts')
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
            let serviceCounter = 0;

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
                    let serviceSection = event.target.closest('.row');
                    if (serviceSection) {
                        serviceSection.remove();
                        updateAddButton();
                    }
                }
            });

            // Initial call to handle the initial add button
            updateAddButton();
        });
    </script>
    @endsection
</x-site.template>
