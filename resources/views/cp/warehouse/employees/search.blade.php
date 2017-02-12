<div class="col col-md-3">
    {!! Form::open(['url' => 'cp/warehouse/employees/search', 'method' => 'post']) !!}
    	<!--- Search By Field --->
    	<div class="form-group">
    	    {!! Form::label('searchType', trans('cp.searchBy').':') !!}

            {!! Form::select('searchType', trans('cp.EmpSearch') , null , ['class' => 'form-control']) !!}
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
    <a href="{{url('cp/warehouse/employees/new')}}" class="btn btn-default form-control button">{{trans('warehouse.createNewEmp')}}</a>
    <a href="{{url('cp/warehouse/')}}" class="btn btn-default form-control button">{{trans('warehouse.back')}}</a>
</div>