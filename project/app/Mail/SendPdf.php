<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;
use App\Models\data;

class SendPdf extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $data = data::all();
        $pdf = PDF::loadView('pdf_data', compact('data'));
        $pdfdownload = $pdf->download('pdf_file.pdf');
        return $this->from('app@learnershub.mohacodes.com', 'System')
            ->subject('Pdf Attachment')
            ->view('EmailPdf')
            ->attachData($pdf->output(), "data.pdf");
            // ->with("data", $this->details);
    }
}
