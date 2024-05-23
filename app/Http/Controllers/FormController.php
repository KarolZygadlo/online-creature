<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTOs\DataToAnalyze;
use App\Enums\DocumentType;
use App\Services\OcrService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(): View
    {
        return view("form")
            ->with("documentTypes", DocumentType::getLabels());
    }

    /**
     * @throws ConnectionException
     */
    public function process(Request $request, OcrService $ocrService): View
    {
        $type = DocumentType::tryFrom($request->type);
        $requestId = $ocrService->analyzeDocument(new DataToAnalyze(base64_encode($request->file("document")->getContent()), $type));

        $analyseDone = false;

        while (!$analyseDone) {
            $responseAnalysis = $ocrService->getAnalyzeResult($requestId, $type);
            $analyseDone = $responseAnalysis["status"] === "succeeded";
            sleep(1);
        }

        return view("components.code", [
            "code" => json_encode($responseAnalysis["analyzeResult"]["documents"], JSON_PRETTY_PRINT),
        ]);
    }
}
