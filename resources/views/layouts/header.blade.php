<!-- Header -->
<div class="welcome-header">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center ">
            <a href="{{route('welcome')}}">
                <img class="logo" src="{{asset('images/logo1.png')}}" alt="">
            </a>
            <a class="title" href="{{route('welcome')}}">
                การประชุมทางวิชาการเครือข่ายอุทยานธรณีประเทศไทย ครั้งที่ 1
            </a>
        </div>
        <!-- Mobile Navigation Icon -->
        <div class="mobile-icon">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </div>
    <img class="top-banners" src="{{asset('images/top-banners.png')}}" alt="">
</div>

<!-- Line break -->
<div class="bg-dark w-100" style="height:1px;"></div>

<!-- Menu bar (responsive) -->
<div class="menu-bar-overlay"></div>
<ul class="menu-bar">
    <li>
        <a href="#">TGN 2022 <i class="fa fa-caret-down"></i></a>
        <ul>
            <a href="#">
                <li>Welcome Message</li>
            </a>
            <a href="#">
                <li>Organizing Committee</li>
            </a>
        </ul>
    </li>
    <li>
        <a href="{{route('programme')}}">
            Programme
        </a>
    </li>
    <li>
        <a href="{{route('blog.list')}}">News</a>
    </li>

    <li><a href="{{route('registration')}}">Registration</a></li>

    <li>
        <a href="{{route('abstract')}}">
            Abstract
        </a>
    </li>

    <li><a href="{{route('geofair')}}">Geofair</a></li>

    <li>
        <a href="{{route('gallery')}}">Gallery</a>
    </li>
    
</ul>