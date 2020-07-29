@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @forelse($notifications as $notification)
                <li>
                    @if($notification->type === 'App\Notifications\PaymentReceived')
                        We have received your Payment of INR {{ $notification->data['amount']}}.
                    @endif
                </li>
                @empty
                <li>You have no unread notifications at this time.</li>
            @endforelse
        </ul>
    </div>    
@endsection