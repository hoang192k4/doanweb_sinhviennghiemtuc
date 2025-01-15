<div class="header">
    <div class="left">
        <div class="logo">
            <a href="/admin"><img src="{{ asset('images/' . App\Models\About::first()->logo) }}" alt="Logo"></a>
        </div>
        <div class="website">
            <a href="{{route('user.index')}}"><i class="fa-solid fa-globe"></i> Website</a>
        </div>
    </div>
    <div class="right">
        <div class="account">
            <a href=""><i class="fa-regular fa-user"></i> {{Auth::user()->username}}</a>
            <div class="dropbox">
                <p><a href="{{route('admin.profile')}}">Trang cá nhân</a></p>
                <p><a href="{{route('logout')}}">Đăng xuất</a></p>
            </div>
        </div>

    </div>
</div>
