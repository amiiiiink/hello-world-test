<?php

namespace Amiiiiink\HelloWorld;

class HelloWorld
{
    public function sayHello(string $name): string
    {
        $greeting = config('helloworld.greeting', 'Hello');
        return "$greeting, $name! 👋";
    }
}
