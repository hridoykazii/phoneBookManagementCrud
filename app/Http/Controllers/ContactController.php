<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function showContact()
    {
//        dd(Auth::user()->username);
//        $contacts = Contact::where('user_id',Auth::id())->cursorPaginate(5); == Query database
        $contacts = User::find(Auth::id())->contacts()->cursorPaginate(5); //ORM from User (Model)
        if ( Auth::id()!= Auth::id()){
            return 'fuck you!';
        }
        return view('/contact-create',compact(['contacts']));
    }

    public function contact()
    {
        $this->validate(request(),[

            'name'=>'required',
            'phone'=>'required'

        ]);

        User::find(Auth::id())->contacts()->create([
            'name'=>request('name'),
            'phone'=>request('phone')
        ]);

//        Contact::create([
//            'user_id'=>Auth::id(),
//            'name'=>request('name'),
//            'phone'=>request('phone')
//        ]);
        return redirect()->route('user.contact')->with('addSuccess','Add Success');
    }

    public function showUpdate($id)
    {
        $contacts = Contact::find($id);
        if ($contacts->user_id != Auth::id()){
            return 'fuck you!';
        }
        return view('update',compact(['contacts']));
    }
    public function update($id)
    {
        $contacts = Contact::find($id);
        $contacts->update([
            'name'=>request('name'),
            'phone'=>request('phone')
        ]);
        return redirect()->route('user.contact.show');
    }
    public function delete($id)
    {

        $contacts= Contact::find($id)->delete();
        if ($contacts->user_id != Auth::id()){
            return 'fuck you!';
        }
        return redirect()->back();
    }
}
