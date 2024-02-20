<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Card;
use App\Models\Page;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function oni() {
        $cards = Card::all();
        $brands = Brand::all();
        return view('marques.oni', compact('page', 'cards', 'brands'));
    }

    public function hance() {
        $cards = Card::all();
        $brands = Brand::all();
        return view('marques.hance', compact('cards', 'brands'));
    }
    
    public function drem() {
        $cards = Card::all();
        $brands = Brand::all();
        return view('marques.drem', compact('cards', 'brands'));
    }
    
    public function lelas() {
        $cards = Card::all();
        $brands = Brand::all();
        return view('marques.lelas', compact('cards', 'brands'));
    }
}
