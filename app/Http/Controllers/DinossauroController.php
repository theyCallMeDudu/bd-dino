<?php

namespace App\Http\Controllers;

use App\Models\Dinossauro;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DinossauroController extends Controller
{
    public function index()
    {
        $dinossauros = Dinossauro::all();
        return view('dinossauro.index', [
            'dinossauros' => $dinossauros
        ]);
    }
}
