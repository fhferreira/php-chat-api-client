<?php

namespace Pedrommone\ChatAPI;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Pedrommone\ChatAPI\Middlewares\InjectTokenAuthorization;
use Pedrommone\ChatAPI\Resources\Ban;
use Pedrommone\ChatAPI\Resources\Dialogs;
use Pedrommone\ChatAPI\Resources\Groups;
use Pedrommone\ChatAPI\Resources\Instance;
use Pedrommone\ChatAPI\Resources\Messages;
use Pedrommone\ChatAPI\Resources\Queue;

class Client
{
    const URL = 'https://api.chat-api.com/instance%s/';

    protected $guzzle;

    public function __construct(string $instanceId, string $token)
    {
        $this->guzzle = $this->buildGuzzleClient($instanceId, $token);
    }

    public function setCredentials(string $instanceId, string $token): self
    {
        $this->guzzle = $this->buildGuzzleClient($instanceId, $token);

        return $this;
    }

    public function ban(): Ban
    {
        return new Ban($this->guzzle);
    }

    public function dialogs(): Dialogs
    {
        return new Dialogs($this->guzzle);
    }

    public function groups(): Groups
    {
        return new Groups($this->guzzle);
    }

    public function instance(): Instance
    {
        return new Instance($this->guzzle);
    }

    public function messages(): Messages
    {
        return new Messages($this->guzzle);
    }

    public function queue(): Queue
    {
        return new Queue($this->guzzle);
    }

    private function buildGuzzleClient(string $instanceId, string $token): Guzzle
    {
        $handler = new HandlerStack();
        $handler->setHandler(new CurlHandler());

        $guzzle = new Guzzle([
            'base_uri' => sprintf(self::URL, $instanceId),
            'handler' =>  $handler,
        ]);

        $handler->push((new InjectTokenAuthorization())($token));

        return $guzzle;
    }
}
