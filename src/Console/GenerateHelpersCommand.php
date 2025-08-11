<?php

namespace Amiiiiink\HelloWorld\Console;

use Illuminate\Console\Command;
use ReflectionClass;
use ReflectionMethod;

class GenerateHelpersCommand extends Command
{
    protected $signature = 'package:generate-helpers';
    protected $description = 'Generate helper stubs for IDE autocompletion from the Facade methods.';

    public function handle(): int
    {
        $facadeClass = \Amiiiiink\HelloWorld\Facades\HelloWorld::class;
        $rootClass   = $facadeClass::getFacadeRoot();
        $reflection  = new ReflectionClass($rootClass);

        $output = "<?php\n\nuse {$facadeClass};\n\n";

        foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->isConstructor() || $method->isStatic()) {
                continue;
            }

            $params = [];
            $args   = [];

            foreach ($method->getParameters() as $param) {
                $paramStr = '';
                if ($param->hasType()) {
                    $paramStr .= $param->getType() . ' ';
                }
                $paramStr .= '$' . $param->getName();

                if ($param->isDefaultValueAvailable()) {
                    $paramStr .= ' = ' . var_export($param->getDefaultValue(), true);
                }

                $params[] = $paramStr;
                $args[]   = '$' . $param->getName();
            }

            $paramsStr = implode(', ', $params);
            $argsStr   = implode(', ', $args);

            $output .= <<<PHP
if (! function_exists('{$method->getName()}')) {
    /**
     * @see {$facadeClass}::{$method->getName()}()
     */
    function {$method->getName()}({$paramsStr}) {
        return {$facadeClass}::{$method->getName()}({$argsStr});
    }
}

PHP;
        }

        $stubPath = __DIR__ . '/../helpers_stub.php';
        file_put_contents($stubPath, $output);

        $this->info("Helper stubs generated at: {$stubPath}");

        return self::SUCCESS;
    }
}
