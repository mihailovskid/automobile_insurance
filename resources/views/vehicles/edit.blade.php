@extends('layouts.app')

@section('title', 'Edit Vehicle')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Edit Vehicle') }}</div>
            <div class="card-body">
                <table class="table">
                    <form action="#" method="POST">
                        @csrf
						<div class="mb-3">
                            <input type="hidden" class="form-control" id="vehicle_id" name="vehicle_id">
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand">
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="model" name="model" placeholder="Model">
                        </div>
                        <div class="mb-3">
                            <label for="plate_number" class="form-label">Plate number</label>
                            <input type="text" class="form-control" id="plate_number" name="plate_number" placeholder="Plate number">
                        </div>
                        <div class="mb-3">
                            <label for="insurance_date" class="form-label">Insurance date</label>
                            <input type="date" class="form-control" id="insurance_date" name="insurance_date" placeholder="Insurance">
                        </div>
                        <div>
                            <button type="button" onClick="updateVehicle()" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
		function fetchSingleVehicle() {
			let vehicle_id = getVehicleIdFromUrl()

			$.ajax({
				url: 'http://127.0.0.1:8000/api/get-vehicle/',
				type: 'GET',
				dataType: 'json',
				data: {
					'vehicle_id': vehicle_id
				},
				success: function(response) {
					$('#vehicle_id').val(vehicle_id)
                    $('#brand').val(response.vehicle.brand)
					$('#model').val(response.vehicle.model)
					$('#plate_number').val(response.vehicle.plate_number)
					$('#insurance_date').val(response.vehicle.insurance_date)
                },
                error: function(error) {
                    console.error(error); 
                }
			})
		}

		fetchSingleVehicle()

        function updateVehicle() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/update-vehicle',
                type: 'PUT',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
					"vehicle_id": $('#vehicle_id').val(),
                    "brand": $('#brand').val(),
                    "model": $('#model').val(),
                    "plate_number": $('#plate_number').val(),
                    "insurance_date": $('#insurance_date').val()
                },
                success: function(response) {
					alert(response.success);
                    window.location.replace("http://127.0.0.1:8000");
                },
                error: function(error) {
                    console.error(error); 
                }
            });
        }

		
		function getVehicleIdFromUrl() {
			let searchParams = new URLSearchParams(window.location.search);
			let vehicle_id = null

			if (searchParams.has('vehicle_id')) {
				vehicle_id = searchParams.get('vehicle_id')
			}

			return vehicle_id
		}

    </script>
@endsection
