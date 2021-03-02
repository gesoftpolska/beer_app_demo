<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 02.03.2021
 * Time: 21:23
 */

namespace App\Http\Interfaces;


interface BeerInterface
{
    public function get_brewers();

    public function get_current_beer($id);

    public function is_brewer_exist($brewername);

    public function search_with_brewers($name = null, $countryCode = null, $brewerId = null, $priceFrom = null, $priceTo = null);

    public function check_is_exist_brewer($brewerName);

    public function store_new_brewer($name);

    public function brewer_list();


}