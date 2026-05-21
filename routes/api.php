<?php

use App\Http\Controllers\API\WhatsAppController;
use Illuminate\Support\Facades\Route;


// after sending a message to the user, we can use the following code to send a message to the user:
Route::get('/webhook/whatsapp', [WhatsAppController::class, 'verify']);
Route::post('/webhook/whatsapp', [WhatsAppController::class, 'receive']);
