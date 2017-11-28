<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

// TODO 判断当前的环境 加载相对就的环境配置文件
$env = $app->detectEnvironment(function(){
    $environmentPath = __DIR__.'/../';

    if (file_exists($environmentPath)){
        $doc = new Dotenv\Dotenv($environmentPath);
        $doc->load(); // 加载.env环境配置文件 用于获取当前配置的环境值

        $en_val = getenv('APP_ENV');

        if ($en_val && file_exists(__DIR__.'/../.env.' . getenv('APP_ENV'))) {
            $doc = new Dotenv\Dotenv(__DIR__ . '/../', '.env.' . getenv('APP_ENV'));
            $doc->overload(); // 覆盖式加载对应的环境配置文件
        }
    }

    return $en_val;
});

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
