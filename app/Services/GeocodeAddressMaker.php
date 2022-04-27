<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Region;

abstract class GeocodeAddressMaker
{
    public static function make(array $results)
    {
        $result = self::getAddressByType($results, 'administrative_area_level_1');
        $region = Region::firstOrCreate(
            ['place_id' => $result['place_id']],
            ['name' => self::getAddressByType($result['address_components'], 'administrative_area_level_1')['long_name']]
        );

        $result = self::getAddressByType($results, 'locality');
        $city = $region->cities()->firstOrCreate(
            ['place_id' => $result['place_id']],
            ['name' => self::getAddressByType($result['address_components'], 'locality')['long_name']]
        );
        
        $result = $results[0];
        return $address = $city->addresses()->firstOrCreate(
            ['place_id' => $result['place_id']],
            ['full' => $result['formatted_address']]
        );
    }

    private static function getAddressByType($addresses, $requiredType)
    {
        foreach ($addresses as $address) {
            if (in_array($requiredType, $address['types'])) {
                return $address;
            }
        }
    }
}