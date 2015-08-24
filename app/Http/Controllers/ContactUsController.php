<?php

namespace app\Http\Controllers;

use Mail;
use Cache;
use App\User;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param int $id
     *
     * @return Response
     */
    public function create()
    {
        return view('contactUs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

Date::setLocale('ar');
$m_date= Date::now()->format('l j F Y');
        $data = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message'),
            'm_date'=>$m_date,
            'time'=>date('H:i:s'),
        );
        if (Cache::has('contact')) {
            $value = Cache::get('contact');
            Cache::forever('contact', json_encode(array_merge(json_decode($value, 1), array($data))));
        } else {
            Cache::forever('contact', json_encode(array($data)));
        }

        $value = Cache::get('contact');
// Send Mail code
//         Mail::send('emails.contact', $data, function ($message) {
//     $message->from('us@example.com', 'Laravel');

//     $message->to('foo@example.com')->cc('bar@example.com');
// });

        return view('contactUs.list', array('data' => json_decode($value, 1)));
    }
}
