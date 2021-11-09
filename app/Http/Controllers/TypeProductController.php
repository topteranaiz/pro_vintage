<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class TypeProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    // public function index(TypeMusic $typeMusic)
    // {
    //     $this->data['dataTypeMusics'] = $typeMusic->get();

    //     return view('manage.typemusic.index', $this->data);
    // }

    public function create() {

        return view('manage.typeproduct.form');

    }

    public function store(Request $req, TypeProduct $typeProduct) {

        $inputs = $req->only('name');
        $inputs['created_at'] = Carbon::now();
        $inputs['created_by'] = $this->user->id;

        $typeProduct->create($inputs);

        return redirect('/home');
    }





    public function edit($id, TypeProduct $typeProduct) {

        // dd($id);
        // $find = $typeProduct->find($id);

        // dd($find);
        // $where = $typeProduct->where('id', $id)->first();

        $this->data['edit'] = $typeProduct->find($id);

        return view('manage.typeproduct.form', $this->data);
    }

    public function update(Request $req, TypeProduct $typeProduct) {

        // dd($req->all());

        $inputs = $req->only('name');
        $id = $req->id;

        $data = $typeProduct->find($id);

        $data->update($inputs);

        return redirect('/home');
    }

    public function delete($id, TypeProduct $typeProduct) {

        $data = $typeProduct->find($id);
        $data->delete();

        return redirect('/home');
    }
}
