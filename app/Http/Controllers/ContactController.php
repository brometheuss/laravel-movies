<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use http\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public $data;

    public function checkContactForm(Request $request){
        $email = $request->input('email');
        $subject = $request->input('subject');
        $messagee = $request->get('messagee');

        $this->data['email'] = $email;
        $this->data['messagee'] = $messagee;
        $this->data['subject'] = $subject;

        $to = "Administrator";
        $toEmail = 'uros-markov@hotmail.com';

        \Mail::send('pages.email', $this->data, function(\Illuminate\Mail\Message $message) use ($to, $toEmail, $email, $subject, $messagee){
            $message->to($toEmail, $to)
                ->subject('Contact Ticket - Obaju');
            $message->from('uros.markov.42.15@ict.edu.rs', 'Uros');
        });
        return redirect()->route('contact')->with('email-suc', 'Email successfully delivered to the administrator.');
    }
}
