@extends('layouts.app')

@section('title', 'Vehicles')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Vehicles') }}</div>
        <div class="card-body">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add new Vehicle</a>
                </div>
            </div> 
            <div>
                <table class="table" id="vehicle-table">
                    <thead>
                        <tr>
                            <th scope="col">Brand</th>
                            <th scope="col">Model</th>
                            <th scope="col">Plate number</th>
                            <th scope="col">Insurance date</th>
                            <th class="text-center" colspan="2"  scope="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
            </div>   
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function fetchVehicles() {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/get-vehicles', 
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#vehicle-table tbody').empty();

                data.vehicles.forEach(function (vehicle) {
                    $('#vehicle-table tbody').append(
                        '<tr>' +
                        '<td>' + vehicle.brand + '</td>' +
                        '<td>' + vehicle.model + '</td>' +
                        '<td>' + vehicle.plate_number + '</td>' +
                        '<td>' + vehicle.insurance_date + '</td>' +
                        '<td><a href="{{ url("vehicles") }}/edit?vehicle_id=' + vehicle.id + '"class="text-decoration-none"><i class="fa-solid fa-pen-to-square text-dark"></i></a></td>' +
                        '<td><button type="button" onclick="deleteVehicle('+ vehicle.id +')" class="border-0 bg-white d-block mx-auto"><i class="fa-solid fa-trash-can"></i></button></td>' +
                        '</tr>'
                    );
                });
            },
            error: function (error) {
                console.error('Error fetching vehicles:', error);
            }
        });
    }

    function deleteVehicle(vehicle_id) {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/delete-vehicle',
            type: 'DELETE',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                "vehicle_id": vehicle_id
            },
            success: function (response) {
                alert(response.success);
                fetchVehicles()
            },
            error: function (error) {
                console.error('Error fetching vehicles:', error);
            }
        })
    }

    $(document).ready(function () {
        fetchVehicles()
    });
</script>
@endsection
