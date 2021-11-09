@extends('template.master')
@section('content')
<section class="hero-area bg-1 text-center overly">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content-block">
					<h1>วงดนตรี</h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
				</div>
				<div class="advance-search">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<form>
									<div class="form-row">
										<div class="form-group col-md-5">
											<input type="text" class="form-control my-2 my-lg-1" id="inputtext4" placeholder="ค้นหาชื่อวงดนตรี">
										</div>
										<div class="form-group col-md-5">
											<select class="w-100 form-control mt-lg-1 mt-md-2">
												<option>กรุณาเลือกประเภทวง</option>
												<option value="1">สติง</option>
												<option value="2">ลูกทุ่ง</option>
												<option value="4">เมทอล</option>
											</select>
										</div>
										<div class="form-group col-md-2 align-self-center">
											<button type="submit" class="btn btn-primary">Search Now</button>
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
            <div class="col-sm-4 col-lg-4">
                <div class="product-item bg-light">
                    <div class="card">
                        <div class="thumb-content">
                            <a href="single.html">
                                <img class="card-img-top" src="data/viewrabeang/timeline_25640906_174858.jpg" width="200" height="300" alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href="single.html">วิวระเบียง</a></h4>
                            <p class="card-text">ก่อตั้งวงเมื่อปี 2563 ถือว่าเป็นนักดนตรีหนุ่มที่เล่นดนตรีอาชีพมาตั้งแต่เด็กๆ เมื่อมีวุติภาวะที่มากขึ้นจึงออกมาตั้งวงเอง</p>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>
@endsection
