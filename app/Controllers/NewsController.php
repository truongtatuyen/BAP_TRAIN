<?php
namespace App\Controllers;

use App\Models\News;
use Symfony\Component\Routing\RouteCollection;

class NewsController
{
    /**
     * @param RouteCollection $routes
     * @return void
     */
    public function index(RouteCollection $routes): void
    {
        $newsList = new News();
        $newsList = $newsList->list();

        require_once APP_ROOT . '/views/list.php';
    }

    /**
     * @param int $id
     * @param RouteCollection $routes
     * @return void
     */
    public function show(int $id, RouteCollection $routes): void
    {
        $news = new News();
        $news->read($id);
        $routeToHome = $routes->get('news_list')->getPath();

        require_once APP_ROOT . '/views/detail.php';
    }
}
