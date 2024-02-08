<?php

use App\Models\Actualite;
use App\Models\Category;
use App\Models\Page;
use App\Models\Partenaire;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Slide;
use App\Models\Team;
use App\Models\Projet;
use App\Models\Reference;
use App\Models\TimeLine;
use App\Review;
use Illuminate\Support\Facades\Cache;
use TCG\Voyager\Models\Post;

if (!function_exists('getTeam')) {
    function getTeam()
    {
        return Cache::remember('team', (60 * 60 * 24) , function () {
            return Team::orderBy('order')->get();
        });
    }
}

if (!function_exists('getProjects')) {
    function getProjects()
    {
            return Projet::orderBy('order')->get();

    }
}

if (!function_exists('getReferences')) {
    function getReferences()
    {
            return Reference::orderBy('order')->get();

    }
}

if (!function_exists('getPartenaires')) {
    function getPartenaires()
    {
            return Partenaire::orderBy('order')->get();

    }
}

if (!function_exists('getSolution')) {
    function getSolution()
    {
            return Page::Active()->TypeSolution()->orderBy('order')->get();

    }
}

if (!function_exists('getActualites')) {
    function getActualites()
    {
        return Cache::remember('actualites', (60 * 60 * 24) , function () {
            return Actualite::whereHas('categorie', function ($q) {
                $q->whereNot('id', 1);
            })->active()->orderByDesc('created_at')->limit(12)->get();
        });
    }
}


if (!function_exists('getReviewsinActive')) {
    function getReviewsinActive()
    {
        return Cache::remember('reviews_widget', (60 * 60 * 24) , function () {
            return Review::where('status', 'draft')->with('event.tour')->orderByDesc('created_at')->get();
        });
    }
}


if (!function_exists('getConseils')) {
    function getConseils()
    {
        return Cache::remember('conseils', (60 * 60 * 24) , function () {
            return Actualite::whereHas('categorie', function ($q) {
                $q->where('id', 1);
            })->active()->orderByDesc('created_at')->limit(12)->get();
        });
    }
}

if (!function_exists('getSlides')) {
    function getSlides($type = 'home')
    {
        return Slide::active()->where('type', $type)->orderBy('order')->get();
    }
}

// if (!function_exists('getTimeline')) {
//     function getTimeline()
//     {
//         return \App\Models\Timeline::orderBy('date',"ASC")->get();
//     }
// }

if (!function_exists('getActualites')) {
    function getActualites()
    {
        $actualites = \App\Models\Models\Actualite::orderBy('created_at',"DESC")->limit(3)->get();
        if(count($actualites) == 1) {
            for($i = 0; $i < 2; $i++) $actualites->add($actualites->first());
        }
        return $actualites;
    }
}

if (!function_exists('getHomeblocks')) {
    function getHomeblocks()
    {
        return \App\Models\Homeblock::orderBy('order')->get();
    }
}

if (!function_exists('getMarques')) {
    function getMarques()
    {
        return \App\Models\Marque::active()->orderBy('title',"asc")->get();
    }
}

if (!function_exists('getMetiers')) {
    function getMetiers()
    {
        return \App\Models\Page::active()->where('type', 'metiers')->orderBy('order',"asc")->get();
    }
}

if (!function_exists('getPageImages')) {
    function getPageImages($type='')
    {
        return \App\Models\Page::select('cover')->active()->when($type,function($q,$type){
            $q->where('type', $type);
        })->whereNotNull('cover')->inRandomOrder()->get();
    }
}

// if (!function_exists('getReference')) {
//     function getReference($id = null)
//     {
//         return \App\Models\Reference::where('featured', 1)->orderBy('featuredorder')->get();
//         if( request()->has('dev') ){
//         }
//         $references = collect();
//         $categorys = \App\Models\Category::where(function($query) use($id){
//             if($id)
//                 $query->where('id', $id);
//         })->orderBy('order')->get();
//         foreach($categorys as $category) {
//             $refers = $category->references()->orderBy('created_at','DESC')->get();
//             foreach($refers as $refer) {
//                 $references->add($refer);
//             }
//         }
//         return $references;
//     }
// }

if (!function_exists('getPartenaire')) {
    function getPartenaire()
    {
        return \App\Models\Models\Partenaire::orderBy('order',"asc")->get();
    }
}

if (!function_exists('getTemoignages')) {
    function getTemoignages()
    {
        return \App\Models\Temoignage::orderBy('order',"asc")->get();
    }
}


if (!function_exists('getCats')) {
    function getCats()
    {
        return Category::whereNull('parent_id')->get();
    }
}

if (!function_exists('getCparent')) {
    function getCparent(Category $cat,&$collection)
    {
        if (!$collection->where('id', $cat->id)->first()) {
            $collection->add($cat->only([ 'id','name', 'slug', 'parent_id' ]));
        }
        if ($cat->parentId) {
            getCparent($cat->parentId, $collection);
        }
    }
}


if (!function_exists('getImages') ) {
    function getImages($path = '', $thumbnails = [])
    {
        $images = [];
        $files = Storage::disk('public')->allFiles($path);

        foreach ($files as $file) {
            $image = file_info($file, $thumbnails);

            $is_thumbnail = false;

            foreach ($thumbnails as $thumb) {
                if (strpos( $image['name'] , $thumb['name'])) $is_thumbnail = true;
            }

            if (!$is_thumbnail) {
                array_push($images, $image);
            }
        }
        return $images;
    }
}




