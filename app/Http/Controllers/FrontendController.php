<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeProduct;
use App\Models\Comment;
use App\Models\Product;
use Carbon\Carbon;

class FrontendController extends Controller
{

    //หน้า list รายการ
    public function index(TypeProduct $typeProduct) {

        $product = new Product;
        $inputs = request()->input();

        //ค้นหาชื่อเสื้อวง
        if (isset($inputs['name'])) {
            $product = $product->where('name','LIKE','%' . trim($inputs['name']) . '%');
        }
        //ค้นหาประเภทเสื้อวง
        if (isset($inputs['type_product_id'])) {
            $product = $product->where('type_product_id',$inputs['type_product_id']);
        }
        //ค้นหา size
        if (isset($inputs['size'])) {
            $product = $product->where('size',$inputs['size']);
        }
        //ค้นหาราคาเสื้อวง
        if (isset($inputs['price'])) {
            $product = $product->where('price',$inputs['price']);
        }
        //ค้นหาประเภทเนื้อผ้า
        if (isset($inputs['fabric_type'])) {
            $product = $product->where('fabric_type',$inputs['fabric_type']);
        }

        $this->data['products'] = $product->get();
        $this->data['typeProducts'] = $typeProduct->get();

        return view('frontend.index', $this->data);

    }

    //หน้ารายละเอียด
    public function detail($id, Product $product, TypeProduct $typeProduct, Comment $comment) {

        $this->data['detail'] = $product->find($id);
        $this->data['typeProducts'] = $typeProduct->get();
        $this->data['dataComment'] = $comment->where('product_id', $id)->get();

        return view('frontend.detail', $this->data);
    }

    //หน้านิยาม
    public function getDefine() {

        return view('frontend.define');
    }

    //หน้าป้ายเสื้อ
    public function getShirtLabel() {

        return view('frontend.shirt_label');
    }

    //สำหรับการพิมพ์คอมเม้น
    public function storeComment(Request $req, Comment $comment) {

        $inputs = $req->all();
        $idDetail = $req->product_id;
        $inputs['created_at'] = Carbon::now();
        $comment->create($inputs);

        return redirect()->route('front.detail', [$idDetail]);

    }
}
