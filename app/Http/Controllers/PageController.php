<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
    	return view('page.trangchu');
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