<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="helpdesk, ticketing system" />
    <meta name="description" content="Helpdesk Ticketing System" />
    <meta name="author" content="Arrogance" />

    <title>Arrogance - Helpdesk Ticketing System</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

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
            padding-top: 60px; /* Adjusted for navbar height */
        }

        .page-content {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            align-items: center;
        }

        .form-label {
            font-size: 16px;
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 10px;
            padding: 8px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 5px 5px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .footer_section {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            flex-shrink: 0;
        }

        .footer_section p {
            font-size: 16px;
            margin: 0;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .left-image {
            background: url('helpdeskticket.jpg') no-repeat center center;
            background-size: cover;
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .content-container {
            display: flex;
            width: 100%;
            height: 70vh; /* Adjust the height as necessary */
        }

        .left-image-container,
        .form-container {
            flex: 1;
            margin: 10px;
        }

        @media (max-width: 767.98px) {
            .left-image-container {
                display: none;
            }

            .form-container {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="Arrogance_logo_v1.1.png" width="200" height="50" alt="Arrogance Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="content-container">
                <div class="left-image-container d-none d-md-block">
                    <div class="left-image"></div>
                </div>

                <div class="form-container d-flex align-items-center">
                    <div class="w-100">
                        <div class="page-title text-center mb-4">                        
                        </div>

                        <!-- Success message container -->
                        <div id="success-message" class="alert alert-success d-none" role="alert">
                            Your ticket has been successfully submitted!
                        </div>

                        <form id="create-ticket-form" action="{{ url('createticket') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="name">Your Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="email">Your Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="subject">Subject:</label>
                                <select class="form-control" id="subject" name="subject" required>
                                    <option value="">Select Subject</option>
                                    <option value="Technical Issue">Technical Issue</option>
                                    <option value="Billing">Billing</option>
                                    <option value="General Inquiry">General Inquiry</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label class="form-label" for="message">Message:</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer_section">
        <div class="container">
            <p>&copy; <span id="displayDate"></span> All Rights Reserved By Arrogance - Helpdesk Ticketing System</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        // Display current year in the footer
        document.getElementById('displayDate').textContent = new Date().getFullYear();

        // AJAX form submission
        $(document).ready(function() {
            $('#create-ticket-form').on('submit', function(e) {
                e.preventDefault();
                
                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        // Show success message
                        $('#success-message').removeClass('d-none');
                        // Clear the form fields
                        $('#create-ticket-form')[0].reset();
                    },
                    error: function() {
                        // Handle error (optional)
                    }
                });
            });
        });
    </script>

</body>

</html>
