<div class="col col-md-3">
    @include('cp.students.helpdesk.buttons')
    <hr>
    {!! Form::open(['url' => 'cp/students/helpdesk/search', 'method' => 'post']) !!}
    	<!--- Search By Field --->
    	<div class="form-group">
    	    {!! Form::label('searchTypeL', trans('cp.searchBy').':') !!}
            @if(Auth::User()->getRole() == 'admin')
                {!! Form::select('searchType', trans('cp.helpdeskSearchAdmin') , null , ['class' => 'form-control', 'id' => 'searchType']) !!}
            @else
                {!! Form::select('searchType', trans('cp.helpdeskSearch') , null , ['class' => 'form-control', 'id' => 'searchType']) !!}
            @endforelse
    	</div>
        <!--- Search Field --->
        <div class="form-group" id="sf">
            {!! Form::text('search', null, ['class' => 'form-control','id'=>'search', 'placeholder'=> 'Search']) !!}
            {!! Form::select('departmentType', trans('serviceType') , null , ['class' => 'form-control', 'id' => 'departmentType']) !!}
        </div>
        {!! Form::submit('بحث', ['class' => 'form-control btn-success']) !!}
    {!! Form::close() !!}
        <script>

            $(document).ready(function () {
                $('#departmentType').hide();
            });


            $('#searchType').change(function () {
                el_exams();
                $('#departmentType').focus();
            });

            function el_exams() {
                if($('#searchType').val() === 'department'){
                    if($('#departmentType').val() === 'department') $('#departmentType').val('');
                    $('#departmentType').show();
                    $('#search').hide();
                }else {
                    $('#departmentType').val('sid');
                    $('#search').show();
                    $('#departmentType').hide();
                }
            }

            /*$('#searchType').on('change',function () {
                if ($('#searchType').val() === 'sid') {
                $('#search').focus();
                }
                else if($('#searchType').val() === 'department'){
                    departmentTypes();
                }
            });

            function departmentTypes() {
                if($('#searchType').val() === 'department'){
                    if($('#searchType').val() === 'department') $('#searchType').val('');
                    $('#departmentType').show();
                }else {
                    $('#searchType').val('department');
                    $('#departmentType').hide();
                }
            }*/

           /*$('#searchType').change(function () {
               el_exams();
               $('#departmentType').focus();
           });

           //window.alert($('#searchType').val());
           function el_exams() {
               window.alert($('#searchType').val());
               if ($('#searchType').val() === 'department') {
                   if ($('#searchType').val() === 'department') $('#searchType').val('');
                   $('#departmentType').show();
               }
               else {
                       $('#searchType').val('sid');
                       $('#departmentType').hide();
               }
           };*/

          // $(document).ready(function(){
           /*window.onload = function() {
               var eSelect = document.getElementById('searchType');
               var optOtherReason = document.getElementById('departmentType');
               var optOther = document.getElementById('search');
               eSelect.onchange = function() {
                   if(eSelect.value === "department") {
                       optOtherReason.style.display = 'block';
                       optOther.style.display = 'none';
                   } else if (eSelect.value === "sid"){
                       optOtherReason.style.display = 'none';
                       optOther.style.display = 'block';
                   }
               }
           };*/
           //});

        </script>

    <hr>
    @if(Auth::User()->getRole() != 'admin' )

    <div class="">
        <ul class="list-group">
            <li class="list-group-item list-group-item-success">
                الطلبات المظللة باللون الأخضر تم تعيينها إليك شخصياً
            </li>
        </ul>
    </div>
        @endif
</div>