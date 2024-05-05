<?php

declare(strict_types=1);

namespace App\Enums;

enum DocumentType: string
{
    case Contract = "prebuilt-contract";
    case CreditCard = "prebuilt-creditCard";
    case Invoice = "prebuilt-invoice";
    case Receipt = "prebuilt-receipt";
    case IdDocument = "prebuilt-idDocument";
}
