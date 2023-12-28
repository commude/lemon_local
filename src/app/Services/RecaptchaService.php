<?php

namespace App\Services;

use GuzzleHttp\Client;

class RecaptchaService
{
    /**
     * Set form params to be used in HTTP Client.
     *
     * @param string $response
     * @return array
     */
    public function options($response)
    {
        return [
        'form_params' =>
            [
                'secret' => config('app.recaptcha.secret'),
                'response' => $response
            ]
        ];
    }

    /**
     * Validate recaptcha.
     *
     * @param string $recaptchaResponse
     * @return boolean
     */
    public function validate($recaptchaResponse)
    {
        // Check if Config enables Recaptcha
        if (!config('app.recaptcha.enable')) {
            return true;
        }

        $client = new Client;
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', $this->options($recaptchaResponse));
        $body = json_decode($response->getBody()->getContents());

        return $body->success;
    }
}
