@extends('template.master')
@section('content')
<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="advance-search">
					<form action="{{ route('front.main') }}" method="GET">
						<div class="form-row">
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control my-2 my-lg-1" name="name" {{ request()->input('name') ? request()->input('name') : null }} id="inputtext4" placeholder="ค้นหาชื่อเสื้อวินเทจ">
                            </div>
                            <div class="form-group col-md-3">
                                <select class="w-100 form-control mt-lg-1 mt-md-2" name="type_product_id">
                                    <option value="">ค้นหาประเภทเสื้อ</option>
                                    @foreach ($typeProducts as $item)
                                        <option {{ request()->input('type_product_id') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <select class="w-100 form-control mt-lg-1 mt-md-2" name="size">
                                    <option value="">ค้นหาประเภทเสื้อ</option>
                                    <option {{ request()->input('size') == "1" ? 'selected' : '' }} value="1">S</option>
									<option {{ request()->input('size') == "2" ? 'selected' : '' }} value="2">M</option>
									<option {{ request()->input('size') == "3" ? 'selected' : '' }} value="3">L</option>
									<option {{ request()->input('size') == "4" ? 'selected' : '' }} value="4">XL</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 align-self-center">
                                <button type="submit" class="btn btn-primary">Search Now</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control my-2 my-lg-1" {{ request()->input('price') ? request()->input('price') : null }} id="inputtext4" name="price" placeholder="ค้นหาราคาเสื้อวง">
                            </div>
                            <div class="form-group col-md-5">
                                <select class="w-100 form-control mt-lg-1 mt-md-2" name="fabric_type">
                                    <option value="">ค้นหาชนิดผ้า</option>
                                    <option {{ request()->input('fabric_type') == "1" ? 'selected' : '' }} value="1">ผ้า Cotton 100%</option>
									<option {{ request()->input('fabric_type') == "2" ? 'selected' : '' }} value="2">ผ้า Cotton 50% Polyester 50%</option>
                                </select>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title">{{ $detail->name }}</h1>

					<div class="product-slider">
                        @foreach ($detail->getProductAttachment as $key => $item)
                            @if($key == 0)
                                <div class="product-slider-item my-4" width="200" height="600" data-image="{{ asset($item->path) }}">
                                    <img class="w-100" width="200" height="600" src="{{ asset($item->path) }}" alt="product-img">
                                </div>
                            @else
                                <div class="product-slider-item my-4" width="200" height="600" data-image="{{ asset($item->path) }}">
                                    <img class="d-block w-100" width="200" height="600" src="{{ asset($item->path) }}" alt="Second slide">
                                </div>
                            @endif
                        @endforeach
					</div>

					<div class="content mt-5 pt-5">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Product Description</h3>
								<p>{{ $detail->detail }}</p>
							</div>
						</div>
					</div>
					<div class="block comment">
						<h4>Comment</h4><hr>
						@if(count($dataComment) > 0)
							@foreach ($dataComment as $item)
								<div class="media">
									<div class="media-body">
										<div class="name">
											<h5>{{ $item->getUser->name }}</h5>
										</div>
										<div class="date">
											<p>{{ $item->created_at }}</p>
										</div>
										<div class="review-comment">
											<p>{{ $item->comment }}</p>
										</div>
									</div>
								</div>
								<hr>
							@endforeach
						@endif
						@guest
						@else
							@if (Auth::guard('web')->user()->type_personal_id == 2)
								<form action="{{ route('front.shirt.comment') }}" method="POST">
									@csrf
									<div class="form-group mb-30">
										<input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">
										<input type="hidden" name="product_id" value="{{ $detail->id }}">
										<label for="message">Message</label>
										<textarea class="form-control" id="message" name="comment" rows="8"></textarea>
									</div>
									<button type="submit" class="btn btn-transparent">บันทึก</button>
								</form>
							@endif
						@endguest
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<!-- <div class="widget price text-center">
						<h4>Price</h4>
						<p>$230</p>
					</div> -->
					<!-- User Profile widget -->
					<div class="widget user text-center">
						<img class="rounded-circle img-fluid mb-5 px-5" src="{{ asset($detail->getUser->image) }}" alt="">
						<h4>ประวัติผู้ขาย</h4>
						<p>ชื่อ: {{ $detail->getUser->name }}</p>
						<p>อีเมล์: {{ $detail->getUser->email }}</p>
						<!-- <a href="">See all ads</a> -->
						<!-- <ul class="list-inline mt-20">
							<li class="list-inline-item"><a href="" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a></li>
							<li class="list-inline-item"><a href="" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Make an
									offer</a></li>
						</ul> -->
					</div>
					<!-- Map Widget -->
				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>
@endsection