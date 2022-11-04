<?php
/**
 * Contains the PersonNameSplitter class.
 *
 * @copyright   Copyright (c) 2017 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Address\Utils;

use App\Containers\MarketPalace\Address\Enums\NameOrderProxy;
use Illuminate\Support\Arr;
use App\Containers\MarketPalace\Address\Contracts\NameOrder;

class PersonNameSplitter
{
    /**
     * Parse and split a fullname into firstname & lastname.
     *
     * Returns an array with attributes as keys eg.:
     * $name = 'Charlie Firpo' -> [ 'firstname' => 'Charlie', 'lastname' => 'Firpo']
     *
     * Note that these are just rough guesses
     *
     * @param  string  $name
     * @param  NameOrder|null  $nameOrder
     *
     * @return array
     */
    public static function split(string $name, NameOrder $nameOrder = null): array
    {
        $name      = trim($name);
        $parts     = explode(' ', $name);
        $nameOrder = $nameOrder ?: NameOrderProxy::create(); // create default if none was given

        switch (count($parts)) {
            case 1:
                return ['firstname' => $name];
                break;
            case 2:
                if ($nameOrder->isEastern()) {
                    return [
                        'firstname' => $parts[1],
                        'lastname'  => $parts[0]
                    ];
                }

                return [
                    'firstname' => $parts[0],
                    'lastname'  => $parts[1]
                ];
                break;
            case 3:
                if ($nameOrder->isEastern()) {
                    return [
                        'firstname' => $parts[1] . ' ' . $parts[2],
                        'lastname'  => $parts[0]
                    ];
                }

                return [
                    'firstname' => $parts[0] . ' ' . $parts[1],
                    'lastname'  => $parts[2]
                ];
                break;
        }

        if ($nameOrder->isEastern()) {
            return [
                'firstname' => Arr::last($parts),
                'lastname'  => implode(' ', Arr::except($parts, count($parts) - 1))
            ];
        }

        return [
            'firstname' => Arr::first($parts),
            'lastname'  => implode(' ', Arr::except($parts, 0))
        ];
    }
}