if (!function_exists('file_info') ) {
    function file_info($file , $thumbnails = [])
    {
        $filePath = pathinfo($file);

        $file = array();
        $file['name'] = $filePath['filename'];
        $file['extension'] = $filePath['extension'];
        $file['url'] = 'storage/'.$filePath['dirname'] . '/' . $filePath['basename'];

        foreach ($thumbnails as $thumbnail) {
            $file[ $thumbnail['name'] ] = 'storage/'.$filePath['dirname'] . '/' . $filePath['filename'].'-'.$thumbnail['name'].'.'.$filePath['extension'];
        }
        return $file;
    }
}

if (!function_exists('isMobileDevice') ) {
    function isMobileDevice() {
        if(isset($_SERVER["HTTP_USER_AGENT"]))
            return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
        else return false;
    }
}

if( !function_exists('similaireAct') ) {
    function similaireAct($id, $type) {
	    return \App\Models\Models\Actualite::where('id', '<>', $id)->where('type', 'LIKE', $type)->orderBy('date')->limit(3)->get();
	}
}

if (!function_exists('getMenu')) {
    function getMenu()
    {
        return \App\Models\Page::Active()->Type()->orderBy('order',"asc")->get();
    }
}


if (!function_exists('getActualite')) {
    function getActualite(int $take)
    {
        return Post::Published()->take($take)->get();
    }
}

if (!function_exists('getAllActualite')) {
    function getAllActualite()
    {
        return Post::Published()->orderBy("created_at")->get();
    }
}

if (!function_exists('getTimeLine')) {
    function getTimeLine()
    {
        return TimeLine::orderBy("created_at")->get();
    }
}


if (!function_exists('getProducts')) {
    function getProducts(int $take)
    {
        return Product::take($take)->get();
    }
}

if (!function_exists('getStaticPages')) {
    function getStaticPages()
    {
        $static_routs = [];
        foreach (Route::getRoutes()->getIterator() as $route_item) {
            if ( Str::contains($route_item->getName(), 'staticpage') ) {
                array_push($static_routs, $route_item);
            }
        }
        return $static_routs;
    }
}

if (!function_exists('getVideoThumbnail') ) {
    function getVideoThumbnail($url = '')
    {
        preg_match(
            "/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/",
            $url, $url_match);
        if (str_contains( $url_match[3], 'youtu')) {
            return "//i3.ytimg.com/vi/".$url_match[6]."/hqdefault.jpg";
        } else if (str_contains( $url_match[3],'vimeo')) {
            $arr_vimeo = unserialize(file_get_contents("https://vimeo.com/api/v2/video/".$url_match[6].".php"));
            // return $arr_vimeo[0]['thumbnail_small']; // returns small thumbnail
            // return $arr_vimeo[0]['thumbnail_medium']; // returns medium thumbnail
            return $arr_vimeo[0]['thumbnail_large']; // returns large thumbnail
        }else {
            return false;
        }
    }
}

if (!function_exists('getVideoURL') ) {
    function getVideoURL($str) {
        $re = '/(?im)\b(?:https?:\/\/)?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)\/(?:(?:\??v=?i?=?\/?)|watch\?vi?=|watch\?.*?&v=|embed\/|)([A-Z0-9_-]{11})\S*(?=\s|$)/';
        preg_match($re, $str, $matches);
        return $matches[1];
    }
}

if(!function_exists('imagery')){
    function imagery( $path, $object = [ ]){
        // $params = [ 'path' => urlencode($path) ];
        $params = [ 'path' => parse_url($path, PHP_URL_PATH) ];
        foreach( $object as $key => $value ) $params[$key] = $value;
        return route('imagery', $params);
    }
}
if(!function_exists('french_format_date')){
    function french_format_date($date){
        return Carbon::parse($date)->translatedFormat('d F Y');
    }
}
if (!function_exists('filterStyleAttributes') ) {
    function filterStyleAttributes($html) {
        // Regular expression pattern to match HTML tags with style attributes
        $pattern = '/<[^>]+style\s*=\s*["\']([^"\']*)["\'][^>]*>/i';

        // Match all HTML tags with style attributes in the HTML
        preg_match_all($pattern, $html, $matches);

        // Loop through each matched HTML tag
        foreach ($matches[0] as $tagWithStyle) {
            // Extract the style attribute value
            preg_match('/style\s*=\s*["\']([^"\']*)["\']/i', $tagWithStyle, $styleAttribute);

            // If there is a style attribute, process it
            if (!empty($styleAttribute[1])) {
                // Replace the style attributes except for color and text-align
                $filteredStyle = preg_replace_callback('/(?<=;|^)\s*([^:;]+)\s*:\s*([^;]+)\s*;/', function ($matches) {
                    $property = strtolower(trim($matches[1]));
                    if ($property === 'color' || $property === 'text-align') {
                        return $matches[0];
                    }
                    return '';
                }, $styleAttribute[1]);

                // Replace the original style attribute with the filtered style
                $html = str_replace($styleAttribute[1], $filteredStyle, $html);
            }
        }

        return $html;
    }
}
