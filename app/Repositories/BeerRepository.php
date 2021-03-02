<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02.03.2021
 * Time: 21:16
 */

namespace App\Repositories;


use App\Beer;
use App\Brewer;
use App\Http\Interfaces\BeerInterface;

class BeerRepository implements BeerInterface
{

    public function get_brewers()
    {
        $result = Brewer::select('id', 'name')->withCount('beers')->get();
        return $result;
    }


    public function is_brewer_exist($brewername)
    {
        $brewer = Brewer::where('name', 'like', $brewername)->exists();
        return $brewer;
    }


    public function search_with_brewers($name = null, $countryCode = null, $brewerId = null, $priceFrom = null, $priceTo = null)
    {
        $query = Beer::query()->with('brewer');

        if (isset($name)) {
            $query = $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if (isset($countryCode)) {
            $query = $query->where('country_code', '=', $countryCode);
        }
        if (isset($brewerId)) {
            $query = $query->where('id_brewer', $brewerId);
        }
        if (isset($priceFrom)) {
            $query = $query->where('price_from', '<=', $priceFrom);
            $query = $query->where('price_to', '>=', $priceFrom);
        }
        if (isset($priceTo)) {
            $query = $query->where('price_from', '<=', $priceTo);
            $query = $query->where('price_to', '>=', $priceTo);
        }

        $result = $query->paginate(10);

        return $result;

    }


    public function store_new_brewer($name)
    {
        if (!$this->checkIsExistBrewer($name)) {
            $brewer = new Brewer();
            $brewer->name = $name;
            $brewer->save();
            return 'Brewer was created successfull!';
        }
    }

    public function check_is_exist_brewer($brewerName)
    {
        $brewer = Brewer::where('name', 'like', $brewerName)->exists();
        return $brewer;
    }

    public function brewer_list()
    {
        return Brewer::select('id', 'name')->withCount('beers')->get();
    }

    public function get_current_beer($id)
    {
        return Beer::where('id', '=', $id)->with('brewer')->get()->first();
    }
}