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
							<form method="POST" action="{{ isset($edit) ? route('typeproduct.update'): route('typeproduct.store') }}">
							{{-- <form method="POST" action="{{ route('typeproduct.store') }}"> --}}

                                @csrf
                                @if(isset($edit))
                                    <input type="hidden" name="id" value="{{$edit->id}}">
                                @endif
								<div class="form-group">
									<label for="first-name">ชื่อประเภทสินค้า</label>
									<input type="text" class="form-control" name="name" required value="{{ isset($edit) ? $edit->name: "" }}" id="first-name">
								</div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <a href="/home" type="button" class="btn btn-danger d-block mt-2">Cancel</a>
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
