<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view("contacts.index", compact("contacts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("contacts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|unique:contacts',
            'phone'=> 'required|string|max:30',
        ]);

        Contact::create($validated);
      return redirect()->route("contacts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $contact = Contact::findOrFail($id);
return view("contacts.edit", compact("contact"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
               'name'=> 'required|string|max:255',
            'email'=> 'required|string|unique:contacts,email,' . $contact->id,
            'phone'=> 'required|string|max:30'
        ]);

        $contact->update($validated);

        return redirect()->route("contacts.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect()->route('contacts.index');
    }
}
