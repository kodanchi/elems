<div class="col col-md-3">
    @include('cp.students.helpdesk.buttons')
    <hr>
    {!! Form::open(['url' => 'cp/students/helpdesk/search', 'method' => 'post']) !!}
    	<!--- Search By Field --->
    	<div class="form-group">
    	    {!! Form::label('searchType', trans('cp.searchBy').':') !!}

            {!! Form::select('searchType', trans('cp.helpdeskSearch') , null , ['class' => 'form-control']) !!}
    	</div>

        <!--- Search Field --->
        <div class="form-group" id="sf">
            {!! Form::text('search', null, ['class' => 'form-control','id'=>'search', 'placeholder'=> 'Search']) !!}
        </div>
        {!! Form::submit('بحث', ['class' => 'form-control btn-success']) !!}
    {!! Form::close() !!}
        <script>
            $('#searchType').on('change',function () {
                $('#search').focus();
            });

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