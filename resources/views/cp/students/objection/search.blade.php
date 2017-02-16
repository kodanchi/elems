<div class="col col-md-3">
    <p><a href="{{url('/cp/students/objection/')}}" class="btn btn-default form-control button">{{trans('cp.all_res')}}</a></p>
    <p><a href="{{url('/cp/students/objection/pending')}}" class="btn btn-primary form-control button">{{trans('cp.new_res')}}</a></p>
    <p><a href="{{url('/cp/students/objection/approved')}}" class="btn btn-success form-control button">{{trans('cp.approved_res')}}</a></p>
    <p><a href="{{url('/cp/students/objection/rejected')}}" class="btn btn-danger form-control button">{{trans('cp.rejected_res')}}</a></p>
    @if(Auth::User()->getRole() == 'admin')
        <p><a href="{{url('/cp/students/objection/requested')}}" class="btn btn-danger form-control button">{{trans('cp.requested_res')}}</a></p>
        <p><a href="{{url('/cp/students/objection/export')}}" class="btn btn-danger form-control button">{{trans('cp.export_res')}}</a></p>

    @endif
    <hr>
    {!! Form::open(['url' => 'cp/students/objection/search', 'method' => 'post']) !!}
    	<!--- Search By Field --->
    	<div class="form-group">
    	    {!! Form::label('searchType', trans('cp.searchBy').':') !!}

            {!! Form::select('searchType', trans('cp.objectionSearch') , null , ['class' => 'form-control']) !!}
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
</div>