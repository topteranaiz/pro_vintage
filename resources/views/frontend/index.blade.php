@extends('template.master')
@section('content')
<section class="hero-area bg-1 text-center overly">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content-block">
					<h1>Double T Vintage</h1>
					{{-- <p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p> --}}
				</div>
				<div class="advance-search">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<form method="GET">
									<div class="form-row">
										<div class="form-group col-md-3">
											<input type="text" class="form-control my-2 my-lg-1" id="inputtext4" name="name" value="{{request()->input('name') ? request()->input('name') : null }}" placeholder="ค้นหาชื่อเสื้อวินเทจ">
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
											<input type="text" class="form-control my-2 my-lg-1" value="{{ request()->input('price') ? request()->input('price') : null }}" id="inputtext4" name="price" placeholder="ค้นหาราคาเสื้อวง">
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
			</div>
		</div>
	</div>
</section>

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
            @foreach ($products as $item)
                <div class="col-sm-4 col-lg-4">
                    <div class="product-item bg-light">
                        <div class="card">
                            <div class="thumb-content">
                                <a href="{{ route('front.detail', $item->id) }}">
                                    <img class="card-img-top" src="{{ asset($item->getProductAttachment[0]->path) }}" width="200" height="300" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><a href="{{ route('front.detail', $item->id) }}">{{ $item->name }}</a></h4>
                                <p class="card-text">{{ $item->detail }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
		</div>
	</div>
</section>
@endsection
