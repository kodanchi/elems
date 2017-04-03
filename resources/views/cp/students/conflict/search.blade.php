<div class="col col-md-2">
    <p><a href="{{url('/cp/students/conflict/')}}" class="btn btn-default form-control button">{{trans('cp.all_res')}}</a></p>
    <p><a href="{{url('/cp/students/conflict/pending')}}" class="btn btn-primary form-control button">{{trans('cp.new_res')}}</a></p>
    <p><a href="{{url('/cp/students/conflict/approved')}}" class="btn btn-success form-control button">{{trans('cp.approved_res')}}</a></p>
    <p><a href="{{url('/cp/students/conflict/rejected')}}" class="btn btn-danger form-control button">{{trans('cp.rejected_res')}}</a></p>
    @if(Auth::User()->getRole() == 'admin')
        <p><a href="{{url('/cp/students/conflict/export')}}" class="btn btn-default form-control button">{{trans('cp.export_res')}}</a></p>

    @endif
    <hr>
    {!! Form::open(['url' => 'cp/students/conflict/search', 'method' => 'post']) !!}
    	<!--- Search By Field --->
    	<div class="form-group">
    	    {!! Form::label('searchType', trans('cp.searchBy').':') !!}

            {!! Form::select('searchType', trans('cp.conflictSearch') , null , ['class' => 'form-control']) !!}
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