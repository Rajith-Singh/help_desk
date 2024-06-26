<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Ticket; // Import the Ticket model
use App\Models\Inquiry;
use App\Models\User;
use PDF;
use Mail; 
use App\Mail\TicketApprovedMail;
use App\Mail\TicketCompletedMail;

use App\Models\Reply;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller

{
    public function ticket()
    {
        // Retrieve all tickets from the database
        $tickets = Ticket::all();
      
        // Pass the tickets to the view and render it
        return view('admin.ticket', compact('tickets'));
    }

    public function approved($id)
    {
        $ticket=ticket::find($id);
        $ticket->status='Approved';
        $ticket->save();

        // Send email to the relevant user
        Mail::to($ticket->email)->send(new TicketApprovedMail($ticket));

        return redirect()->back();

    }

    public function completed($id)
    {
        $ticket=ticket::find($id);
        $ticket->status='Completed';
        $ticket->save();

        // Send email to the relevant user
        Mail::to($ticket->email)->send(new TicketCompletedMail($ticket));

        return redirect()->back();
    }

    public function replies()
    {
        return view('admin.replies');
    
    }

    public function summaryreport()
    {
        return view('admin.summary_report');
    
    }

    // public function inquiries()
    // {
    //     return view('admin.inquiries');
    
    // }

    public function inquiries()
{
    // Retrieve all inquiries from the database
    $inquiries = Inquiry::all();

    // Pass the inquiries to the view and render it
    return view('admin.inquiries', compact('inquiries'));
}

public function inquiryapproved($id)
{
    $inquiry = Inquiry::find($id);
    $inquiry->status = 'Approved';
    $inquiry->save();
    return redirect()->back();
}

public function inquirycompleted($id)
{
    $inquiry = Inquiry::find($id);
    $inquiry->status = 'Completed';
    $inquiry->save();
    return redirect()->back();
}

public function uploadUser(Request $request)
{
    // Validate the form data
    $request->validate([
        'fullname' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email|unique:users,email', // Assuming 'email' is unique in the users table
        'password' => 'required|string',
    ]);

    // Create or update the user record
    $user = new User();
    $user->name = $request->input('fullname');
    $user->address = $request->input('address');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password')); // Hash the password
    $user->save();

    // Optionally, you can redirect the user after successful submission
    return redirect()->back()->with('success', 'User registered successfully!');
}

public function sendEmailForm($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        return view('admin.send_email_form', compact('ticket'));
    }

    public function sendEmail(Request $request, $ticketId)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Logic to send email
        $ticket = Ticket::findOrFail($ticketId);

        // Example using Laravel's Mail facade
        Mail::raw($request->message, function ($message) use ($request, $ticket) {
            $message->to($request->email)
                    ->subject('Ticket Details')
                    ->setBody("Name: {$ticket->name}\nEmail: {$ticket->email}\nSubject: {$ticket->subject}\nMessage: {$ticket->message}");
        });

        // Redirect back to the ticket list page with a success message
        return redirect()->route('admin.ticket')->with('success', 'Email sent successfully!');
    }

    public function showForm(Request $request)
    {
        $tickets = [];

        if ($request->isMethod('post')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $status = $request->input('status');

            $query = Ticket::whereBetween('created_at', [$start_date, $end_date]);

            if ($status !== 'all') {
                $query->where('status', $status);
            }

            $tickets = $query->get();
        }

        return view('admin.summary_report', compact('tickets'));
    }

    public function generatePDF(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');

        $query = Ticket::whereBetween('created_at', [$start_date, $end_date]);

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $tickets = $query->get();

        $pdf = PDF::loadView('admin.summary_report_pdf', compact('tickets'));

        return $pdf->download('admin.summary_report.pdf');
    }

    public function generateSummaryReport(Request $request)
    {
        $tickets = Ticket::all(); // Fetch tickets based on your logic

        // Generate PDF
        $pdf = PDF::loadView('admin.summary_report', compact('tickets'));

        if ($request->has('view')) {
            return $pdf->stream('admin.summary_report.pdf'); // Stream the PDF to the browser
        }

        return $pdf->download('admin.summary_report.pdf'); // Download the PDF
    }
   
    public function showReplyForm($id)
    {
        $ticket = Ticket::find($id);
        return view('admin.reply_form', compact('ticket'));
    }



        public function index()
        {
            $users = User::all(); // Example: Replace with your actual User model
            return view('admin.user', compact('users'));
        }


        public function sendReply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:5000',
        ]);

        $ticket = Ticket::findOrFail($id);

        $reply = new Reply();
        $reply->ticket_id = $ticket->id;
        $reply->user_id = Auth::id(); // Assuming the user is logged in
        $reply->message = $request->input('reply');
        $reply->save();

        return redirect()->back()->with('success', 'Your reply has been sent successfully.');
    }



     
}