<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ResponsavelService;


class ResponsavelController extends Controller
{

    private $responsavelService;
    public function __construct(ResponsavelService $responsavelService)
    {
        $this->responsavelService = $responsavelService;
    }

    public function index(){
        return $this->responsavelService->listarResponsavel();
    }

    public function store(Request $request){
        return $this->responsavelService->cadastrarResponsavel($request);
    }


    
}