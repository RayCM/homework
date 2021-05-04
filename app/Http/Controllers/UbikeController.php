<?php

namespace App\Http\Controllers;

use App\Ubike;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use GuzzleHttp\Client as Client;
use GuzzleHttp\Exception\RequestException;
use Validator;

class UbikeController extends BaseController
{
    public function setStationData()
    {
        $client = new Client;
        try {
            $res = $client->request('GET', 'https://tcgbusfs.blob.core.windows.net/blobyoubike/YouBikeTP.json');
            $data = json_decode($res->getBody(), true);            
            $stations = $data['retVal'];
            foreach ($stations as $station) {
               $setStation = Ubike::create($station);
            }
            return $this->sendResponse([], 'Set successfully.');
        } catch (RequestException $e) {
            return $this->sendError($e->getRequest(), [], 500);
        }
    }

    public function getStationsBySearch(Request $request)
    {
        $search = $request->search;
        $query = new Ubike;
        $stations = $query->getBySearch($search);
        
        return $this->sendResponse($stations->toArray(), 'Stations retrieved successfully.');
    }

    public function getAllStations(Request $request)
    {
        $stations = Ubike::all();
        return $this->sendResponse($stations->toArray(), 'Stations retrieved successfully.');
    }
}
