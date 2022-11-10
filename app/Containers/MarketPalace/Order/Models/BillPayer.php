<?php

declare(strict_types=1);

/**
 * Contains the BillPayer model class.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Order\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use App\Containers\MarketPalace\Address\Models\AddressProxy;
use App\Ship\Contracts\MarketPalace\Address;
use App\Ship\Contracts\MarketPalace\BillPayer as VaniloBillPayerContract;
use App\Containers\MarketPalace\Order\Contracts\BillPayer as BillPayerContract;

/**
 * This is a temporary class in order to make checkout and order
 * work temporarily as of v0.1. Probably will be moved to the
 * billing module or another module, if it survives at all
 */
class BillPayer extends ParentModel implements BillPayerContract, VaniloBillPayerContract
{
    protected $guarded = ['id', 'address_id'];

    protected string $resourceKey = 'BillPayer';

    public function isEuRegistered(): bool
    {
        return (bool) $this->is_eu_registered;
    }

    public function address()
    {
        return $this->belongsTo(AddressProxy::modelClass());
    }

    public function getBillingAddress(): Address
    {
        return $this->address;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getName(): string
    {
        if ($this->isOrganization()) {
            return $this->getCompanyName();
        }

        return $this->getFullName();
    }

    public function isOrganization(): bool
    {
        return (bool) $this->is_organization;
    }

    public function isIndividual(): bool
    {
        return !$this->isOrganization();
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function getTaxNumber(): ?string
    {
        return $this->tax_nr;
    }

    public function getFirstName(): ?string
    {
        return $this->firstname;
    }

    public function getLastName(): ?string
    {
        return $this->lastname;
    }

    public function getFullName(): string
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
}
