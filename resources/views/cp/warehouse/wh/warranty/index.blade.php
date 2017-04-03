@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">
                    <div class="panel-heading">الضمان{{--  | عدد النتائج: {{$forms->count()}}--}}</div>


                    <div class="panel-body ">

                        @include('cp.warehouse.wh.warranty.search')

                        <div class="col col-md-10">
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">الرقم التعريفي</th>
                                <th class="text-center">اسم الضمان</th>
                                <th class="text-center">المكان</th>
                                <th class="text-center">مشاهدة</th>
                                </thead>
                                <tbody>
                                @foreach($forms as $form)
                                    <tr class="text-center">
                                        <td>{{$form->id}}</td>
                                        <td>{{$form->warranty_name}}</td>
                                        <td>{{$form->location}}</td>
                                        <td><a href="{{url('cp/warehouse/warranty/view/'.$form->id)}}">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </a></td>
                                    </tr>
                                @endforeach
                                @if($forms->isEmpty())
                                    <tr class="text-center">
                                        <td colspan="5">{{trans('warehouse.noRes')}}</td>
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