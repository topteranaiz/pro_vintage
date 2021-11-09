@extends('template.master')
@section('content')
<section class="dashboard section">
	<div class="container">
		<div class="row">
			@include('template.partials.manage.sidebar')
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">
						<a class="nav-link text-white add-button" href="{{ route('product.create') }}"><i class="fa fa-plus-circle"></i> เพิ่มสินค้า</a>
					</h3>

					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th class="text-center">ประเภทสินค้า</th>
								<th class="text-center">ชื่อสินค้า</th>
								<th class="text-center">ขนาด</th>
								<th class="text-center">ชนิดผ้า</th>
								<th class="text-center">จำนวน</th>
								<th class="text-center">ราคา</th>
								<th class="text-center">วันที่สร้าง</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($dataProducts as $item)
								<tr>
                                    <td class="product-category">{{ $item->getTypeProduct->name }}</td>
									<td class="product-category">
										<span class="categories">{{ $item->name }}</span>
									</td>
                                    <td class="product-category">{{ $item->getSize() }}</td>
                                    <td class="product-category">{{ $item->fabric_type }}</td>
                                    <td class="product-category">{{ $item->amount }}</td>
                                    <td class="product-category">{{ $item->price }}</td>

									<td class="product-category"><span class="categories">{{ $item->created_at }}</span></td>
									<td class="action" data-title="Action">
										<div class="">
											<ul class="list-inline justify-content-center">
												<li class="list-inline-item">
													<a data-toggle="tooltip" data-placement="top" title="Comment" class="edit" href="{{ route('product.comment',[$item->id]) }}">
														<i class="fa fa-comments"></i>
													</a>
												</li>
												<li class="list-inline-item">
													<a data-toggle="tooltip" data-placement="top" title="Edit" class="edit" href="{{ route('product.edit',[$item->id]) }}">
														<i class="fa fa-pencil"></i>
													</a>
												</li>
												<li class="list-inline-item">
													<a data-toggle="tooltip" data-placement="top" title="Delete" class="delete" href="{{ route('product.delete',$item->id) }}">
														<i class="fa fa-trash"></i>
													</a>
												</li>
											</ul>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{-- <div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div> --}}
			</div>
		</div>
	</div>
</section>
@endsection
