<!DOCTYPE html>
<html>
<head>
    <title>Ticket Approved</title>
</head>
<body>
    <p>Dear {{ $ticket->user->name }},</p>
    <p>Your ticket has been approved.</p>
    <p>Ticket Details:</p>
    <ul>
        <li>Ticket ID: {{ $ticket->id }}</li>
        <li>Status: {{ $ticket->status }}</li>
    </ul>
    <p>Thank you,</p>
    <p>Your Company Name</p>
</body>
</html>
