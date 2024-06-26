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

    <title>About Us</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">



    <style>
        /* Custom styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
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

        .about-section {
            background-color: #f8f9fa;
            padding: 80px 0;
            text-align: center;
            flex-grow: 1; /* Allow content to grow */
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
            <a class="" href="#"><img src="Arrogance_logo_v1.1.png" width="200px" height="50px"alt="Arrogance Logo"></a>
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

    <!-- About Us Section -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2>About Us</h2>
                    <p>We introduce niche but specialized and proven ICT products and solutions catering to customer requirements. Moving away from the conventional offering we build values for our customers. Our greater satisfaction is enabling our customers with technologies that are scalable and resilient. We are specialized in supporting information technology requirements of many domains. We always ensure that our customers are working with the right fit technology resources for their operation to provide them with the perfect customer experience.. Our services can serve from large enterprises to start-up businesses, providing all the services you expect from an internal IT department. From defining to implementation of IT projects, we work to deliver you a fast and satisfactory solution.</p>
                    
                    <img src="helpdesk.png" alt="Helpdesk Image">
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
