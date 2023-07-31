<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail)
    {
      $client = new Client();
      $response = $client->request('POST','https://www.google.com/recaptcha/api/siteverify',[
        'form_params' => [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
            'response' => $value,
            'remoteip'=> request()->ip()

        ]
      ]);
      $response = json_decode(response->getBody());
      return $response->success;
    }
}
