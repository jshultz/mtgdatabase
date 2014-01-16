@extends('layouts.master')

@section('sidebar')
@parent

<p>Here's some radical sidebar content</p>

@stop

@section('content')

<div class="row">
    <div class="large-12 columns">
        <h1>Dashboard</h1>

        <p>Welcome to your Dashboard. You rock!</p>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <p>Add Cards to Deck</p>
        {{ Form::text( 'search', '', array( 'id' => 'search', 'class' => 'search-query span2', 'placeholder' => 'Search Database' ) ) }}
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <?php if ($authorized == true) {
            ?>
            <div id="addCard" class="">

            </div>
        <?php } ?>
        <div id="results"></div>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        <h3>Your Decks</h3>

        <?php if (isset($decks)) { ?>

            <?php foreach ($decks as $deck) { ?>
                <div class="row">
                    <div class="large-12 columns">
                        <p><a href="/decks/<?php echo $deck->id; ?>"><?php echo $deck->name; ?></a> </p>
                    </div>
                </div>
            <?php } ?>

        <?php } ?>
        <div class="row">
            <div class="large-12 columns">
                <a href="/users/decks">Manage Decks</a>
            </div>
        </div>
    </div>
    <div class="large-8 columns">
        <div class="row">
            <div class="large-12 columns">
                <h3>Your Cards</h3>
            </div>
        </div>
        <div id="cardsList" class="ul1">
            <?php if (isset($cards) && $cards != 0) { ?>
                @foreach ($cards as $single)

                <div class="row singlecard"><a class="" href="{{ $single->id }}">
                        <div class="large-2 columns">
                            <img src="{{ $single->info->card_image }}">
                        </div>

                        <div class="large-10 columns">

                            <div class="row">
                                <div class="large-12 columns"><p>{{ $single->info->name }}</p></div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns attributes">
                                    <p>
                                        @foreach ($single->attributes as $attribute)
                                            {{ $attribute->alias }}
                                        @endforeach
                                    </p>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>



                @endforeach

            <?php } ?>
        </div>
    </div>

</div>

@stop