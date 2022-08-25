<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCreated extends Mailable
{
    use Queueable, SerializesModels;

    private $booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $vehicle = $this->booking->vehicle;

        $file = public_path('storage/img/911.png');

        return $this->view('emails.bookingCreated')
                    //->attach($file)
                    ->attach($file, ['as' => 'bild.png', 'mime' => 'image/png'])
                    ->from('noreplay@carmanagement.com', 'Nicht an mich')
                    ->subject('Buchungsbestätigung')
                    ->with([
                        'start' => $this->booking->start_at->format('d.m.Y'),
                        'ende' => $this->booking->end_at->format('d.m.Y'),
                        'fahrzeug' => $vehicle->brand.', '.$vehicle->type.', '.$vehicle->registration
                    ]);
    }
}
