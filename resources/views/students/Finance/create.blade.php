@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row ">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading">الكشف المالي</div>

                    <div class="panel-body ">
                        <div class="row">

                            @include('errors.errors')
                            <div class="col-md-12 newsletter-form">

                                {!! Form::open(['url' => '/finance/new', 'method' => 'post', 'files' => true ,'class'=>'newsletter-form' ]) !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>  {!! Form::label('IBAN', 'الايبان'.':') !!}
                                     {{($bank_trans[0]->IBAN)}}</h3>
                                        </div>
                                    </div>

                                    <hr style="	border-top: 3px solid #1b6d85">

                                <div class="row">
                                    <div class="col-md-6">
                                        <!--- Full name  --->
                                        <div class="form-group">
                                            {!! Form::label('name', 'الاسم'.':') !!}
                                            {{$students->name}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!--- SID  --->
                                        <div class="form-group">
                                            {!! Form::label('SID', trans('objection.nid').':') !!}
                                            {{$students->national_id}}
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <!--- NID  --->
                                        <div class="form-group">
                                            {!! Form::label('NID', trans('objection.sid').':') !!}
                                            {{$students->student_id}}
                                        </div>
                                    </div>


                                    <div class="col-md-6">

                                        <!--- Gender  --->
                                        <div class="form-group">
                                            {!! Form::label('gender', trans('objection.gender').':') !!}
                                            {{trans('studentGender.'.$students->gender)}}
                                        </div>
                                    </div>


                                </div>


                                    <div class="row">

                                        <div class="col-md-6">
                                            <!--- Subject Field --->
                                            <div class="form-group">
                                                {!! Form::label('gender','المستحق'.':') !!}
                                                {{$students->balance. ' ريال '}}
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <!--- Upload Field --->
                                            <div class="form-group">
                                                {!! Form::label('gender','التخصص'.':') !!}
                                                {{$students->major}}
                                            </div>
                                        </div>

                                    </div>
                                <br>
                                <hr>
                                <hr style="	border-top: 3px solid #1b6d85">

                                <div class="row">
                                <div class="col col-md-12">
                                    <?php $TotalOfTotals=0; ?>
                                    <?php $TotalOfTerms=0; ?>
                                    <?php $TotalOfPayed=0; ?>
                                    <?php $discount=1; ?>

                                        {{--@if($students->discount=="0.5")

                                        @elseif($students->discount=="0")

                                        @endforelse--}}

                                    <table class="table table-stripped table-hover" border="1">
                                        <caption style="font-size: large"><b>  تفاصيل الدفع:</b></caption>
                                        <thead class="">

                                        <th class="text-center" style="background-color: #2b669a; color: white">الفصل الدراسي</th>
                                        <th class="text-center" style="background-color: #2b669a; color: white">المواد</th>
                                        <th class="text-center" style="background-color: #2b669a; color: white">المستحق</th>
                                        <th class="text-center" style="background-color: #2b669a; color: white">المدفوع</th>
                                        </thead>
                                        <tbody>
                                        @foreach($terms as $term)
                                            <tr class="text-center">
                                                {{--{{$termTotal=0;}}--}}
                                                <?php $termTotal=0; ?>
                                                <?php $payedTermTotal=0; ?>

                                                @foreach($bank_trans as $bank_tran)
                                                    @if($bank_tran->tid===$term->term_id)
                                                        <?php $payedTermTotal+=$bank_tran->Amount; ?>
                                                    @endif
                                                @endforeach

                                                <td  style="text-align:center;   vertical-align: middle">
                                                    <?php $newstr = substr_replace($term->term_id, "0", 1 , 0); ?>
                                                    <?php $n=substr($term->term_id, -1); ?>
                                                    <?php $newarraynama=substr($newstr, 0, -1); ?>
                                                    @if($n=='1')
                                                        الفصل الأول
                                                    @elseif($n=='2')
                                                            الفصل الثاني
                                                    @endforelse
                                                    {{$newarraynama}}
                                                </td>
                                                <td style="text-align:center;   vertical-align: middle">

                                                </td>
                                                <td style="text-align:center;   vertical-align: middle">{{$termTotal}}</td>
                                                <td style="text-align:center;   vertical-align: middle">{{$payedTermTotal}}</td>
                                                <?php $TotalOfTerms+=$termTotal;?>
                                                <?php $TotalOfPayed+=$payedTermTotal;?>
                                            </tr>
                                        @endforeach
                                        {{--@if($terms->isEmpty())
                                            <tr class="text-center">
                                                <td colspan="4">{{trans('cp.noRes')}}</td>
                                            </tr>
                                        @endif--}}
                                        </tbody>
                                    </table>

                                    {{--<div>{{$terms->links()}}</div>--}}

                                </div>
                                    </div>
                                    </div>

                            <br>
                            <br>
                            <br>
                            <br>

                                    <div class="row newsletter-form">

                                        <div class="col-md-6">
                                            <!--- Subject Field --->
                                            <!--- Subject Field --->
                                        </div>
                                        <div class="col-md-12">
                                            <!--- Subject Field --->
                                            <?php $TotalOfTotals=$TotalOfPayed-$TotalOfTerms;?>
                                            @if($TotalOfTotals<0)
                                                <h4 style="color: #9F3A38; margin-right: 15px">المبلغ المطلوب دفعه:  {{abs($TotalOfTotals)}}</h4>
                                            @elseif($TotalOfTotals>0)
                                                <h4 style="color: #003eff; margin-right: 15px">المبلغ المدفوع مسبقا:  {{abs($TotalOfTotals)}}</h4>
                                            @else
                                                <h4 style="color: #3c763d; margin-right: 15px">المبلغ المطلوب تم دفعه </h4>
                                            @endforelse
                                                <hr style="	border-top: 3px solid #1b6d85">

                                                <a href="{{url('/finance')}}" class=" button col-md-3" style="margin-right: 10px">رجوع</a>
                                        </div>
                                        <!--- Reason Field --->
                                        <!--- reason Field --->

                                        <br>
                                        <br>

                                {!! Form::close() !!}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script type="application/javascript">
        $(document).ready(function () {


            $('#SID').mask("r000000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
                    },
                    'r':{
                        pattern: /[2/]/,
                        fallback: '1'
                    }

                },placeholder: "2XXXXXXXX"
            });

            $('#NID').mask("r000000000", {
                'translation': {
                    0: {
                        pattern: /[0-9*]/
                    },
                    'r':{
                        pattern: /[1/]/,
                        fallback: '1'
                    }

                },placeholder: "1XXXXXXXX"
            });


        });
    </script>
    @endsection