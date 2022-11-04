<?php
/**
 * Contains the Concord interface.
 *
 * @copyright   Copyright (c) 2016 Aboozar Ghaffari
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Ship\Contracts\MarketPalace;

interface Proxy
{
    /**
     * Register/overwrite a model for a specific abstract/interface
     *
     * @param  string  $abstract
     * @param  string  $concrete
     *
     * @return void
     */
    public function registerModel(string $abstract, string $concrete);

    /**
     * Return the Model class for a specific abstract class
     *
     * @param  string  $abstract
     *
     * @return string
     */
    public function model(string $abstract);

    /**
     * Register/overwrite an enum for a specific abstract/interface
     *
     * @param  string  $abstract
     * @param  string  $concrete
     *
     * @return void
     */
    public function registerEnum(string $abstract, string $concrete);

    /**
     * Return the Enum class for a specific abstract class
     *
     * @param  string  $abstract
     *
     * @return string
     */
    public function enum(string $abstract);
}
