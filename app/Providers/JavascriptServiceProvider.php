<?php namespace App\Providers;


use App\Services\Javascript\JavascriptViewBinder;
use Illuminate\Support\ServiceProvider;
use Laracasts\Utilities\JavaScript\PHPToJavaScriptTransformer;

class JavascriptServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('javascript', function ($app) {
            $view = ['scripts'];
            $namespace = 'gc';

            $binder = new JavascriptViewBinder($app['events'], $view);

            return new PHPToJavaScriptTransformer($binder, $namespace);
        });
    }
}