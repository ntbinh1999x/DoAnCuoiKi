@extends('master')
@section('content')
<div class="container">
	<form action="/admin/them" method="post" class="beta-form-checkout">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6">
					@if(Session::has('thongbao'))
						<div class="alert alert-success">{{Session::get('thongbao')}}</div>
					@endif
					<h4>Thêm Sản Phẩm</h4>
					<div class="space20">&nbsp;</div>
					<div class="form-block">
						<label for="your_last_name">tên sản phẩm</label>
						<input type="text" name="name" required>
					</div>
					<div class="form-block">
						<label for="your_last_name">loại ID</label>
						<input type="text" name="id_type" required>
					</div>
					<div class="form-block">
						<label for="your_last_name">giá</label>
						<input type="text" name="unit_price" required>
					</div>
					<div class="form-block">
						<label for="your_last_name">giá khuyến mãi</label>
						<input type="text" name="promotion_price" required>
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Thêm</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
	</form>
</div>
@endsection