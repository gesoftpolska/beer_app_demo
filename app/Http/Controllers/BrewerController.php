<?php

namespace App\Http\Controllers;

use App\Brewer;
use App\Http\Gateways\BeerGateway;
use App\Http\Interfaces\BeerInterface;
use Illuminate\Http\Request;

class BrewerController extends Controller
{

    private $beerG, $beerR;

    public function __construct(BeerInterface $beerRepository, BeerGateway $beerGateway)
    {
        $this->beerR = $beerRepository;
        $this->beerG = $beerGateway;
    }

    public function index()
    {
        return $this->beerG->getBrewersJson();
    }


    public function store(Request $request)
    {
        return $this->beerG->createBrewer($request);
    }


}
