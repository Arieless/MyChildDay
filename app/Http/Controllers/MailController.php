<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;

class MailController extends Controller
{

    public function postContact(Request $request) {

      $this->validate($request, [
        'contactEmail' => 'required|email',
        'contactSubject' => 'required',
        'contactTextArea' => 'required'
      ]);

      $data = array(
            'emailFrom' => $request->contactEmail,
            'subject' => $request->contactSubject,
            'bodyMessage' => $request->contactTextArea,
          );

      Mail::send('emails.contactEmail', $data, function($message) use ($data){
          $message->from($data['emailFrom']);
          $message->to('test@mychildday.com');
          $message->subject($data['subject']);
      });

      return redirect('/');
    }
}
