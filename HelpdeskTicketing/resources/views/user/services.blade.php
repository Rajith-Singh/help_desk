<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="helpdesk, ticketing system, services" />
    <meta name="description" content="Explore the services offered by our helpdesk ticketing system." />
    <meta name="author" content="Your Name" />

    <title>Services</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-GvG5bpxd4Jkxj83X3lC1oHq8hRxN/+5NpAWL/Pc18gIfG+12yAoW+cxMymvJ0Hh82VcYfXHE7eOJ5oH2HPSY3w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom styles for this template -->
    <style>
        /* Custom styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
            margin: 0;
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

        .service-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
            text-align: center;
            transition: box-shadow 0.3s ease;
            position: relative;
        }

        .service-card:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            font-size: 48px;
            color: #007bff;
            margin-bottom: 20px;
        }

        .service-card h4 {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 15px;
        }

        .service-card p {
            font-size: 16px;
            color: #6c757d;
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
            <a class="navbar-brand" href="#"><img src="Arrogance_logo_v1.1.png" width="200px" height="50px"
                    alt="Arrogance Logo"></a>
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
<br>
<br>
<br>
<br>
<br>
    <!-- Services section -->
    <div class="container">
        <div class="section">
            <h3>Our Services</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="fas fa-headset service-icon"></i>
                        <h4>24/7 Support</h4>
                        <p>We provide round-the-clock support to assist you with any issues or inquiries.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="fas fa-comments service-icon"></i>
                        <h4>Multi-channel Communication</h4>
                        <p>Our ticketing system supports communication via email, chat, and phone.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="fas fa-cogs service-icon"></i>
                        <h4>Customization</h4>
                        <p>We offer customization options to tailor the helpdesk system to your specific needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>&copy; <span id="displayDate"></span> All Rights Reserved By Spering - Helpdesk Ticketing System</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
