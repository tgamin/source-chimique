<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Card;
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
    
    public function actualite() {
        $cards =Card::all();
        $brands =Brand::all();
        return view('pages.actualite', compact('cards', 'brands'));
    }
    
    public function show($id) {
        $card =Card::find($id);
        return 'test';
    }

}
