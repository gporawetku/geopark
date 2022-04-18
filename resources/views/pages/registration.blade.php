@extends('../blogContent')

@section('content')
<h3 class="text-dark-color">ขั้นตอนการลงทะเบียน</h3>
<hr class="text-base-color">
<div class="mb-md-5">
  <ul>
    <li class="py-2">
      <span class="fas fa-hand-point-right text-base-color"></span>
      ขั้นตอนที่ 1. กรอกข้อมูลผู้ลงทะเบียน ผ่าน Google form ตาม
      <a href="https://rb.gy/yq0a1z" target="_blank">ลิงค์นี้ <span class="fas fa-external-link-alt"></span></a>
    </li>
    <li class="py-2">
      <span class="fas fa-hand-point-right text-base-color"></span>
      ขั้นตอนที่ 2. ผู้ลงทะเบียนจะได้รับอีเมล์แจ้งลิงค์เข้าร่วมกิจกรรมตามอีเมล์ที่
      ลงทะเบียนไว้ ในวันที่ 20 เมษายน 2565 และ 24 เมษายน
      2565
    </li>
    <li class="py-2">
      <span class="fas fa-hand-point-right text-base-color"></span>
      ขั้นตอนที่ 3 ผู้ลงทะเบียนเข้าลิงค์ตามที่ได้รับทางอีเมล์
    </li>
  </ul>
</div>
<a href="https://rb.gy/yq0a1z" target="_blank">
  <img class="w-100" src="{{asset('images/register/register-2.jpg')}}" alt="">
</a>
<hr class="text-base-color mt-5 w-50 mx-auto">
@stop