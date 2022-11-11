<?php

declare(strict_types=1);

/**
 * Contains the Payment interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Payment\Contracts;

interface PaymentRequest
{
    /* Returns the html snippet to be rendered for initiating the payment */
    public function getHtmlSnippet(array $options = []): ?string;

    public function willRedirect(): bool;
}
