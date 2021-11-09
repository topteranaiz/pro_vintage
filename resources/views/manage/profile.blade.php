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
							<h3 class="widget-header user">แก้ไขโปรไฟล์</h3>
							<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
								@csrf
								@if(isset($edit))
                                    <input type="hidden" name="id" value="{{$edit->id}}">
                                @endif
								<div class="form-group">
									<label for="first-name">Name</label>
									<input type="text" class="form-control" name="name" value="{{ isset($edit) ? $edit->name: "" }}" id="first-name">
								</div>
								<div class="form-group">
									<label for="last-name">Email</label>
									<input type="text" class="form-control" name="email" value="{{ isset($edit) ? $edit->email: "" }}" id="last-name">
								</div>
								<div class="form-group">
									<label for="last-name">Password</label>
									<input type="password" class="form-control" name="password">
								</div>
								<div class="form-group choose-file d-inline-flex">
									<i class="fa fa-user text-center px-3"></i>
									<input type="file" name="image" class="form-control-file mt-2 pt-1" id="input-file">
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
