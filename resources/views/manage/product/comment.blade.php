@extends('template.master')
@section('content')
<section class="dashboard section">
	<div class="container">
		<div class="row">
			@include('template.partials.manage.sidebar')
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<div class="widget dashboard-container my-adslist">
					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th class="text-center">ผู้ใช้</th>
								<th class="text-center">วันที่คอมเม้น</th>
								<th class="text-center">คอมเม้น</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($dataComment as $item)
								<tr>
                                    <td class="product-category">{{ $item->getUser->name }}</td>
									<td class="product-category">
										<span class="categories">{{ $item->created_at }}</span>
									</td>
                                    <td class="product-category">{{ $item->comment }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
