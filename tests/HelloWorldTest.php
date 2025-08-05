<?php

use Amiiiiink\HelloWorld\HelloWorld;

it('says hello correctly', function () {
    $hello = new HelloWorld();

    config(['helloworld.greeting' => 'Hi']);

    expect($hello->sayHello('Amin'))->toBe('Hi, Amin! 👋');
});
