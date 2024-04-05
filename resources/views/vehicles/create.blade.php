@extends('layouts.app')

@section('title', 'Create Vehicle')

@section('content')
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">{{ __('Create new Vehicle') }}</div>
				<div class="card-body"> 
					<table class="table">
						<form action="#" method="POST">
							@csrf
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
								<label for="insurance_date" class="form-label">Isurance date</label>
								<input type="date" class="form-control" id="insurance_date" name="insurance_date" placeholder="Isurance">
							</div>
							<div>
								<button type="button" onClick="createVehicle()" class="btn btn-success">Save</button>
							</div>
						</form>
					</table>  
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	<script>
		function createVehicle() {
			$.ajax({
				url: 'http://127.0.0.1:8000/api/create-vehicle', 
				type: 'POST',
				dataType: 'json',
				data: {
					"_token": "{{ csrf_token() }}",
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
	</script>
@endsection
