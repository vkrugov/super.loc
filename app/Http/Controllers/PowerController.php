<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Power;

class PowerController extends Controller
{
    /**
     * @return Power[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getPowers()
    {
        return Power::getPowers();
    }
}
