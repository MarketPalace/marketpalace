<?php

declare(strict_types=1);

/**
 * Contains the HasCheckoutState trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Checkout\Traits;

use App\Containers\MarketPalace\Checkout\Contracts\CheckoutState as CheckoutStateContract;
use App\Containers\MarketPalace\Checkout\Enums\CheckoutState;

trait HasCheckoutState
{
    public function getState(): CheckoutState
    {
        return $this->state instanceof CheckoutStateContract ? $this->state : CheckoutState::create($this->state);
    }

    public function setState($state)
    {
        $this->state = $state instanceof CheckoutStateContract ? $state : CheckoutState::create($state);
    }
}
