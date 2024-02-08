<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Card;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class CMSController extends Controller
{

    // public function index()
    // {
    //     $pages = Page::active()->orderBy('order',"asc")->get();
    //     return view('frontend.cms.index', compact('pages'));
    // }

    public function index($slug)
    {
        // $filter = $child_slug == null  ? $slug : $child_slug ;
        // $page = Page::active()->whereTranslation('slug',$filter)->firstOrFail();
        
        $page = Page::active()->whereTranslation('slug',$slug)->firstOrFail();
        $brands = Brand::all();
        $cards = Card::all();

        return view('frontend.cms.index', compact('page', 'brands', 'cards'));
    }

}
