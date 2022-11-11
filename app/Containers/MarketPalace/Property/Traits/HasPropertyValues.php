<?php

declare(strict_types=1);

/**
 * Contains the HasPropertyValues trait.
 *
 * @copyright   Copyright (c) 2022 Aboozar Ghaffari
 * @package     MarketPalace
 * @author      Aboozar Ghaffari
 * @license     MIT
 */

namespace App\Containers\MarketPalace\Property\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Containers\MarketPalace\Property\Contracts\Property;
use App\Containers\MarketPalace\Property\Contracts\PropertyValue;
use App\Containers\MarketPalace\Property\Models\PropertyProxy;
use App\Containers\MarketPalace\Property\Models\PropertyValueProxy;

trait HasPropertyValues
{
    public function assignPropertyValue(string|Property $property, mixed $value): void
    {
        if ($value instanceof PropertyValue) {
            $this->addPropertyValue($value);

            return;
        }

        $propertyValue = PropertyValueProxy::findByPropertyAndValue($property, $value);
        if (null === $propertyValue) {
            $propertyValue = PropertyValueProxy::create([
                'property_id' => $property instanceof Property ? $property->id : PropertyProxy::findBySlug($property)?->id,
                'value' => $value,
                'title' => $value,
            ]);
        }

        $this->addPropertyValue($propertyValue);
    }

    public function assignPropertyValues(iterable $propertyValues): void
    {
        foreach ($propertyValues as $property => $value) {
            $this->assignPropertyValue($property, $value);
        }
    }

    public function valueOfProperty(string|Property $property): ?PropertyValue
    {
        $propertySlug = is_string($property) ? $property : $property->slug;
        foreach ($this->propertyValues as $propertyValue) {
            if ($propertySlug === $propertyValue->property->slug) {
                return $propertyValue;
            }
        }

        return null;
    }

    public function propertyValues(): MorphToMany
    {
        return $this->morphToMany(
            PropertyValueProxy::modelClass(),
            'model',
            'model_property_values',
            'model_id',
            'property_value_id'
        );
    }

    public function addPropertyValue(PropertyValue $propertyValue): void
    {
        $this->propertyValues()->attach($propertyValue);
    }

    public function addPropertyValues(iterable $propertyValues): array|\Illuminate\Support\Collection
    {
        foreach ($propertyValues as $propertyValue) {
            if (!$propertyValue instanceof PropertyValue) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'Every element passed to addPropertyValues must be a PropertyValue object. Given `%s`.',
                        is_object($propertyValue) ? get_class($propertyValue) : gettype($propertyValue)
                    )
                );
            }
        }

        return $this->propertyValues()->saveMany($propertyValues);
    }

    public function removePropertyValue(PropertyValue $propertyValue): int
    {
        return $this->propertyValues()->detach($propertyValue);
    }
}
