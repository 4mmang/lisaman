<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('kontak');
    }
    
    public function store(Request $request){
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'number_phone' => $request->number_phone,
            'message' => $request->message,
        ]);

        return back()->with([
            'message' => 'Terkirim'
        ]);
    }
}
