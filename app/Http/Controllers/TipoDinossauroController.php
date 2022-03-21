<?php

namespace App\Http\Controllers;

use App\Models\TipoDinossauro;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class TipoDinossauroController extends Controller
{
    public function index()
    {
        $tipos = TipoDinossauro::all();
        return view('tipo.index', [
            'tipos' => $tipos
        ]);
    }
}
