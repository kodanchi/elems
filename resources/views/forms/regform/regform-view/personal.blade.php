<div class="col col-md-6">
    <h4>{{trans('regform.general_details')}}</h4>
    <hr>
    <p>{{trans('regform.name')}}: {{$form->fname." ".$form->faname." ".$form->gfaname." ".$form->lname}}</p>
    <p>{{trans('regform.NID')}}: {{$form->NID}}</p>
    <p>{{trans('regform.birth_date')}}: {{$form->birth_date}}</p>
    <p>{{trans('regform.nationality')}} : {{$form->nationality}}</p>
    <p>{{trans('regform.phone')}} : 0{{$form->phone}}</p>
    <p>{{trans('regform.cellphone')}} : 0{{$form->cellphone}}</p>
    <p>{{trans('regform.email')}} : {{$form->email}}</p>
    <br/>
</div>