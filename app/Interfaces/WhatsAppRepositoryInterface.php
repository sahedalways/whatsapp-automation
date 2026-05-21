<?php

namespace App\Interfaces;

interface WhatsAppRepositoryInterface
{
    public function saveMessage(array $data);
}
