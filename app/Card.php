<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use Translatable;
    protected $translatable = ['card_title', 'card_description', 'card_creator'];
    
}
