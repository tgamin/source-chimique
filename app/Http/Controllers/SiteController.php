<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Card;
use App\Carousel;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $heros = Carousel::all();
        $page = Page::firstOrFail();
        $sections = Section::all();
        $cards = Card::all();
        $brands = Brand::all();
        return view('pages.index', compact('heros', 'page', 'cards', 'brands'));
    }
}
