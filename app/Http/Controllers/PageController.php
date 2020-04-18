<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Services\DiscordService;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Home';
        $discord = new DiscordService();

        if ($discord->isLoggedIn($request)) {
            $data = $discord->fetchData($request, $data);
            $data['categories'] = Category::all();
            return view('home', $data);
        }

        return view('welcome', $data);
    }

    public function category(Request $request, $slug)
    {
        $data['category'] = Category::with(['questions' => function($query) {
            $query->orderBy('last_used', 'asc')->limit(1);
        }])->where('slug', $slug)->first();
        $data['title'] = 'Category: ' . $data['category']->name;
        $discord = new DiscordService();

        if ($discord->isLoggedIn($request)) {
            foreach ($data['category']->questions as $question) {
                $question->last_used = now();
                $question->save();
            }
            $data = $discord->fetchData($request, $data);
            return view('category', $data);
        }

        return redirect()->to('/');
    }

    public function contribute(Request $request)
    {
        $data['title'] = 'Contribute';
        $discord = new DiscordService();

        if ($discord->isLoggedIn($request)) {
            $data = $discord->fetchData($request, $data);
            $data['categories'] = Category::all();
            return view('contribute', $data);
        }

        return redirect()->to('/');
    }

    public function yourQuestions(Request $request)
    {
        $data['title'] = 'Your Questions';
        $discord = new DiscordService();

        if ($discord->isLoggedIn($request)) {
            $data = $discord->fetchData($request, $data);
            return view('questions', $data);
        }

        return redirect()->to('/');
    }
}
