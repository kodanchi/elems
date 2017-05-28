  @extends('layouts.app')

  @section('content')

              <div class="container ">
                  <div class="row ">
                      <div class="col-md-12">
                          <div class="panel panel-default">
                              <div class="panel-heading">    جدول تحضير المراقب - {{$forms[0]->card_id}}</div>

                              <div class="panel-body ">
                                  <div class="row">

                                      @include('errors.status')
                                      <div class="col-md-12 newsletter-form">
                                          <h4 style="  color: red"> مسؤولياتك (تعهد):</h4>
                                          <p>


                                          1)	تحتسب مستحقات المراقبة بناءًا على تسجيل الحضور والتقييم من قبل مشرف المركز.
                                          <br>
                                          2)	في حال وجود ملاحظة يلزم المراقب بمراجعة مشرف المركز لمعالجة المشكلة (إن وجد) في موعد أقصاه يوم الخميس الموافق 29/8/1438هـ.
                                          <br>
                                          3)	دخولك على الصفحة واطلاعك على الجدول يعتبر موافقتك على صحة ما ورد فيه مالم يردنا إشعار من مشرف المركز.
                                          <br>
                                          4)	لا يحق للمراقب الاعتراض على المستحقات بعد رفعها حسب ما ورد في هذه الصفحة، واعتمادها من مشرف المركز.

                                          </p>




                                          <br>

                                          <hr>
                                          <h4 style="  color: red"> تعليمات  هامة:</h4>
                                          <p>

                                              1) في حال عدم استجابة المركز يرجى الرد مراسلتنا على vd.elearning@uod.edu.sa في موعد أقصاه نهاية دوام يوم الخميس 29/8/1438هـ.

                                              <br>
                                              2) في حال وجود خطأ في معلوماتك البنكية يرجى تزويدنا من ايميلك الجامعي المسجل لدينا صورة من بطاقة البنك موضحاً عليها رقم الآيبان واسم البنك واسم المستفيد.



                                          </p>




                                          <br>

                                          <hr>




                                              <div class="col-md-6">
                                                  <div>
                                                      <h4 style="color: red">المعلومات الشخصية</h4>
                                                      <h5>اسم المراقب: {{$forms[0]->fname}} {{$forms[0]->faname}} {{$forms[0]->gfaname}} {{$forms[0]->lname}}</h5>
                                                  </div>

                                                  <div>
                                                      <h5>المركز: {{$forms[0]->center_name}} </h5>

                                                  </div>


                                                  <div>
                                                      <h5>الهوية: {{$forms[0]->NID}} </h5>
                                                  </div>
                                              </div>




                                              <div class="col-md-6">
                                                  <div>
                                                      <h4 style="color: red">المعلومات البنكية</h4>
                                                      <h5>اسم صاحب الحساب: {{$forms[0]->account_holder_name}}</h5>
                                                  </div>

                                                  <div>
                                                      <h5>اسم البنك: {{$forms[0]->bank_name}} </h5>

                                                  </div>

                                                  <div >
                                                      <h5>الايبان: {{$forms[0]->IBAN}} </h5>
                                                  </div>
                                                  <br>
                                              </div>

                                          <hr>                                    <br>
                                          <hr>
                                          <h4 style="  color: red">مواعيد المراقبة</h4>
                                          <div class="row">

                                              <div class="col col-md-12">
                                                  <table class="table table-responsive">
                                                      <thead>
                                                      <th>التاريخ الميلادي </th>
                                                      <th>التاريخ الهجري </th>
                                                      <th>مهمة المراقب</th>
                                                      <th>المبنى</th>
                                                      <th>القاعة</th>
                                                      <th>الوقت</th>
                                                      <th style="  color: red">تم التحضير</th>
                                                      </thead>
                                                      <tbody>
                                                      @foreach($forms as $form)
                                                          <tr>

                                                              <td>{{$form->date}}</td>
                                                              <td>{{$form->higri_date}}</td>
                                                              <td>{{trans('testersAllocation.testers_type.'.$form->tester_type)}}</td>

                                                              @if($form == 'NULL' )

                                                                  <td> </td>
                                                                  <td></td>

                                                              @else
                                                                  <td>{{$form->building}}</td>
                                                                  <td>{{$form->room}}</td>

                                                              @endif


                                                              <td>{{$form->time}}</td>
                                                              <td>
                                                                  @foreach($forms2 as $form2)
                                                                      @if($form2->date==$form->date && $form2->NID==$form->NID && $form2->time==$form->time)
                                                                          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                                      @endif
                                                                  @endforeach
                                                              </td>
                                                          </tr>
                                                      @endforeach

                                                  </table>
                                          </div>
                                      </div>

                                          @if(isset($rateAVG))
                                              <hr>
                                                  <div class="row">
                                                      <div class="col col-md-12">
                                                          <h3 style="color: red">   التقييم العام:    {{$rateAVG}} </h3>
                                                      </div>
                                                  </div>
                                              <hr>
                                          @endif

                                          @if($comments)
                                              <div class="row">
                                                  <div class="col col-md-12">
                                                      <table class="table table-responsive">
                                                          <thead>
                                                          <th style="  color: red;font-size: larger">الملاحظات المرصودة على ورقة إجابة الطالب وتحمل رقم المراقب الخاص بك من قبل لجنة التصحيح:</th>
                                                          </thead>
                                                          <tbody>
                                                          @foreach($comments as $form)
                                                              <tr>
                                                                  <td>{{$form}}</td>
                                                              </tr>
                                                          @endforeach
                                                      </table>
                                                  </div>
                                              </div>
                                          @endif

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>











  @endsection