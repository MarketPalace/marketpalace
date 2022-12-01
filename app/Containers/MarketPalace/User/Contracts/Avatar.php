<?php
/**
 * Contains the Avatar interface.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 * @since       2018-11-18
 *
 */

namespace App\Containers\MarketPalace\User\Contracts;

interface Avatar
{
    public static function create(string $data = null): Avatar;

    public function getData(): string;

    public function getUrl(string $variant = null): string;

    public function delete();
}
