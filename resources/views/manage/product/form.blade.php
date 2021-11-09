@extends('template.master')
@section('content')
<section class="user-profile section">
	<div class="container">
		<div class="row">
			@include('template.partials.manage.sidebar')
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<div class="row">
					<div class="col-lg-12 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">เพิ่มประเภทสินค้า</h3>
							<form method="POST" action="{{ isset($edit) ? route('product.update'): route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                @if(isset($edit))
                                    <input type="hidden" name="id" value="{{$edit->id}}">
                                @endif
								<div class="form-group">
									<label for="first-name">ประเภทสินค้า</label>
									<select name="type_product_id" class="w-100">
                                        <option value="">กรุณาเลือก</option>
                                        @foreach ($dataTypeProducts as $item)
                                        <option {{ isset($edit) && $edit->type_product_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
								</div>
                                <div class="form-group">
									<label for="first-name">ชนิดผ้า</label>
									<select name="fabric_type" class="w-100">
                                        <option value="">กรุณาเลือก</option>
                                        <option {{ ( isset($edit) && $edit->fabric_type == 1 ? 'selected' : '')  }} value="1">ผ้า Cotton 100%</option>
                                        <option {{ ( isset($edit) && $edit->fabric_type == 2 ? 'selected' : '')  }} value="2">ผ้า Cotton 50% Polyester 50%</option>
                                    </select>
								</div>
                                <div class="form-group">
									<label for="first-name">ชื่อสินค้า</label>
									<input type="text" class="form-control" name="name" value="{{ isset($edit) ? $edit->name: "" }}">
								</div>
								<div class="form-group">
									<label for="first-name">รายละเอียดสินค้า</label>
									<input type="text" class="form-control" name="detail" value="{{ isset($edit) ? $edit->detail: "" }}">
								</div>
                                <div class="form-group">
									<label for="first-name">ขนาด</label>
									<select name="size" class="w-100">
                                        <option value="">กรุณาเลือก</option>
                                        <option {{ ( isset($edit) && $edit->size == 1 ? 'selected' : '')  }} value="1">S</option>
                                        <option {{ ( isset($edit) && $edit->size == 2 ? 'selected' : '')  }} value="2">M</option>
                                        <option {{ ( isset($edit) && $edit->size == 3 ? 'selected' : '')  }} value="3">L</option>
                                        <option {{ ( isset($edit) && $edit->size == 4 ? 'selected' : '')  }} value="4">XL</option>
                                    </select>
								</div>
                                <div class="form-group">
									<label for="first-name">จำนวน</label>
									<input type="text" class="form-control" name="amount" value="{{ isset($edit) ? $edit->amount: "" }}">
								</div>
                                <div class="form-group">
									<label for="first-name">ราคา</label>
									<input type="text" class="form-control" name="price" value="{{ isset($edit) ? $edit->price: "" }}">
								</div>

                                <div id="dynamicfile">
									<div class="form-group">
										<label for="first-name">รูปภาพ</label>
										<input type="file" class="form-control" multiple name="image[]" value="">
									</div>
								</div>

								@if(isset($edit) && $edit->getProductAttachment->count() > 0)
									@foreach ($edit->getProductAttachment as $key => $item)
										<div class="form-group">
											<label for="first-name">รูปภาพ{{$key+1}}</label>
											<img src="{{ asset($item->path) }}" alt="" width="100%">
											<div class="">
												<a href="{{ route('product.deleteImage',[$item->id]) }}" type="button" class="btn btn-danger d-block mt-2">ลบรูปภาพ</a>
											</div>
										</div>
									@endforeach
								@endif

								<hr>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <a href="/product" type="button" class="btn btn-danger d-block mt-2">Cancel</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary d-block mt-2">Submit</button>
                                    </div>
                                </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

