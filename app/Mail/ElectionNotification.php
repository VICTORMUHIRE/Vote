<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Election;
use App\Models\Faculte;

class ElectionNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $user, public Election $election,public ?Faculte $faculte)
    {
        $this->user = $user;
        $this->election = $election;
        $this->faculte =$faculte;
    }

    public function build()
    {
        if ($this->user->role === 'etudiant') {
            return $this->view('admin.mail.etudiant');
        } elseif ($this->user->role === 'superviseur') {
            return $this->view('admin.mail.superviseur');
        }
    }

}
