<?php

namespace Pedrommone\ChatAPI\Resources;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\RequestOptions;

class Instance
{
    protected $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function status(): \stdClass
    {
        $request = $this->guzzle->get('status');

        return json_decode((string) $request->getBody());
    }

    public function qrCode(): \stdClass
    {
        $request = $this->guzzle->get('qr_code');

        return json_decode((string) $request->getBody());
    }

    public function logout(): \stdClass
    {
        $request = $this->guzzle->post('logout');

        return json_decode((string) $request->getBody());
    }

    public function reboot(): \stdClass
    {
        $request = $this->guzzle->post('reboot');

        return json_decode((string) $request->getBody());
    }

    public function settings(): \stdClass
    {
        $request = $this->guzzle->post('settings');

        return json_decode((string) $request->getBody());
    }

    public function update(array $parameters = []): \stdClass
    {
        $request = $this->guzzle->post('settings', [
            RequestOptions::FORM_PARAMS => $parameters,
        ]);

        return json_decode((string) $request->getBody());
    }
}
