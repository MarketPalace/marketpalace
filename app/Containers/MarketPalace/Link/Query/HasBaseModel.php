<?php

declare(strict_types=1);

/**
 * Contains the HasBaseModel trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Link\Query;

use Illuminate\Database\Eloquent\Model;

trait HasBaseModel
{
    private Model $baseModel;

    public function between(Model $model): self
    {
        $this->baseModel = $model;

        return $this;
    }
}
