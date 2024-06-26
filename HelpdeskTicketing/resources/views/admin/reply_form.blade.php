<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to Ticket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.css">
    <style>
        body {
            background-color: #757E7E; /* Ash background color */
        }
        .custom-container {
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff; /* White form container */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .custom-card-header {
            background-color: #BF3B3B;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 15px 20px;
            font-size: 1.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        .custom-card-header i {
            margin-right: 10px;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        .form-label i {
            margin-left: 5px;
            color: #6c757d;
            cursor: pointer;
        }
        .form-label i:hover {
            color: #007bff;
        }
        .form-control {
            border-radius: 5px;
            padding: 10px;
        }
        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }
        .btn-custom {
            background-color: #475555;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            padding: 10px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s;
        }
        .btn-custom:hover {
            background-color: #7E8989;
            transform: translateY(-3px);
        }
        .tooltip-inner {
            max-width: 200px;
            padding: 8px;
            color: #fff;
            text-align: center;
            background-color: #000;
            border-radius: 5px;
        }
        .alert-custom {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container custom-container">
    <div class="card custom-card">
        <div class="card-header custom-card-header">
            <i class="fas fa-envelope"></i>
            <h2>Reply to Ticket: {{ $ticket->subject }}</h2>
        </div>
        <div class="card-body custom-card-body">
            @if (session('success'))
                <div class="alert alert-custom">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('ticket.sendReply', $ticket->id) }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">
                        Recipient Email
                        <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Recipient's email address"></i>
                    </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $ticket->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="subject" class="form-label">
                        Subject
                        <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Ticket subject"></i>
                    </label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{ $ticket->subject }}" disabled>
                </div>
                <div class="form-group">
                    <label for="original-message" class="form-label">
                        Original Message
                        <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Original ticket message"></i>
                    </label>
                    <textarea class="form-control" id="original-message" name="original-message" rows="3" disabled>{{ $ticket->message }}</textarea>
                </div>
                <div class="form-group">
                    <label for="reply" class="form-label">
                        Your Reply
                        <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Type your reply here"></i>
                    </label>
                    <textarea class="form-control" id="reply" name="reply" rows="5" placeholder="Enter your reply" required></textarea>
                </div>
                <button type="submit" class="btn btn-custom w-100">Send Reply</button>
            </form>
        </div>
    </div>
</div>

<!-- Include jQuery for tooltip functionality -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JS for tooltip functionality -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</body>
</html>
