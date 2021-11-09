<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
    <div class="sidebar">
        <div class="widget user-dashboard-profile">
            <div class="profile-thumb">
                @if(!empty(Auth::guard('web')->user()->image))
                    <img src="{{ asset(Auth::guard('web')->user()->image) }}" alt="" class="rounded-circle">
                @else
                    <img src="{{ asset('/image/profile/default.png') }}" alt="" class="rounded-circle">
                @endif
            </div>
            <h5 class="text-center">{{ Auth::guard('web')->user()->name }}</h5>
                <p>{{ Auth::guard('web')->user()->created_at }}</p>
            {{-- @if(Request::segment(1) == "home") --}}
                <a href="{{ route('profile.edit', [Auth::guard('web')->user()->id]) }}" class="btn btn-main-sm">Edit Profile</a>
            {{-- @endif --}}
        </div>
        <div class="widget user-dashboard-menu">
            <ul>
                @if(Auth::guard('web')->user()->type_personal_id == 1)
                    <li><a href="/home"><i class="fa fa-user"></i>ประเภทสินค้าสินค้า</a></li>
                    <li><a href="{{ route('product.index') }}"><i class="fa fa-user"></i>สินค้า</a></li>
                @else
                    <li><a href="/home"><i class="fa fa-user"></i>รายการสั่งซื้อ</a></li>
                @endif
                <li>
                    <a onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="fa fa-cog"></i>Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</div>