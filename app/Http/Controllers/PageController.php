<?php

namespace App\Http\Controllers;
use App\Slide;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
    	//return view('page.trangchu',['slide'=>$slide]);
        return view('page.trangchu',compact('slide'));
    }
	public function getLoaiSP(){
    	return view('page.loai_sanpham');
    }
	public function getChitiet(){
    	return view('page.chitiet_sanpham');
    }
	public function getLienHe(){
    	return view('page.lienhe');
    }

    public function getGioiThieu(){
    	return view('page.gioithieu');
    }
}