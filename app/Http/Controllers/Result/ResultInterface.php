<?php

namespace App\Http\Controllers\Result;

interface ResultInterface {

    public function getItems($search, $priceLowest, $priceHighest, $category);

}