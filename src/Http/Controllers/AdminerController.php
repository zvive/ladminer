<?php

namespace Ladminer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminerController extends Controller
{
    protected $adminer;

    protected $allowAdminer = false;

    public function __construct()
    {
        if (\Route::hasMiddlewareGroup('adminer')) {
            $this->middleware('adminer');
        }
        $this->adminer         = __DIR__.'/../resources/adminer.php';
    }

    public function index()
    {
        if (file_exists($this->adminer)) {
            $this->allowAdminer = true;
            require($this->adminer);
        } else {
            return view('adminer::not_found');
        }
    }
}
