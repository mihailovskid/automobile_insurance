<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function showIndexPage()
    {
        return view('vehicles.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();

        return response()->json([
            'vehicles' => $vehicles,
            'message' => 'List of all vehicles'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand'             => ['required', 'string', 'max:50'],
            'model'             => ['required', 'string', 'max:50'],
            'plate_number'      => ['required', 'string', 'max:50'],
            'insurance_date'    => ['required', 'date']
        ]);

        $params = [
            'brand'             => $request->input('brand'),
            'model'             => $request->input('model'),
            'plate_number'      => $request->input('plate_number'),
            'insurance_date'    => $request->input('insurance_date')
        ];

        $vehicle = Vehicle::create($params);

        if ($vehicle) {
            return response(['success' => 'Vehicle successfully created!'], 201);
        } else {
            return response(['error' => 'Something went wrong!'], 400);
        }
    }

    /**
     * Show the form for update the specified resource.
     */
    public function show(Request $request)
    {
        $vehicle = Vehicle::find($request->input('vehicle_id'));

        return response()->json([
            'vehicle' => $vehicle,
            'message' => 'Single requested vehicle'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('vehicles.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'vehicle_id'        => ['required', 'exists:vehicles,id'],
            'brand'             => ['required', 'string', 'max:50'],
            'model'             => ['required', 'string', 'max:50'],
            'plate_number'      => ['required', 'string', 'max:50'],
            'insurance_date'    => ['required', 'date']
        ]);

        $params = [
            'brand'             => $request->input('brand'),
            'model'             => $request->input('model'),
            'plate_number'      => $request->input('plate_number'),
            'insurance_date'    => $request->input('insurance_date')
        ];

        try {
            $updated = Vehicle::where('id', $request->input('vehicle_id'))->update($params);

            if ($updated) {
                return response(['success' => 'Vehicle successfully updated!'], 200);
            } else {
                return response(['error' => 'Something went wrong during the update.'], 400);
            }
        } catch (\Exception $e) {
            return response(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $vehicle = Vehicle::find($request->input('vehicle_id'));

        $removed = $vehicle->delete();

        if ($removed) {
            return response(['success' => 'Vehicle successfully removed!'], 200);
        } else {
            return response(['error' => 'Something went wrong during the removal.'], 400);
        }
    }
}
