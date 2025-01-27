<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Emploi extends Mailable
{
    use Queueable, SerializesModels;




    public function __construct(){

    }



    public function build(){
        return $this->view('enseignant.alerte-emploi')->subject("Emploi du temps ");
    
    }
}
