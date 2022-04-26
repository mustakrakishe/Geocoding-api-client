<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeocodeApi
{
    private $URL = 'https://maps.googleapis.com/maps/api/geocode/json';
    private $TOKEN;
    private $LANG;

    public function __construct(string $token, string $lang)
    {
        $this->TOKEN = $token;
        $this->LANG = $lang;
    }

    /**
     * @return \Illuminate\Http\Client\Response
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function getAddresses(float $latitude, float $longitude)
    {
        return Http::get($this->URL, [
            'key' => $this->TOKEN,
            'language' => $this->LANG,
            'latlng' => $latitude . ',' . $longitude,
        ])->throw();
    }
}