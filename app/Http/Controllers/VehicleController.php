<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.vechicle.index');
    }

    public function ssd(){
        $brand=Vehicle::with('brand');
        return DataTables::of($brand)
        ->filterColumn('brand_name',function($query,$keyword){
            $query->whereHas('brand',function($q1) use ($keyword){
                $q1->where('name','like','%'.$keyword.'%');
            });
        })
        ->addColumn('brand_name', function($vehicle) {
            return $vehicle->brand->name;
        })
        ->addColumn('actions',function($each){
            $edit = '<a href="'.route('vehicle.edit',$each->id).'" class="text-primary shadow p-2"><i class="fa-regular fa-pen-to-square p-1 fw-bold"></i></a>';
            $delete='<a href="#" class=" delete_btn text-danger shadow  p-2" data-id="'.$each->id.'" ><i class="fa-solid fa-trash p-1 fw-bold"></i></a>';
            return '<div class="d-flex justify-content-center">'.
                    $edit.$delete
                    .'</div>';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands=Brand::all();
        return view('admin.vechicle.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation=[
            'title' => 'required|unique:vehicles,title',
            'brand' => 'required',
            'overview' => 'required',
            'perDay' => 'required',
            'fuel' => 'required',
            'modelyear' => 'required',
            'seatingCapacity' => 'required',
            'image1' => 'required|mimes:jpg,jpeg,png|file',
            'image2' => 'required|mimes:jpg,jpeg,png|file',
            'image3' => 'required|mimes:jpg,jpeg,png|file',
            'image4' => 'required|mimes:jpg,jpeg,png|file',
        ];


        Validator::make($request->all(),$validation)->validate();

        $images = [];
        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile('image' . $i)) {
                $file = $request->file('image' . $i);
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/vehicle', $filename);
                $images['image' . $i] = $filename;
            } else {
                $images['image' . $i] = null;  // Set null if image5 is optional
            }
        }

        // Create and save the vehicle
        $vehicle = new Vehicle();
        $vehicle->title = $request->input('title');
        $vehicle->brand_id = $request->input('brand');
        $vehicle->overview = $request->input('overview');
        $vehicle->perDay = $request->input('perDay');
        $vehicle->fuel = $request->input('fuel');
        $vehicle->modelyear = $request->input('modelyear');
        $vehicle->seatingCapacity = $request->input('seatingCapacity');
        $vehicle->image1 = $images['image1'];
        $vehicle->image2 = $images['image2'];
        $vehicle->image3 = $images['image3'];
        $vehicle->image4 = $images['image4'];
        $vehicle->AirConditioner = $request->input('AirConditioner', '0');
        $vehicle->PowerDoorLocks = $request->input('PowerDoorLocks', '0');
        $vehicle->AntiLockBrakingSystem = $request->input('AntiLockBrakingSystem', '0');
        $vehicle->BrakeAssist = $request->input('BrakeAssist', '0');
        $vehicle->PowerSteering = $request->input('PowerSteering', '0');
        $vehicle->DriverAirbag = $request->input('DriverAirbag', '0');
        $vehicle->PassengerAirbag = $request->input('PassengerAirbag', '0');
        $vehicle->PowerWindows = $request->input('PowerWindows', '0');
        $vehicle->CDPlayer = $request->input('CDPlayer', '0');
        $vehicle->CentralLocking = $request->input('CentralLocking', '0');
        $vehicle->CrashSensor = $request->input('CrashSensor', '0');
        $vehicle->LeatherSeats = $request->input('LeatherSeats', '0');

        // Save the vehicle to the database
        $vehicle->save();
        return redirect()->route('vehicle.index')->with(['successmsg' => 'You are Created Successfully!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle=Vehicle::findorFail($id);
        $brands = Brand::all();
        return view('admin.vechicle.edit',compact('vehicle','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        // Validation rules
        $validation = [
            'title' => 'required|unique:vehicles,title,' . $vehicle->id,
            'brand' => 'required',
            'overview' => 'required',
            'perDay' => 'required',
            'fuel' => 'required',
            'modelyear' => 'required',
            'seatingCapacity' => 'required',
            'image1' => 'nullable|mimes:jpg,jpeg,png|file',
            'image2' => 'nullable|mimes:jpg,jpeg,png|file',
            'image3' => 'nullable|mimes:jpg,jpeg,png|file',
            'image4' => 'nullable|mimes:jpg,jpeg,png|file',
        ];

        // Validate the request data
        Validator::make($request->all(), $validation)->validate();

        // Handle file uploads and preserve existing files if no new files are uploaded
        $images = [];
        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile('image' . $i)) {
                // Delete the old image if a new one is uploaded
                if ($vehicle->{'image' . $i}) {
                    Storage::delete('public/vehicle/' . $vehicle->{'image' . $i});
                }

                $file = $request->file('image' . $i);
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/vehicle', $filename);
                $images['image' . $i] = $filename;
            } else {
                $images['image' . $i] = $vehicle->{'image' . $i};  // Preserve the existing image if no new image is uploaded
            }
        }

        // Update the vehicle with new data
        $vehicle->title = $request->input('title');
        $vehicle->brand_id = $request->input('brand');
        $vehicle->overview = $request->input('overview');
        $vehicle->perDay = $request->input('perDay');
        $vehicle->fuel = $request->input('fuel');
        $vehicle->modelyear = $request->input('modelyear');
        $vehicle->seatingCapacity = $request->input('seatingCapacity');
        $vehicle->image1 = $images['image1'];
        $vehicle->image2 = $images['image2'];
        $vehicle->image3 = $images['image3'];
        $vehicle->image4 = $images['image4'];
        $vehicle->AirConditioner = $request->input('AirConditioner', '0');
        $vehicle->PowerDoorLocks = $request->input('PowerDoorLocks', '0');
        $vehicle->AntiLockBrakingSystem = $request->input('AntiLockBrakingSystem', '0');
        $vehicle->BrakeAssist = $request->input('BrakeAssist', '0');
        $vehicle->PowerSteering = $request->input('PowerSteering', '0');
        $vehicle->DriverAirbag = $request->input('DriverAirbag', '0');
        $vehicle->PassengerAirbag = $request->input('PassengerAirbag', '0');
        $vehicle->PowerWindows = $request->input('PowerWindows', '0');
        $vehicle->CDPlayer = $request->input('CDPlayer', '0');
        $vehicle->CentralLocking = $request->input('CentralLocking', '0');
        $vehicle->CrashSensor = $request->input('CrashSensor', '0');
        $vehicle->LeatherSeats = $request->input('LeatherSeats', '0');

        // Save the updated vehicle to the database
        $vehicle->save();

        return redirect()->route('vehicle.index')->with(['successmsg' => 'Vehicle updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        // Delete the associated image files
        for ($i = 1; $i <= 4; $i++) {
            if ($vehicle->{'image' . $i}) {
                Storage::delete('public/vehicle/' . $vehicle->{'image' . $i});
            }
        }

        // Delete the vehicle record from the database
        $vehicle->delete();

        $data=[
            'msg' => 'success',
        ];
        return response()->json($data, 200);
    }
}
