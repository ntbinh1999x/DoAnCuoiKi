@extends('master')
@section('content')
	<tr>Danh Sách Sản Phẩm</tr>
					@if(Session::has('thongbao'))
						<div class="alert alert-success">{{Session::get('thongbao')}}</div>
					@endif
	<table style="width:100%">
					<tr>
						<th>ID</th>
						<th>Tên</th>
						<th>loại ID</th> 
						<th>giá</th>
						<th>giá khuyến mãi</th>
						<th class="center"><i class="fa fa-trash-o fa-fw"></i><a href="#">Xóa</a></th>
						<th class="center"><i class="fa fa-pencil fa-fw"></i><a href="#">Sửa</a></th>
					</tr>
					@foreach($danhsach as $ds)
					  <tr>
						<td>{{$ds->id}}</td>
						<td>{{$ds->name}}</td>
						<td>{{$ds->id_type}}</td>
						<td>{{$ds->unit_price}}</td>
						<td>{{$ds->promotion_price}}</td>
						<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{{route('xoasanpham',$ds->id)}}">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{{route('suasanpham',$ds->id)}}">Exit</a></td>
					  </tr>
					  @endforeach
				</table>
@endsection