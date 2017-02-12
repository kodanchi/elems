@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('cp.objection_title')}}  | عدد النتائج: {{$forms->count()}}</div>


                    <div class="panel-body ">

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
                            {!! Form::open(['url' => 'cp/students/objection/requested/search', 'method' => 'post']) !!}
                        <!--- Search By Field --->
                            <div class="form-group">
                                {!! Form::label('searchType', trans('cp.searchBy').':') !!}

                                {!! Form::select('searchType', trans('cp.MSearch') , null , ['class' => 'form-control']) !!}
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

                        <div class="col col-md-9">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">{{trans('sp.code')}}</th>
                                <th class="text-center">{{trans('sp.email')}}</th>
                                <th class="text-center">{{trans('sp.submit')}}</th>
                                </thead>
                                <tbody>
                                @foreach($forms as $form)
                                    <tr class="text-center">
                                        <td>{{$form->pin}}</td>
                                        <td>{{$form->email}}</td>
                                        <td>
                                        {!! Form::open(['url' => 'cp/students/objection/validate', 'method' => 'post','class'=>'newsletter-form','target'=>'_blank']) !!}

                                            {!! Form::hidden('pin', $form->pin, ['id' => 'id']) !!}
                                            {!! Form::hidden('email', $form->email, ['id' => 'id']) !!}

                                            {!! Form::submit('تقديم', ['class' => 'form-control btn-xs']) !!}

                                            {!! Form::close() !!}
                                            </td>
                                    </tr>
                                @endforeach
                                @if($forms->isEmpty())
                                    <tr class="text-center">
                                        <td colspan="4">{{trans('cp.noRes')}}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div>{{$forms->links()}}</div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection