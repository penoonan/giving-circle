<?php namespace App\Services\Javascript;

use Illuminate\Contracts\Events\Dispatcher as EventDispatcher;
use Laracasts\Utilities\JavaScript\ViewBinder;


/**
 * Created by PhpStorm.
 * User: patricknoonan
 * Date: 11/15/15
 * Time: 12:31 PM
 */
class JavascriptViewBinder implements ViewBinder
{

    /**
     * @var EventDispatcher
     */
    protected $event;

    /**
     * @var array
     */
    protected $views;

    /**
     * JavascriptViewBinder constructor.
     * @param EventDispatcher $event
     * @param array $views
     */
    public function __construct(EventDispatcher $event, array $views)
    {
        $this->event = $event;
        $this->views = str_replace('/', '.', (array)$views);
    }

    public function bind($js)
    {
        foreach ($this->views as $view) {
            $this->event->listen("composing: {$view}", function () use ($js) {
                echo "<script>{$js}</script>";
            });
        }
    }
}