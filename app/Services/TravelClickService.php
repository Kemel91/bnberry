<?php

namespace App\Services;

class TravelClickService
{
    public function ping(array $data): array
    {
        $data['Success'] = null;
        return $data;
    }

    public function hotelProductRQ(array $data)
    {
        //dd($data);
        $data['Success'] = null;
        return $data;
    }
}
