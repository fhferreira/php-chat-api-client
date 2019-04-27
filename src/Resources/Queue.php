<?php

namespace Pedrommone\ChatAPI\Resources;

use GuzzleHttp\Client as Guzzle;

class Queue
{
    protected $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function lists(): \stdClass
    {
        $request = $this->guzzle->get('showMessagesQueue');

        return json_decode((string) $request->getBody());
    }

    public function flush(): \stdClass
    {
        $request = $this->guzzle->post('showMessagesQueue');

        return json_decode((string) $request->getBody());
    }
}
