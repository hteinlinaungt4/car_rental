<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class TestimonialController extends Controller
{
    //

    public function index(){
        return view('user.testimonial');
    }
    public function store(Request $request){
        $test = new Testimonial();
        $test->name = Auth::user()->name;
        $test->email = Auth::user()->email;
        $test->message = $request->message;
        $test->save();
        return redirect()->route('user.dashboard')->with(['booksuccess' => 'You are Created Successfully!']);
    }

    public function mytest(){
        $test=Testimonial::where('email',Auth::user()->email)->get();
        return view('user.mytestimonial',compact('test'));
    }




    public function adminindex(){
        return view('admin.testimonial.index');
    }


    public function ssd(){
        $test=Testimonial::query();
        return DataTables::of($test)
        ->addColumn('actions', function($each) {
            $statusButton = $each->status == '0'
                ? '<button class="btn btn-success status-btn" data-id="' . $each->id . '" data-status="' . $each->status . '">Mark as Active</button>'
                : '<button disabled class="btn btn-warning status-btn" data-id="' . $each->id . '" data-status="' . $each->status . '">Actived</button>';

            return '<div class="d-flex justify-content-center">' . $statusButton . '</div>';
        })
        ->addColumn('created_at', function($each) {
            return $each->created_at->format('Y-m-d');
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    public function updateStatus(Request $request, $id)
            {
                $test = Testimonial::findOrFail($id);
                $test->status = $request->status;
                $test->save();

                return response()->json(['success' => true]);
            }
}
