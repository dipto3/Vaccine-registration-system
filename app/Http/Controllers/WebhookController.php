<?php

namespace App\Http\Controllers;

use App\Services\WebhookService;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    protected $webhookService;

    public function __construct(WebhookService $webhookService)
    {
        $this->webhookService = $webhookService;
    }
    public function zapier(Request $request)
    {
        $this->webhookService->zapier($request);
        return response()->json(['message' => 'Registration successful!']);
    }
}
