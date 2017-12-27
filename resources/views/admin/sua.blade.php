@extends('master')
@section('content')
	<form action="admin/sua/{{$danhsach->id}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(Session::has('thongbao'))
						<div class="alert alert-success">{{Session::get('thongbao')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Sửa Sản Phẩm</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="your_last_name">Tên sản phẩm</label>
							<input type="text" name="name" required value="{{$danhsach->name}}">
						</div>
						<div class="form-block">
							<label for="your_last_name">Loại ID</label>
							<input type="text" name="id_type" required value="{{$danhsach->id_type}}">
						</div>
						<div class="form-block">
							<label for="your_last_name">Giá</label>
							<input type="text" name="unit_price" required value="{{$danhsach->unit_price}}">
						</div>
						<div class="form-block">
							<label for="your_last_name">Giá khuyến mãi</label>
							<input type="text" name="promotion_price" required value="{{$danhsach->promotion_price}}">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Sửa</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
@endsection