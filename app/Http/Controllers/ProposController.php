<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Card;
use App\Carousel;
use App\Models\Page;
use Illuminate\Http\Request;

class ProposController extends Controller
{
    public function index() {
        $slug = 'qui_sommes_nous';

        $page = Page::where('slug', $slug)->firstOrFail();
        $heros = Carousel::all();
        return view('pages.apropos', compact('heros','page'));
    }

    public function mot() {
        $slug = 'mot_du_president';
        
        $page = Page::where('slug', $slug)->firstOrFail();
        $heros = Carousel::all();
        return view('pages.mot', compact('heros','page'));
    }
    
    public function actualite() {
        $slug = 'actualites';
        
        $page = Page::where('slug', $slug)->firstOrFail();
        $cards =Card::all();
        $brands =Brand::all();
        return view('pages.actualite', compact('cards', 'brands','page'));
    }
    
    public function show($id) {
        $slug = 'article';
        $article =Card::find($id);
        $cards =Card::all();
        $page = Page::where('slug', $slug)->firstOrFail();
        $brands =Brand::all();

        return view('pages.detail-actualite', compact('article', 'cards', 'page', 'brands'));
    }

}
