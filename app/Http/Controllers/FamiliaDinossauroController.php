<?php

namespace App\Http\Controllers;

use App\Models\FamiliaDinossauro;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FamiliaDinossauroController extends Controller
{
    public function index()
    {
        $familias = FamiliaDinossauro::all();
        return view('familia.index', [
            'familias' => $familias
        ]);
    }
}
