<?php

namespace App\Facades;

use App\Models\News;
use DOMDocument;

class BuildSitemapFacade
{
    public function build(): void
    {
        $xmlString = '<?xml version="1.0" encoding="UTF-8"?>';
        $xmlString .= '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 
         http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
         xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // news list
        $xmlString .= '<url>';
        $xmlString .= '<loc>' . URL_ROOT . '</loc>';
        $xmlString .= '<lastmod>' . date(DATE_ATOM, time()) . '</lastmod>';
        $xmlString .= '<changefreq>daily</changefreq>';
        $xmlString .= '<priority>1.0</priority>';
        $xmlString .= '</url>';

        // news detail
        $newsList = (new News())->list();
        foreach ($newsList as $item) {
            $xmlString .= '<url>';
            $xmlString .= '<loc>' . URL_ROOT . 'news/' . htmlentities($item->getId()) . '/</loc>';
            $xmlString .= '<lastmod>' . date(DATE_ATOM, time()) . '</lastmod>';
            $xmlString .= '<changefreq>daily</changefreq>';
            $xmlString .= '<priority>1.0</priority>';
            $xmlString .= '</url>';
        }

        $xmlString .= '</urlset>';

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        $dom->loadXML($xmlString);

        $dom->save('../public/sitemap.xml');
    }
}
