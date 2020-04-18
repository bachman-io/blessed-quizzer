<?php

namespace App\Http\Controllers;

use App\Services\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new QuestionService();
    }

    public function create(Request $request)
    {
        $this->service->createNew($request);
        return redirect()->to('/questions');
    }
}
