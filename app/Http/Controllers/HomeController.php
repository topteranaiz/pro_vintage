<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeProduct;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(TypeProduct $typeproduct)
    {

        if ($this->user->type_personal_id == 1) {

            $this->data['dataTypeProduct'] = $typeproduct->where('created_by', $this->user->id)->get();
            return view('manage.typeproduct.index', $this->data);
        }else {

            return view('manage.order.index');
        }

    }
}
