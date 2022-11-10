<?php

declare(strict_types=1);

/**
 * Contains the NanoIdGenerator class.
 *
 * @copyright   Copyright (c) 2020 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Ship\Generators;

use Hidehalo\Nanoid\Client;

class NanoIdGenerator
{
    private const ALPHABET = '_-0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    private string $alphabet;

    private int $size = 21;

    public function __construct(int $size = null, string $alphabet = null)
    {
        $this->alphabet = $alphabet ?? self::ALPHABET;
        $this->size = $size ?? $this->size;
    }

    public function generate(): string
    {
        $client = new Client();
        return $client->formattedId($this->alphabet, $this->size);
    }
}
