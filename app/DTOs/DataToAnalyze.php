<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Enums\DocumentType;

readonly class DataToAnalyze
{
    public function __construct(
        public string $document,
        public DocumentType $type,
    ) {}
}
