<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Yajra\DataTables\DataTables;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ContactController extends Controller
{
    //
    public function index(){
        return view('user.contact');
    }

    public function adminindex(){
        return view('admin.contact.index');
    }

    public function store(Request $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->route('user.dashboard')->with(['booksuccess' => 'You are Created Successfully!']);
    }


    public function ssd(){
        $brand=Contact::query();
        return DataTables::of($brand)
        ->filterColumn('status', function($query, $keyword) {
            $keyword = strtolower($keyword);
            if ($keyword === 'read') {
                $query->where('status', '1');
            } elseif ($keyword === 'unread') {
                $query->where('status', '0');
            }
        })
        ->addColumn('status', function($each) {
            return $each->status == '0' ? 'Unread' : 'Read';
        })
        ->addColumn('actions', function($each) {
            $statusButton = $each->status == '0'
                ? '<button class="btn btn-success status-btn" data-id="' . $each->id . '" data-status="' . $each->status . '">Mark as Read</button>'
                : '<button disabled class="btn btn-warning status-btn" data-id="' . $each->id . '" data-status="' . $each->status . '">Mark as Unread</button>';

            return '<div class="d-flex justify-content-center">' . $statusButton . '</div>';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }


    public function updateStatus(Request $request, $id)
            {
                $contact = Contact::findOrFail($id);
                $contact->status = $request->status;
                $contact->save();

                return response()->json(['success' => true]);
            }
}
