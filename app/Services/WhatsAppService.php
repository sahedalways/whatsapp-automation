<?php

namespace App\Services;

use App\Interfaces\WhatsAppRepositoryInterface;

class WhatsAppService
{
    protected $repo;

    public function __construct(WhatsAppRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function handleIncomingMessage($phone, $message)
    {

        $reply = $this->generateReply($message);


        $this->repo->saveMessage([
            'phone' => $phone,
            'message' => $message,
            'reply' => $reply
        ]);


        return $reply;
    }

    private function generateReply($message)
    {
        $message = strtolower($message);

        if (str_contains($message, 'price')) {
            return "Price starts from 5000 BDT";
        }

        if (str_contains($message, 'hello')) {
            return "Hello! How can I help you?";
        }

        return "Sorry, I didn't understand. Please explain.";
    }
}
