<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;



class Email extends Component
{
    public $name;
    public $email;
    public $body;
    public $subject;
    public $success;

    protected $rules = [
        'name' => 'required',
        'email'=> 'required|email',
        'body'=> 'required',
        'subject'=> 'required',
    ];

    public function submitForm()
    {
        $this->validate();
        $data = \App\Models\Email::create([
            'name' => $this->name,
            'email' => $this->email,
            'body' => $this->body,
            'subject' => $this->subject,
        ]);

        Mail::to('thomas.demeulenaere@hotmail.com')->send(new ContactMail($data));

        $this->reset([
            'name',
            'email',
            'body',
             'subject'
        ]);
        $this->success = 'Your e-mail is send successfully';
    }

    public function modalSuccess()
    {
        $this->success = "";
    }

    public function render()
    {
        return view('livewire.email');
    }
}
