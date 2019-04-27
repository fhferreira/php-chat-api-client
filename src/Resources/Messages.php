<?php

namespace Pedrommone\ChatAPI\Resources;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\RequestOptions;

class Messages
{
    protected $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function send(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('sendMessage', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }

    public function forward(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('forwardMessage', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }

    public function file(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('sendFile', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }

    public function ptt(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('sendPTT', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }

    public function link(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('sendLink', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }

    public function contact(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('sendContact', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }

    public function location(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('location', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }

    public function lists(): \stdClass
    {
        $request = $this->guzzle->get('messages');

        return json_decode((string) $request->getBody());
    }

    public function webhook(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('messages', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }
}
