<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return back()->with([
            'message' => 'Berhasil dihapus'
        ]);
    }
}
