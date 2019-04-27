<?php

namespace Pedrommone\ChatAPI\Resources;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\RequestOptions;

class Ban
{
    protected $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function settings(): \stdClass
    {
        $request = $this->guzzle->get('banSettings');

        return json_decode((string) $request->getBody());
    }

    public function update(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('banSettings', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }

    public function test(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('banTest', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }
}
