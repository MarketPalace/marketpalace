<?php

declare(strict_types=1);

/**
 * Contains the CartManager interface.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 *
 */

namespace App\Containers\MarketPalace\Cart\Contracts;

interface CartManager extends Cart
{
    /**
     * Returns whether a cart exists for this user or session
     *
     * @return bool
     */
    public function exists();

    /**
     * Returns true if neither the session nor the user has a cart
     *
     * @return bool
     */
    public function doesNotExist();

    /**
     * Returns the encapsulated ActiveRecord model or null if not exists
     *
     * @return Cart|null
     */
    public function model();

    /**
     * Returns true if the cart is empty (doesn't contain items)
     *
     * @return bool
     */
    public function isEmpty();

    /**
     * Returns true if the cart is not empty (contains items)
     *
     * @return bool
     */
    public function isNotEmpty();

    /**
     * Completely destroys the cart: removes all related models (cart, item, etc) from the DB
     */
    public function destroy();

    /**
     * Creates a new cart
     *
     * @param bool $forceCreateIfExists Creates a new cart even if there's an existing one
     */
    public function create($forceCreateIfExists = false);

    /**
     * Dissociates a user from a cart
     */
    public function removeUser();

    /**
     * Forget the cart for the session, but keep it
     */
    public function forget();
}
