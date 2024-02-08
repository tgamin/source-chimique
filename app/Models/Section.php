<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Section extends Model
{

    use Translatable , Resizable;

    protected $translatable = [
        "title",
        "subtitle",
        "content",
    ];
    protected $fillable = [
        "title",
        "subtitle",
        "content",
        "type",
        "order",
        "page_id"
    ];
    const STATUS_PUBLISHED = 'PUBLISHED';

    public function scopeActive($query)
    {
        return $query->where('status', static::STATUS_PUBLISHED);
    }

    /**
     * Get the page that owns the Section
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }
}
