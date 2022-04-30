<!-- Header -->
<div class="welcome-header">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center ">
            <a href="{{route('welcome')}}">
                <img class="logo" src="{{asset('images/geofair_logo/new-logo2.png')}}" alt="">
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
    <img class="top-banners" src="{{asset('images/top-banners.jpg')}}" alt="">
</div>

<!-- Line break -->
<div class="bg-dark w-100" style="height:1px;"></div>

<!-- Menu bar (responsive) -->
<div class="menu-bar-overlay"></div>
<ul class="menu-bar">
    <li>
        <a href="{{route('welcome')}}">TGN 2022 
            <!-- <i class="fa fa-caret-down"></i> -->
        </a>
        <!-- <ul>
            <a href="#">
                <li>ข้อความต้อนรับ</li>
            </a>
            <a href="#">
                <li>Organizing Committee</li>
            </a>
        </ul> -->
    </li>

    <li><a href="{{route('programme')}}">โปรแกรม</a></li>
    
    <li><a href="{{route('registration')}}">ลงทะเบียน</a></li>

    <!-- <li><a href="#">ข่าว</a></li> -->

    <li><a href="{{route('abstract')}}">บทความวิชาการ</a></li>

    <li><a href="{{route('geofair')}}">จีโอพาร์คในไทย</a></li>
    
    <li><a href="{{route('geotrail')}}">เส้นทางท่องเที่ยว</a></li>

    <li><a href="{{route('gallery')}}">ห้องภาพ</a></li>
    
</ul>