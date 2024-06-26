<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>My Tickets</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding-top: 70px; /* Adjusted padding for fixed navbar */
        }

        .navbar {
            background-color: #343a40 !important;
        }

        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
            font-size: 24px;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: bold;
            padding: 10px 20px;
        }

        .navbar-nav .nav-link:hover {
            background-color: #007bff;
        }

        .section {
            text-align: center;
            padding: 60px 20px; /* Adjusted padding for content area */
        }

        .section h3 {
            font-size: 36px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
        }

        .section p {
            font-size: 18px;
            color: #343a40;
            margin-bottom: 30px;
        }

        .footer_section {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }

        .footer_section p {
            font-size: 16px;
            margin: 0;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table th,
        table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #343a40;
            color: white;
            font-size: 18px;
        }

        table tr {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #e9ecef;
        }

        table tr:hover {
            background-color: #d1d1d1;
        }

        table tr td {
            font-size: 16px;
            align:center;
        }

        .btn-danger {
            color: white;
            background-color: #dc3545;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="Arrogance_logo_v1.1.png" width="200px" height="50px" alt="Arrogance Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="aboutus">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mytickets">My Tickets</a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="section">
  
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->name }}</td>
                    <td>{{ $ticket->email }}</td>
                    <td>{{ $ticket->subject }}</td>
                    <td>{{ $ticket->message }}</td>
                    <td>{{ $ticket->status }}</td>

                    <td><a class="btn btn-danger" onclick="return confirm('are you sure to delete this')" href="{{url('cancel_tickets',$ticket->id)}}">Cancel</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>&copy; <span id="displayDate"></span> All Rights Reserved By Arrogance Technologies Pvt Ltd - Helpdesk
                Ticketing System</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        document.getElementById("displayDate").textContent = new Date().getFullYear();
    </script>
</body>

</html>
