<?php

namespace Pedrommone\ChatAPI\Middlewares;

use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

class InjectTokenAuthorization
{
    public function __invoke(string $token): Callable
    {
        return Middleware::mapRequest(function(RequestInterface $request) use ($token) {
            return $request->withUri(Uri::withQueryValue($request->getUri(), 'token', $token));
        });
    }
}
