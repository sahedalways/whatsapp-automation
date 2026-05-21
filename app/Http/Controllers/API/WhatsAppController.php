<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\WhatsAppService;

class WhatsAppController extends BaseController
{
    protected $service;

    public function __construct(WhatsAppService $service)
    {
        $this->service = $service;
    }

    public function verify(Request $request)
    {
        $verify_token = "my_verify_token";

        if (
            $request->hub_mode == "subscribe" &&
            $request->hub_verify_token == $verify_token
        ) {
            return response($request->hub_challenge, 200);
        }

        return $this->errorResponse('Verification failed', 403);
    }

    public function receive(Request $request)
    {
        $phone = $request->input('phone');
        $message = $request->input('message');

        $reply = $this->service->handleIncomingMessage($phone, $message);

        return $this->successResponse([
            'reply' => $reply
        ]);
    }
}
