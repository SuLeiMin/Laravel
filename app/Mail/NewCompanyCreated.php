<?php

namespace App\Mail;

use App\Models\Mtcompany;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCompanyCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Mtcompany $mtcompany)
    {
        $this->mtcompany = $mtcompany;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.new_company_created', ["mtcompany" => $this->mtcompany])->subject("New Employee Created");
    }
}
