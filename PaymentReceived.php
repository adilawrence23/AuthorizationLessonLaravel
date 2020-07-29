<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\NexmoMessage;
class PaymentReceived extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail','database','nexmo'];
        return ['mail','database','nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Your Payment for the order was received')
                    ->greeting("What's Up?")
                    ->line('Order PLaced Successfully!')
                    ->line('Get the mail representation of the notification.')
                    ->action('View Payment Details', url('/'))
                    ->line('Thank you for Shopping with Us!');
    }
        /**
         * Get the Nexmo / SMS representation of the notification.
         *
         * @param  mixed  $notifiable
         * @return NexmoMessage
         */
        public function toNexmo($notifiable)
        {
            return (new NexmoMessage())
                        ->content('Your Payment has been Received!')
                        ->from('8017969498');
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'amount'=> $this->amount
        ];
    }
}