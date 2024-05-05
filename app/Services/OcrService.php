<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class OcrService
{
    /**
     * @throws ConnectionException
     */
    public function analyzeDocument(Request $request)
    {
        Http::withHeaders([
            "Ocp-Apim-Subscription-Key" => env("AZURE_ACCESS_KEY"),
            "Content-Type" => "application/json"
        ])
            ->post(env("AZURE_ENDPOINT") . "formrecognizer/documentModels" . $request->type);
    }
}
