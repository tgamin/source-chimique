<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    
    use Translatable, Resizable , HasFactory;

    protected $translatable = ['title', 'title_block', 'content', 'slug', 'seo_title', 'seo_description'];
    // protected $translatable = [];
    protected $fillable = ['title', 'content', 'slug','activite_image' ];
    
    protected $dates = ['deleted_at'];
    const STATUS_PUBLISHED = 'PUBLISHED';
    const STATUS_DRAFT = 'DRAFT';
    const TYPE_PAGE = 'page';
    const TYPE_SOLUTION = 'solution';
    const TYPE_Produit = 'produit';

    protected $appends = [ 'gallery' ];

    public function scopeActive($query)
    {
        return $query->where('status', static::STATUS_PUBLISHED);
    }

    public function scopeType($query)
    {
        return $query->where('type', static::TYPE_PAGE)->orderBy('order');
    }

    public function scopeTypeSolution($query)
    {
        return $query->where('type', static::TYPE_SOLUTION)->orderBy('order');
    }
    public function scopeTypeProduct($query)
    {
        return $query->where('type', static::TYPE_Produit)->orderBy('order');
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'page_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'parent_id', 'id');
    }

    public function parentPage()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(self::class, 'parent_id','id');
    }

    public function getGalleryAttribute()
    {
        return getImages( config('voyager.pages.path').$this->id , config('voyager.pages.thumbnails', []) );
    }
}
