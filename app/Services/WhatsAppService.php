<?php

namespace App\Services;

use App\Interfaces\WhatsAppRepositoryInterface;
use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected $repo;

    protected $aiService;

    public function __construct(
        WhatsAppRepositoryInterface $repo,
        GroqService $aiService
    ) {
        $this->repo = $repo;
        $this->aiService = $aiService;
    }

    public function handleIncomingMessage($phone, $message)
    {

        $systemPrompt = include base_path('app/AI/prompts/softivon.php');

        $reply = $this->aiService->generateReply($message, $systemPrompt);


        $this->repo->saveMessage([
            'phone' => $phone,
            'message' => $message,
            'reply' => $reply
        ]);


        $this->sendMessage($phone, $reply);

        return $reply;
    }


    public function sendMessage($phone, $message)
    {
        $token = config('services.whatsapp.access_token');
        $phoneNumberId = config('services.whatsapp.phone_number_id');

        $url = "https://graph.facebook.com/v22.0/{$phoneNumberId}/messages";

        return Http::withToken($token)
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $phone,
                'type' => 'text',
                'text' => [
                    'body' => $message
                ]
            ]);
    }
}
