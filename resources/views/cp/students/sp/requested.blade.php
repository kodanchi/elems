@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('cp.sp_title')}}  | عدد النتائج: {{$forms->count()}}</div>


                    <div class="panel-body ">

                        @include('cp.students.sp.REQsearch')

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
                                        {!! Form::open(['url' => 'cp/students/sp/validate', 'method' => 'post','class'=>'newsletter-form','target'=>'_blank']) !!}

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