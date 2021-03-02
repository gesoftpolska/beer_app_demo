<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02.03.2021
 * Time: 21:24
 */

namespace App\Http\Gateways;


use App\Http\Interfaces\BeerInterface;
use Illuminate\Http\Request;

class BeerGateway
{
    private $beerRepository;

    public function __construct(BeerInterface $beerI)
    {
        $this->beerRepository = $beerI;
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        $priceFrom = $request->input('price_from');
        $priceTo = $request->input('price_to');
        $countryCode = $request->input('country_code');
        $brewerId = $request->input('brewer_id');
        $result_search = $this->beerRepository->search_with_brewers($name, $countryCode, $brewerId, $priceFrom, $priceTo);
        return $this->getJson($result_search);
    }

    public function getJson($data)
    {
        return json_encode($data);
    }

    public function createBrewer(Request $request)
    {
        $brewerName = $request->input('name');

        if (isset($brewerName)) {
            return $this->beerRepository->store_new_brewer($brewerName);
        } else {
            return 'No data to save!';
        }

    }

    public function getBrewersJson()
    {
        $result = $this->beerRepository->get_brewers();
        return $this->getJson($result);

    }

    public function getCurrentBeerJson($id){
        $result = $this->beerRepository->get_current_beer($id);
        return $this->getJson($result);
    }


}