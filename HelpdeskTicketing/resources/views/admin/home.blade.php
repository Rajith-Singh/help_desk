<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Home</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom styles -->
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
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #b22222; /* Deep Red */
            color: white;
        }
        .card-body {
            background-color: #fff;
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Overview
                            </div>
                            <div class="card-body">
                                <p>Welcome to the Admin Dashboard. Here you can manage tickets, view reports, and handle user replies.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Recent Activities
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>Ticket #1234 approved</li>
                                    <li>User John Doe replied to Ticket #1235</li>
                                    <li>Summary report generated</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Ticket Status
                            </div>
                            <div class="card-body">
                                <canvas id="ticketStatusChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Summary Chart
                            </div>
                            <div class="card-body">
                                <canvas id="summaryChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- New section to assign tickets -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Assign Ticket
                            </div>
                            <div class="card-body">
                                <form id="assignTicketForm">
                                    <div class="form-group">
                                        <label for="ticketId">Ticket ID</label>
                                        <input type="text" class="form-control" id="ticketId" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userId">Assign to User</label>
                                        <select class="form-control" id="userId" required>
                                            <option value="1">Mithila Bandara</option>
                                            <option value="2">Oshan Tharuka</option>
                                            <option value="3">Akalanka Perera</option>
                                            <option value="4">Tharusha Singh</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Assign</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle ticket assignment
            document.getElementById('assignTicketForm').addEventListener('submit', function(event) {
                event.preventDefault();

                const ticketId = document.getElementById('ticketId').value;
                const userId = document.getElementById('userId').value;

                fetch(`/api/tickets/${ticketId}/assign`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure CSRF token is included
                    },
                    body: JSON.stringify({ user_id: userId })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    document.getElementById('assignTicketForm').reset();
                })
                .catch(error => console.error('Error:', error));
            });

            // Initialize charts with empty datasets
            var ticketStatusChart = new Chart(document.getElementById('ticketStatusChart'), {
                type: 'bar',
                data: {
                    labels: ['Pending', 'Approved', 'Completed'],
                    datasets: [{
                        label: 'Ticket Status',
                        backgroundColor: ['#ffc107', '#28a745', '#007bff'],
                        borderColor: ['#ffc107', '#28a745', '#007bff'],
                        borderWidth: 1,
                        data: []
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                autoSkip: false
                            }
                        }]
                    },
                    plugins: {
                        datalabels: {
                            anchor: 'end',
                            align: 'top',
                            formatter: function(value, context) {
                                return value; // Display value inside bar
                            }
                        }
                    }
                }
            });

            var summaryChart = new Chart(document.getElementById('summaryChart'), {
                type: 'pie',
                data: {
                    labels: ['Total Tickets', 'Pending', 'Approved', 'Completed'],
                    datasets: [{
                        label: 'Summary',
                        backgroundColor: ['#B11E1E', '#ffc107', '#28a745', '#007bff'],
                        borderColor: ['#060606', '#060606', '#060606', '#060606'],
                        borderWidth: 1,
                        data: []
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    plugins: {
                        datalabels: {
                            anchor: 'end',
                            align: 'top',
                            formatter: function(value, context) {
                                return value; // Display value inside bar
                            }
                        }
                    }
                }
            });

            // Fetch and update charts data
            fetch('/api/ticketData')
                .then(response => response.json())
                .then(data => {
                    // Update ticket status chart
                    ticketStatusChart.data.datasets[0].data = data.ticketStatus;
                    ticketStatusChart.update();

                    // Update summary chart
                    summaryChart.data.datasets[0].data = data.summary;
                    summaryChart.update();
                })
                .catch(error => console.error('Error:', error));
        });
    </script>



</body>
</html>
