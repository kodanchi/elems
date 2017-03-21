@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.errors')
                @include('errors.status')
                <div class="panel panel-default">
                    <div class="panel-heading"> فصل </div>

                    <div class="panel-body ">

                        <div class="col col-md-12">

                            @if($forms)
                            <table class="table table-stripped table-hover">
                                <thead class="">
                                <th class="text-center">الفصل</th>
                                <th class="text-center">تاريخ الانشاء</th>
                                </thead>
                                <tbody>

                                @foreach($forms as $form)
                                    <tr class="text-center">
                                        <td>
                                            <?php $newstr = substr_replace($form->term_id, "0", 1 , 0); ?>
                                            <?php $n=substr($form->term_id, -1); ?>
                                            <?php $newarraynama=substr($newstr, 0, -1); ?>
                                            @if($n=='1')
                                                الفصل الأول
                                            @elseif($n=='2')
                                                الفصل الثاني
                                                @endforelse
                                            {{$newarraynama}}
                                        </td>
                                        <td>{{str_replace(substr($form->created_at, 19, 4), '', $form->created_at)}}</td>
                                    </tr>

                                @endforeach
                                @if(!$forms)
                                    <tr class="text-center">
                                        <td colspan="4">{{trans('cp.noRes')}}</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>

                            <div></div>

                                @endif
                        </div>


                        <div class="col col-md-2">

                        <p><a href="{{url('/cp/students/finance/term/add')}}" class="btn btn-info form-control button">إضافة فصل جديد</a></p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection