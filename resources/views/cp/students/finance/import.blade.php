@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-11 col-md-offset-1">
                @include('errors.status')
                @include('errors.errors')
                <div class="panel panel-default">

                    <h3>رفع بيانات الطلاب</h3>
                    <div class="row ">
                        <div class="form-group">
                            {!! Form::open(['url' => '/cp/students/finance/import/update', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}
                            <div class="col-md-3">
                                {!! Form::label('term', trans('اختر الفصل الدراسي').':') !!}
                                <select name="term" id="term" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="" selected>الفصل</option>

                                @foreach ($terms as $term)
                                    <?php $newstr = substr_replace($term->term_id, "0", 1 , 0); ?>
                                    <?php $n=substr($term->term_id, -1); ?>
                                    <?php $newarraynama=substr($newstr, 0, -1); ?>
                                        <option value="{{$term->term_id}}">
                                        @if($n=='1')
                                                الفصل الأول
                                            @elseif($n=='2')
                                                الفصل الثاني
                                                @endforelse
                                                {{$newarraynama}}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    <div class="row ">
                        <div class="form-group">
                            <h5>أرفع الملف  نفس الترتيب جزاك الله خير</h5>
                            {!! Form::label('ارفق الملف') !!}
                            <div class="col-md-6">
                            {!! Form::file('import_file', ['class' => 'form-control']) !!}
                            </div>
                            <small>يرفق ملف Excel </small>
                            <small class="red">الحجم المسموح: 4MB أو أقل</small>
                        </div>
                    </div>

                    {!! Form::submit('أرفع', ['class' => ' col-md-3']) !!}

                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection