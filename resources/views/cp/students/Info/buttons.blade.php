<p><a href="{{url('/cp/students/Info/pending')}}" class="btn btn-primary form-control button">الطلبات الجديدة</a></p>
<p><a href="{{url('/cp/students/Info/Approved')}}" class="btn btn-success form-control button">الطلبات المقبولة</a></p>
<p><a href="{{url('/cp/students/Info/Reject')}}" class="btn btn-danger form-control button">الطلبات المرفوضة</a></p>
@if(Auth::User()->getRole() == 'admin')
<p><a href="{{url('/cp/students/Info/export')}}" class="btn btn-default form-control button">تصدير الروابط </a></p>
<p><a href="{{url('/cp/students/Info/export2')}}" class="btn btn-default form-control button">تصدير بيانات الطلاب  </a></p>
@endif


