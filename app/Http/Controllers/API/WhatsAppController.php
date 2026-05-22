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
        $verify_token = config('services.whatsapp.verify_token');

        if (
            !$request->has('hub_mode') ||
            !$request->has('hub_verify_token') ||
            !$request->has('hub_challenge')
        ) {

            return $this->errorResponse(
                'Missing required webhook parameters',
                400,
                [
                    'received' => $request->all()
                ]
            );
        }

        if (
            $request->hub_mode === "subscribe" &&
            $request->hub_verify_token === $verify_token
        ) {
            return response($request->hub_challenge, 200);
        }

        return $this->errorResponse(
            'Invalid verify token',
            403,
            [
                'expected_token' => $verify_token,
                'received_token' => $request->hub_verify_token
            ]
        );
    }

    public function receive(Request $request)
    {
        $messageData =
            $request['entry'][0]['changes'][0]['value']['messages'][0] ?? null;

        if (!$messageData) {
            return $this->errorResponse(
                'No message received',
                400
            );
        }

        $phone = $messageData['from'];
        $message = $messageData['text']['body'] ?? '';

        $reply = $this->service->handleIncomingMessage(
            $phone,
            $message
        );

        return $this->successResponse([
            'reply' => $reply
        ]);
    }
}
