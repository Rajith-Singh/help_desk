<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tickets</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom styles for the table and sidebar */
        .container-scroller {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .navbar {
            background-color: #b22222; /* Deep Red */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }
        .navbar-nav .nav-link {
            color: white !important;
        }
        .navbar-nav .nav-link:hover {
            color: #f5f5f5 !important;
        }
        .sidebar {
            background-color: #2f4f4f; /* Dark Ash */
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar .logo {
            width: 150px;
            margin-bottom: 20px;
        }
        .sidebar a {
            width: 100%;
            padding: 15px;
            text-align: left;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            margin-left: 250px; /* Same as the width of the sidebar */
            padding: 20px;
        }
        .table-container {
            max-width: 100%;
            overflow-x: auto;
            margin: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 12px;
            text-align: center;
        }
        .table th {
            background-color: #343a40;
            color: #fff;
        }
        .table td {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .table td.pending {
            background-color: #ffc107;
        }
        .table td.approved {
            background-color: #28a745;
        }
        .table td.completed {
            background-color: #007bff;
        }
        .table td.completed a {
            color: #fff;
        }
        .table td.disabled-link a {
            opacity: 0.6;
            cursor: default;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn.disabled-link {
            opacity: 0.6;
            cursor: default;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Ticket Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-scroller">
        <div class="sidebar">
            <img src="Arrogance_logo_v1.1.png" alt="Company Logo" class="logo">
            <a href="home">Dashboard</a>
            <a href="ticket">Tickets</a>
       
            <a href="user">Users</a>
            <a href="summary_report">Summary Report</a>
        </div>

       
    <div class="main-content">
        <div class="container-fluid page-body-wrapper">
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Approved</th>
                            <th>Completed</th>
                            <th>Send Updates</th>
                            <th>Send Replies</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr class="{{ strtolower($ticket->status) }}">
                            <td>{{$ticket->name}}</td>
                            <td>{{$ticket->email}}</td>
                            <td>{{$ticket->subject}}</td>
                            <td>{{$ticket->message}}</td>
                            <td>{{$ticket->status}}</td>
                            <td>
                                @if($ticket->status == 'pending')
                                    <a class="btn btn-danger" href="{{ url('approved', $ticket->id) }}">Approve</a>
                                @else
                                    <a class="btn btn-danger disabled-link">Approve</a>
                                @endif
                            </td>
                            <td>
                                @if($ticket->status == 'Approved')
                                    <a class="btn btn-danger" href="{{ url('completed', $ticket->id) }}">Complete</a>
                                @else
                                    <a class="btn btn-danger disabled-link">Complete</a>
                                @endif
                            </td>
                            <td>
                                @if($ticket->status == 'Completed')
                                    <a class="btn btn-danger" href="{{ route('admin.send-email-form', $ticket->id) }}">Send Email</a>
                                @else
                                    <a class="btn btn-danger disabled-link">Send Email</a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('ticket.reply', $ticket->id) }}">Send Reply</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
