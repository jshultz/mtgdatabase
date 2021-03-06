<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Deck extends Eloquent {

    public function __construct() {

    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'decks';

    public static $rules = array(
        'deckName'=>'required|min:2'
    );

    public function cards()
    {
        return $this->belongsToMany('Singlecard', 'deck_singlecard','deck_id', 'singlecard_id');
    }

    public function attributes()
    {
        return $this->hasManyThrough('Attribute', 'Singlecard', 'singlecard_id', 'attribute_id');
    }

}