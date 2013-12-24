<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 11/30/13
 * Time: 11:16 AM
 */

class SingleController extends BaseController {

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    protected $layout = 'layouts.master';

    public function postCreate() {
        $validator = Validator::make(Input::all(), Singlecard::$rules);

        if ($validator->passes()) {
            // validation has passed, save user in DB

            $card = new Singlecard;
            $card->card_id = Input::get('card_id');
            $card->user_id = Auth::user()->id;
            $card->condition_id = Input::get('condition_id');
            $card->save();

            $id = $card->id;

        if (Input::get('deck_id') != '') {

            $set = new DeckCard;
            $set->singlecard_id = $id;
            $set->deck_id = Input::get('deck_id');
            $set->save();

            $userid = Auth::user()->id;

            $deckid = Input::get('deck_id');

            return Redirect::back()->with(array('deckid' => $deckid, 'userid' => $userid, 'message' => 'New card added.'));

//            return Redirect::to('/users/decks')->with(array('deckid' => $deckid, 'userid' => $userid, 'message' => 'New card added.'));


        }

            return Redirect::back()->with('message', 'New card added.');
        } else {
            // validation has failed, display error messages
            return Redirect::back()->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
        }
    }

}