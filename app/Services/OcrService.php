<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\DataToAnalyze;
use App\Enums\DocumentType;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class OcrService
{
    /**
     * @throws ConnectionException
     */
    public function analyzeDocument(DataToAnalyze $data): void
    {
        $response = Http::withHeaders([
            "Ocp-Apim-Subscription-Key" => env("AZURE_ACCESS_KEY"),
            "Content-Type" => "application/json",
        ])->withUrlParameters([
            "endpoint" => env("AZURE_ENDPOINT") . "documentintelligence/documentModels",
            "model" => $data->type->value,
        ])->withQueryParameters([
            "_overload" => "analyzeDocument",
            "api-version" => "2024-02-29-preview",
        ])->post("{+endpoint}/{model}:analyze", [
            "base64Source" => $data->document,
        ]);

        $response = $this->getAnalyzeResult($response->header("apim-request-id"), $data->type);
    }

    /**
     * @throws ConnectionException
     */
    protected function getAnalyzeResult(string $id, DocumentType $type)
    {
        return Http::async()->withHeaders([
            "Ocp-Apim-Subscription-Key" => env("AZURE_ACCESS_KEY")])
            ->withUrlParameters([
                "endpoint" => env("AZURE_ENDPOINT") . "documentintelligence/documentModels",
                "model" => $type->value,
            ])->withQueryParameters([
                "api-version" => "2024-02-29-preview",
            ])->get("{+endpoint}/{model}/analyzeResults/" . $id);
    }
}
