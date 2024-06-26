<?php

namespace App\Http\Controllers;

use App\Models\Tickets;

use Illuminate\Http\Request;

use App\Models\User;

use App\Notifications\TicketAssigned;

class TicketController extends Controller
{
    public function createticket()
    {
        return view('user.createticket');
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Method to assign a user to a ticket
    public function assignTicket(Request $request, $ticketId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $ticket = Ticket::findOrFail($ticketId);
        $user = User::findOrFail($request->user_id);

        // Assign the ticket
        $ticket->user_id = $user->id;
        $ticket->save();

        // Send notification
        $user->notify(new TicketAssigned($ticketId));

        return response()->json(['message' => 'Ticket assigned successfully']);
    }

    
}
