@extends('layouts.app')

@section('content')
    <div class="notifications">
        <h3>Notifications</h3>
        <ul>
            @foreach($notifications as $notification)
                <li>{{ $notification->data['message'] }} (Ticket ID: {{ $notification->data['ticketId'] }})</li>
            @endforeach
        </ul>
    </div>
@endsection
