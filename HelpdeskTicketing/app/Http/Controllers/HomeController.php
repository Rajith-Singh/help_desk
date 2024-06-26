<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Ticket;

use App\Models\Inquiry;

use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) { // Check if the user is authenticated
            if (Auth::user()->usertype == '0') { // Assuming '0' is the user type for admins
                return view('admin.home'); // Redirect admins to admin.home view
            } else {
                return view('user.dashboard'); // Redirect regular users to user.dashboard view
            }
        } else {
            return redirect()->back(); // Redirect guests back to the previous page
        }
    }
    

    public function index()
    {
        return view('user.home');
    }
    public function createticket()
    {
        return view('user.createticket');
    }
    public function aboutus()
    {
        return view('user.aboutus');
    }
    public function services()
    {
        return view('user.services');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function mytickets()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $tickets = Ticket::where('user_id', $user_id)->get();
            return view('user.mytickets', compact('tickets'));
        } else {
            return redirect()->back();
        }
    }

    public function cancel_tickets($id)
    {
        $data = ticket::find($id);
        $data->delete();
        return redirect()->back();
    }

    

    public function uploadTicket(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'subject' => 'required|string',
            'message' => 'required|string|max:1000'
        ]);

        // Create a new ticket instance
        $ticket = new Ticket();
        $ticket->name = $validatedData['name'];
        $ticket->email = $validatedData['email'];
        $ticket->subject = $validatedData['subject'];
        $ticket->message = $validatedData['message'];
       

        if (Auth::check()) {
            $ticket->user_id = Auth::id();
        }
    
        // Save the ticket to the database
        $ticket->save();

        // Optionally, return a response indicating success
        return response()->json(['message' => 'Ticket created successfully'], 200);
    }
    public function uploadInquiry(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'inquirymessage' => 'required|string|max:1000'
        ]);

        // Create a new ticket instance
        $inquiry = new Inquiry();
        $inquiry->fullname = $validatedData['fullname'];
        $inquiry->email = $validatedData['email'];
        $inquiry->inquirymessage = $validatedData['inquirymessage'];
        // Save the ticket to the database
        $inquiry->save();

        // Optionally, return a response indicating success
        return response()->json(['message' => 'Inquiry submitted successfully'], 200);
    }
   
   
}
