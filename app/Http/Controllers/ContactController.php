<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AllContact(){
         $contacts = Contact::all();
         return view('admin.contact.index', compact('contacts'));
    }
    public function Create(){
        return view('admin.contact.create');
   }
   public function StoreContact(Request $request){
    Contact::insert([
        'email' => $request->email,
        'phone' =>$request->phone,
        'address' =>$request->address,
        'created_at' => Carbon::now()
    ]);
    //return Redirect()->back()->with('success', 'Contact Inserted');
    return Redirect()->route('admin.contact')->with('success', 'Contact Inserted');
   }

   public function Contact(){
       $contact = Contact::get()->first();
       return view('pages.contact', compact('contact'));
   }

   public function ContactForm(Request $request){
    ContactForm::insert([
        'name' => $request->name,
        'email' => $request->email,
        'subject' =>$request->subject,
        'message' =>$request->message,
        'created_at' => Carbon::now()
    ]);
    return Redirect()->back()->with('success', 'Contact Inserted');
    //return Redirect()->route('admin.contact')->with('success', 'Contact Inserted');
   }

   public function AllMessage(){
       $messages = ContactForm::all();
       return view('admin.contact.message', compact('messages'));
   }
   public function DeleteMessage($id){
    ContactForm::find($id)->delete();
    return Redirect()->back()->with('success', 'Brand Deleted!');
   }

   

}
