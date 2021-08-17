<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\User;

class FormController extends Controller {

    public function contact(Request $request) {
        $user = User::find(1);
        
        

      //  if ($this->reCaptchaValidate($request->get('g-recaptcha-response'))) {
 if ($this->captchaValidate($request->get('captcha'))) {
            Mail::send('emails.contact', ['contact' => $request->all()], function ($m) use ($request, $user) {
                foreach (explode(';', $user->notify_email) as $email) {
                    $m->to($email, $email)->subject('Запрос с сайта zavodkorund');
                }
            });
        } else {
            abort(500);
        }
    }

    public function callback(Request $request) {
        $user = User::find(1);
       // if ($this->reCaptchaValidate($request->get('g-recaptcha-response'))) {
        if ($this->captchaValidate($request->get('captcha'))) {
            Mail::send('emails.callback', ['contact' => $request->all()], function ($m) use ($request, $user) {
                foreach (explode(';', $user->notify_email) as $email) {
                    $m->to($email, $email)->subject('zavodkorund - обратный звонок');
                }
            });
        } else {
            abort(500);
        }
    }

    
    public function captchaValidate($code) {

        session()->reflash();
        if($code == session('captcha_result')) {
            return true;
        } else {
            return false;
        }
    }

    public function reCaptchaValidate($code) {
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=6Lez3kAUAAAAABHAhjqUogO9kTCr9LvAAGBNGcne&response=' . $code;
    //   dd($url);
      //  $curl = curl_init($url);
      //  curl_setopt($curl, CURLOPT_HEADER, false);
       // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

       // $checkResponse = curl_exec($curl);
       // $decodedResponse = json_decode($checkResponse, true);
  
        $decodedResponse = json_decode(file_get_contents($url), true);

        return $decodedResponse['success'];
    }

}
