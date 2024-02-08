<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;

class ProposController extends Controller
{
    public function index() {

        $heros = Carousel::all();
        return view('pages.apropos', compact('heros'));
    }

    public function mot() {

        $heros = Carousel::all();
        return view('pages.mot', compact('heros'));
    }
}
