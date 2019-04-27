<?php

namespace Pedrommone\ChatAPI\Resources;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\RequestOptions;

class Dialogs
{
    protected $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function lists(): \stdClass
    {
        $request = $this->guzzle->get('dialogs');

        return json_decode((string) $request->getBody());
    }

    public function read(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('readChat', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }
}
