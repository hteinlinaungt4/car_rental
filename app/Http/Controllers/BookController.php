<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function store(Request $request)
    {
        // Define validation rules
        $validation = [
            'vehicle_id' => 'required|exists:vehicles,id',
            'fromDate' => 'required|date',
            'toDate' => 'required|date|after_or_equal:fromDate',
            'message' => 'nullable|string',
        ];

        // Validate the request
        Validator::make($request->all(), $validation)->validate();

        $existingBooking = Book::where('user_id', Auth::user()->id)
        ->where('vehicle_id', $request->input('vehicle_id'))
        ->first();

        if ($existingBooking) {
            return redirect()->route('user.dashboard')->with(['wrong' => 'You have already placed an order for this vehicle']);
        }
        // Generate a unique book number
        $bookNumber = $this->generateUniqueBookNumber();

        // Create and save the book
        $book = new Book();
        $book->bookNumber = $bookNumber;
        $book->user_id = Auth::user()->id;
        $book->vehicle_id = $request->input('vehicle_id');
        $book->fromDate = $request->input('fromDate');
        $book->toDate = $request->input('toDate');
        $book->message = $request->input('message');

        $book->save();

        return redirect()->route('user.dashboard')->with(['booksuccess' => 'You are Created Successfully!']);


    }

    private function generateUniqueBookNumber()
    {
        do {
            $bookNumber = 'BOOK-' . strtoupper(uniqid());
        } while (Book::where('bookNumber', $bookNumber)->exists());

        return $bookNumber;
    }
    public function ssd(){
        $query = Book::with('user', 'vehicle');


        // Debugging

        return DataTables::of($query)
            ->filterColumn('name',function($query,$keyword){
                $query->whereHas('user',function($q1) use ($keyword){
                    $q1->where('name','like','%'.$keyword.'%');
                });
            })
            ->filterColumn('vehicle',function($query,$keyword){
                $query->whereHas('vehicle',function($q1) use ($keyword){
                    $q1->where('title','like','%'.$keyword.'%');
                });
            })
            ->filterColumn('message',function($query,$keyword){
                $query->where('message','like','%'.$keyword.'%');
            })
            ->filterColumn('status',function($query,$keyword){
                $query->where('status','like','%'.$keyword.'%');
            })
            ->filterColumn('bookNumber',function($query,$keyword){
                $query->where('bookNumber','like','%'.$keyword.'%');
            })
            ->addColumn('bookNumber', function($each) {
                return $each->bookNumber;
            })
            ->addColumn('name', function($each) {
                return $each->user->name;
            })
            ->addColumn('vehicle', function($each) {
                return $each->vehicle->title;
            })
            ->addColumn('from_date', function($each) {
                return $each->fromDate;
            })
            ->addColumn('to_date', function($each) {
                return $each->toDate;
            })
            ->addColumn('message', function($each) {
                return $each->message;
            })
            ->addColumn('status', function ($each) {
                return $each->status;
            })
            ->editColumn('created_at', function($each) {
                return $each->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($book) {
                $pending = '<button data-id="' . $book->id . '" class="btn btn-warning btn-sm pending">Pending</button>';
                $confirm = '<button data-id="' . $book->id . '" class="btn btn-success btn-sm confirm">Confirm</button>';
                $cancel = '<button data-id="' . $book->id . '" class="btn btn-danger btn-sm cancel">Cancel</button>';
                return $pending . ' ' . $confirm . ' ' . $cancel;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function pending($id) {
        $booking = Book::findOrFail($id);
        $booking->status = 'Pending'; // Assuming '1' is for pending
        $booking->save();

        return response()->json(['success' => 'Booking status updated to pending.']);
    }

    public function confirm($id) {
        $booking = Book::findOrFail($id);
        $booking->status = 'Confirmed'; // Assuming '0' is for confirmed
        $booking->save();

        return response()->json(['success' => 'Booking status updated to confirmed.']);
    }

    public function cancel($id) {
        $booking = Book::findOrFail($id);
        $booking->status = 'Cancelled'; // Assuming '2' is for cancelled
        $booking->save();

        return response()->json(['success' => 'Booking status updated to cancelled.']);
    }



    public function index(){
        return view('admin.book.index');
    }

    public function mybook(){
       $books= Book::with('vehicle')->where('user_id',Auth::user()->id)->get();
        return view('user.mybook',compact('books'));
    }

}
