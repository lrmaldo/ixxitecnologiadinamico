<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            url('/'),
            route('blog.index'),
        ];
        $urls = array_merge($urls, Post::published()->pluck('slug')->map(fn($s) => route('blog.show', $s))->all());
        $xml = view('sitemap.xml', compact('urls'))->render();
        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
