@extends('layouts.app')
@section('content')
<div class="col-md-9 col-offset-1">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2>• الشهادات:- </h2>
          </div>
          <div class="col-md-10">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseExample">
                      1- هل الشهادات معتمدة ؟
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <h3>نعم, في حال كانت الدورة تقدم شهادة.</h3>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#co1" aria-expanded="false" aria-controls="collapseExample">
                      2- كيف يتم الحصول على الشهادة؟
                    </a>
                  </h4>
                </div>
                <div id="co1" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <h3>يتم إرسالها إلى البريد الالكتروني الخاص بالطالب/ ة. </h3>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#co2" aria-expanded="false" aria-controls="collapseExample">
                      3- كيف يمكن معرفة ان الدورة ستقدم شهادة نهاية الدورة ام لا؟
                    </a>
                  </h4>
                </div>
                <div id="co2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <h3>تتضمن كل دورة تدريبية وصف للدورة بما في ذلك معرفة إذا كانت الدورة ستقدم شهادة أم لا . </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-center">
            <h1>• الدورات:-</h1>
          </div>

          <div class="col-md-10">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#cou1" aria-expanded="false" aria-controls="collapseExample">
                      1- كم عدد المواد التي يمكن الالتحاق بها ؟
                    </a>
                  </h4>
                </div>
                <div id="cou1" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <h3>ليس هناك عدد محدد للدورات التدريبية التي يمكن الالتحاق بها . </h3>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#cou2" aria-expanded="false" aria-controls="collapseExample">
                      2- هل يمكن لغير طلاب الجامعة أو الخريجين الالتحاق بالدورات ؟
                    </a>
                  </h4>
                </div>
                <div id="cou2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <h3>يجب ان يكون الملتحق/ة من منسوبي الجامعة وملتحقيها, لكن يمكنك تصفح الدورات التدريبية وتحميل محتوياتها
                      والتعليق وإرسال الرسائل . </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection