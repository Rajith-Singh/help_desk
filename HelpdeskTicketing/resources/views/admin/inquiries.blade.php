<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inquiries</title>

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
        .inquiry-table {
            width: 100%;
            border-collapse: collapse;
        }
        .inquiry-table th, .inquiry-table td {
            padding: 12px;
            text-align: center;
        }
        .inquiry-table th {
            background-color: #343a40;
            color: #fff;
        }
        .inquiry-table td {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
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
                    <div align="center" style="padding-top:20px;">
                        <table class="inquiry-table">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Inquiry Message</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inquiries as $inquiry)
                                <tr>
                                    <td>{{$inquiry->fullname}}</td>
                                    <td>{{$inquiry->email}}</td>
                                    <td>{{$inquiry->inquirymessage}}</td>
                                    <td>{{$inquiry->status}}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url('inquiryapproved', $inquiry->id) }}">Approve</a>
                                        <a class="btn btn-success" href="{{ url('inquirycompleted', $inquiry->id) }}">Complete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
