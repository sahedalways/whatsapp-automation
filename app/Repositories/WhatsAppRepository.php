<?php

namespace App\Repositories;

use App\Interfaces\WhatsAppRepositoryInterface;
use App\Models\Message;

class WhatsAppRepository implements WhatsAppRepositoryInterface
{
    public function saveMessage(array $data)
    {
        return Message::create([
            'phone' => $data['phone'],
            'message' => $data['message'],
            'reply' => $data['reply'] ?? null,
        ]);
    }
}
