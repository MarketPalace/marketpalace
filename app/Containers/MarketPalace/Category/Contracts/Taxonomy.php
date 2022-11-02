<?php

declare(strict_types=1);

/**
 * Contains the Taxonomy interface.
 *
 * @copyright   Copyright (c) 2018 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 *  */

namespace App\Containers\MarketPalace\Category\Contracts;

use Illuminate\Support\Collection;

interface Taxonomy
{
    /**
     * Returns a taxonomy based on its name
     *
     * @param string $name
     *
     * @return Taxonomy|null
     */
    public static function findOneByName(string $name): ?Taxonomy;

    /**
     * Returns the root level taxons for the taxonomy
     *
     * @return Collection
     */
    public function rootLevelTaxons(): Collection;
}
