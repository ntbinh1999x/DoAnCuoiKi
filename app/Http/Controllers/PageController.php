<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill; // su dung hoa don
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use resources\admin;
use resources\page;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
    	//return view('page.trangchu',['slide'=>$slide]);
        $new_product=Product::where('new',1)->paginate(4, ['*'], 'pag');
        # them dong nay de khong bi trung link page voi san pham khuyen mai
        #$new_product = Product::where('new',1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
	public function getLoaiSP($type){
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id', $type)->first();
    	return view('page.loai_sanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }
	public function getChitiet(Request $req){
        $sanpham = Product::where('id', $req->id)->first();
        $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(6);
    	return view('page.chitiet_sanpham', compact('sanpham', 'sp_tuongtu'));
    }
	public function getLienHe(){
    	return view('page.lienhe');
    }

    public function getGioiThieu(){
    	return view('page.gioithieu');
    }
     public function getAddtoCart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->Session()->put('cart', $cart);
        return redirect()->back();
     }

     public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
          }
        else{
            Session::forget('cart');
        }  
    
        return redirect()->back();
    }

    public function getCheckout(){
        return view('page.dat_hang');
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

//
    }
      public function getdanhsach()
    {
        $danhsach = Product::all();
        return view('admin.danhsach',['danhsach'=>$danhsach]);
    }
    public function getthem()
    {
        return view('admin.them');
    }
    public function postthem(Request $request)
    {
        
        $danhsach = new Product;
        $danhsach->name = $request->name;
        $danhsach->id_type = $request->id_type;
        $danhsach->unit_price = $request->unit_price;
        $danhsach->promotion_price = $request->promotion_price;
       
        $id_type = $request->id_type;
        if($id_type < 1 || $id_type > 7)
        {
            return redirect('admin/them')->with('thongbao','Loai ID chi thoa tu 1 den 7');
        }
        $danhsach->save();
        return redirect('admin/them')->with('thongbao','Thêm thành công');
    }
    public function getsua($id)
    {
        $danhsach = Product::find($id);
        return view('admin.sua',['danhsach'=>$danhsach]);
    }
    public function postsua(Request $request,$id)
    {
        $danhsach = Product::find($id);
        $danhsach->name = $request->name;
        $danhsach->id_type = $request->id_type;
        $danhsach->unit_price = $request->unit_price;
        $danhsach->promotion_price = $request->promotion_price;
        $danhsach->save();
        return redirect('admin/sua/'.$id)->with('thongbao','Sửa Thành Công');
    }
    public function getxoa($id)
    {
        $danhsach = Product::find($id);
        $danhsach->delete();
        return redirect('admin/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
    public function getsearch(Request $req)
    {
        $product = Product::where('name','like','%'.$req->key.'%')
                            ->orWhere('unit_price',$req->key)   
                            ->get();
        return view('page.search',compact('product'));
    }
}