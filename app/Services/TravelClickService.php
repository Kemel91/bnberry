<?php

namespace App\Services;

class TravelClickService
{
    private function success(array $data): array
    {
        $data['@attributes']['xmlns'] = 'http://www.opentravel.org/OTA/2003/05';
        $data['Success'] = null;
        return $data;
    }

    public function ping(array $data): array
    {
        return $this->success($data);
    }

    public function hotelProductRQ(array $data)
    {
        unset($data['POS']);
        return $this->success($data);
    }
}
