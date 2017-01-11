<div class="col col-md-3">
    <p><a href="{{url('/cp/warehouse/')}}" class="btn btn-default form-control button">{{trans('cp.all_res')}}</a></p>
    <p><a href="{{url('/cp/warehouse/uptodate')}}" class="btn btn-primary form-control button">{{trans('warehouse.uptodate')}}</a></p>
    <p><a href="{{url('/cp/warehouse/outdated')}}" class="btn btn-danger form-control button">{{trans('warehouse.outdated')}}</a></p>
    <hr>
    {!! Form::open(['url' => 'cp/warehouse/search', 'method' => 'post']) !!}
    	<!--- Search By Field --->
    	<div class="form-group">
    	    {!! Form::label('searchType', trans('cp.searchBy').':') !!}

            {!! Form::select('searchType', trans('cp.WHSearch') , null , ['class' => 'form-control']) !!}
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
    <a href="{{url('cp/warehouse/')}}" class="btn btn-default form-control button">{{trans('warehouse.back')}}</a>
</div>