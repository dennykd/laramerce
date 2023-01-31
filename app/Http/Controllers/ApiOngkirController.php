<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ApiOngkirController extends Controller
{
    private $key, $url, $rules;

    public function __construct($data = [])
    {
        $this->key = config('ongkir.key');
        $this->url = "https://api.rajaongkir.com/starter/";
        $this->rules = collect([
            'province' => 'required|numeric',
            'city' => 'required|numeric',
            'origin' => 'required|numeric',
            'destination' => 'required|numeric',
        ]);
    }

    public function getProvince(Request $request)
    {
        $response = Http::get($this->url . 'province/', [
            'key' => $this->key,
        ]);

        return $response->json()['rajaongkir']['results'];
    }

    public function getCity(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules->except('city', 'origin', 'destination')->all());
        if ($validator->fails()) {
            return response()->json([
                "status" => 500,
                "description" => "invalid Input"
            ]);
        }

        $response = Http::get($this->url . 'city/', [
            'key' => $this->key,
            'province' => $request->province
        ]);

        return $response->json()['rajaongkir']['results'];
    }

    public function getCost(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules->except(['province', 'city'])->all());
        if ($validator->fails()) {
            return response()->json([
                "status" => 500,
                "description" => "invalid Input"
            ]);
        }

        $response = Http::post($this->url . 'cost/', [
            'key' => $this->key,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier
        ]);

        return $response->json()['rajaongkir'];
    }
}
