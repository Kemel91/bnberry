<?php

namespace App\Services;

class TravelClickService
{
    public function ping(array $data): array
    {
        $data['@attributes']['xmlns'] = 'http://www.opentravel.org/OTA/2003/05';
        $data['Success'] = null;
        return $data;
    }

    public function hotelProductRQ(array $data)
    {
        $data['Success'] = null;
        unset($data['POS']);
        $data['@attributes']['xmlns'] = 'http://www.opentravel.org/OTA/2003/05';
        return $data;
    }
}
