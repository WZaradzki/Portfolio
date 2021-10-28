<?php

namespace App\Http\Controllers\Api\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMailValidation;
use App\Mail\ContactConfirmMail;
use App\Mail\ContactMail;
use App\Models\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function send(SendMailValidation $request)
    {

        $contact = Contact::create($request->validated());

        Mail::to(config('app.email'))->send(new ContactMail($contact));
        Mail::to($contact->email)->send(new ContactConfirmMail($contact));

        return 'ok';
    }
}
