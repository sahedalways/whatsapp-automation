<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroqService
{
    public function generateReply($message, $systemPrompt = null)
    {
        $apiKey = config('services.groq.key');
        $model = config('services.groq.model');

        $systemPrompt = $systemPrompt ?? "You are a helpful assistant.";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => $model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $systemPrompt,
                ],
                [
                    'role' => 'user',
                    'content' => $message,
                ],
            ],
            'temperature' => 0.7,
        ]);

        if ($response->failed()) {
            \Log::error($response->body());
            return "AI service error. Please try again.";
        }

        return $response->json('choices.0.message.content')
            ?? "Sorry, I could not respond.";
    }
}
