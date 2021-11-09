@extends('template.master')
@section('content')
<section class="dashboard section">
	<div class="container">
		<div class="row">
			@include('template.partials.manage.sidebar')
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">รายการสั่งซื้อสินค้า</h3>

					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th class="text-center">ออเดอร์</th>
								<th class="text-center">จำนวน</th>
								<th class="text-center">ราคา</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
								<td class="product-category">1</td>
								<td class="product-category">
									<span class="location">20</span>
								</td>
								<td class="product-category"><span class="categories">2000</span></td>
								<td class="action" data-title="Action">
									<div class="">
										<ul class="list-inline justify-content-center">
											<li class="list-inline-item">
												<a data-toggle="tooltip" data-placement="top" title="View" class="view" href="category.html">
													<i class="fa fa-eye"></i>
												</a>
											</li>
											<li class="list-inline-item">
												<a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="">
													<i class="fa fa-pencil"></i>
												</a>
											</li>
											<li class="list-inline-item">
												<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="">
													<i class="fa fa-trash"></i>
												</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
                            <tr>
								<td class="product-category">2</td>
								<td class="product-category">
									<span class="location">10</span>
								</td>
								<td class="product-category"><span class="categories">5000</span></td>
								<td class="action" data-title="Action">
									<div class="">
										<ul class="list-inline justify-content-center">
											<li class="list-inline-item">
												<a data-toggle="tooltip" data-placement="top" title="View" class="view" href="category.html">
													<i class="fa fa-eye"></i>
												</a>
											</li>
											<li class="list-inline-item">
												<a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="">
													<i class="fa fa-pencil"></i>
												</a>
											</li>
											<li class="list-inline-item">
												<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="">
													<i class="fa fa-trash"></i>
												</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
