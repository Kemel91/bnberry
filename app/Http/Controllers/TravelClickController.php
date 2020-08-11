<?php

namespace App\Http\Controllers;

use App\Services\TravelClickService;
use Illuminate\Http\Request;

class TravelClickController extends Controller
{
    private $service;

    private const RESPONSE_HEAD = [
        'ping' => 'OTA_PingRS',
        'hotelProductRQ' => 'OTA_HotelProductRS'
    ];

    public function __construct(TravelClickService $service)
    {
        $this->service = $service;
    }

    public function ping(Request $request)
    {
        $data = $this->service->ping($request->xml());
        return response()->xml($data, 200, [], self::RESPONSE_HEAD['ping']);
    }

    public function hotelProductRQ(Request $request)
    {
        $data = $this->service->hotelProductRQ($request->xml());
        return response()->xml($data, 200, [], self::RESPONSE_HEAD['hotelProductRQ']);
    }
}
