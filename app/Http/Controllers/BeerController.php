<?php

namespace App\Http\Controllers;

use App\Beer;
use App\Http\Gateways\BeerGateway;
use App\Http\Interfaces\BeerInterface;
use Illuminate\Http\Request;

class BeerController extends Controller
{

    private $beerG, $beerR;


    public function __construct(BeerInterface $beerRepository, BeerGateway $beerGateway)
    {
        $this->beerR = $beerRepository;
        $this->beerG = $beerGateway;
    }


    public function search(Request $request)
    {
        return $this->beerG->search($request);
    }


    public function show($id)
    {
        return $this->beerG->getCurrentBeerJson($id);
    }



}
