<?php

use Amiiiiink\HelloWorld\Facades\HelloWorld;

$reflection = new ReflectionClass(HelloWorld::getFacadeRoot());

foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
    $name = $method->getName();

    // از ساخت فانکشن‌هایی که قبلاً وجود دارن جلوگیری کن
    if (! function_exists($name)) {
        eval('
            function ' . $name . '(...$args) {
                return \Amiiiiink\HelloWorld\Facades\HelloWorld::' . $name . '(...$args);
            }
        ');
    }
}
