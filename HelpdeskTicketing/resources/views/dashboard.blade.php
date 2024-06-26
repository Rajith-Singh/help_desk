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

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        /* Custom styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding-top: 60px; /* Adjusted for navbar height */
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

        .ticketing_system {
            text-align: center;
            padding: 80px 0;
        }

        .ticketing_system h2 {
            font-size: 36px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
        }

        .ticketing_system p {
            font-size: 18px;
            color: #343a40;
            margin-bottom: 40px;
        }

        .ticketing_system a {
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            padding: 15px 40px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .ticketing_system a:hover {
            background-color: #0056b3;
        }

        .section {
            text-align: center;
            padding: 60px 0;
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
        }

        .footer_section p {
            font-size: 16px;
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="" href="#"><img src="Arrogance_logo_v1.1.png" width="200px" height="50px" alt="Arrogance Logo"></a>
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
                        <a class="nav-link" href="services">Services</a>
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


    <!-- Ticketing System -->
    <section class="ticketing_system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Welcome to Arrogance Helpdesk</h2>
                    <p>Need assistance? Click the button below to create a support ticket.</p>
                    <a href="{{route('createticket')}}" class="btn btn-primary btn-lg">Create Ticket</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Second Section -->
    <section class="section">
        <div class="container"> 
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h3>We're Here to Help</h3>
                    <p>If you have any questions or need further assistance, feel free to contact us via email or phone. Our support team is available 24/7 to assist you.</p>
                    <p>Email: info@arrogance.lk</p>
                    <p>Phone: 0113 416500</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>&copy; <span id="displayDate"></span> All Rights Reserved By Arrogance Technologies Pvt Ltd - Helpdesk Ticketing System</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
