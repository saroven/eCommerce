<?php

namespace App\Mail;

use App\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $items;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order,  $item)
    {
        $this->order = $order;

        $this->items = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(auth()->user()->email, $this->order->billing_name)
                    ->bcc('another@another.com')
                    ->subject('Your Order Successfully Placed')
                    ->markdown('mail.orderplaced', compact('items'));
    }
}
