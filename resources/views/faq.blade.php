@extends('layouts.app')
@section('content')
<div class="info">
  <section class="body">
      <div class="col-md-9 col-offset-1">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <h2>• الشهادات:- </h2>
                  </div>
                  <div class="col-md-10">
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="heading1">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseExample">
                                    1- هل الشهادات معتمدة ؟
                                    </a>
                                  </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading1">
                                  <div class="panel-body">
                                      <h3>نعم, في حال كانت الدورة تقدم شهادة.</h3>
                                  </div>
                              </div>
                          </div>

                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="heading2">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#co1" aria-expanded="false" aria-controls="collapseExample">
                                    2- كيف يتم الحصول على الشهادة؟
                                    </a>
                                  </h4>
                              </div>
                              <div id="co1" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading2">
                                  <div class="panel-body">
                                      <h3>يتم إرسالها إلى البريد الالكتروني الخاص بالطالب/ ة. </h3>
                                  </div>
                              </div>
                          </div>

                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="heading3">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#co2" aria-expanded="false" aria-controls="collapseExample">
                                    3- كيف يمكن معرفة ان الدورة ستقدم شهادة نهاية الدورة ام لا؟
                                    </a>
                                  </h4>
                              </div>
                              <div id="co2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading3">
                                  <div class="panel-body">
                                      <h3>تتضمن كل دورة تدريبية وصف للدورة بما في ذلك معرفة إذا كانت الدورة ستقدم شهادة أم لا .  </h3>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 text-center">
                      <h2>• الدورات:-</h2>
                  </div>

                  <div class="col-md-10">
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="heading4">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#cou1" aria-expanded="false" aria-controls="collapseExample">
                                    1- كم عدد المواد التي يمكن الالتحاق بها ؟
                                    </a>
                                  </h4>
                              </div>
                              <div id="cou1" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading4">
                                  <div class="panel-body">
                                      <h3>ليس هناك عدد محدد للدورات التدريبية التي يمكن الالتحاق بها . </h3>
                                  </div>
                              </div>
                          </div>

                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="heading5">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#cou2" aria-expanded="false" aria-controls="collapseExample">
                                    2- هل يمكن لغير طلاب الجامعة أو الخريجين الالتحاق بالدورات ؟
                                    </a>
                                  </h4>
                              </div>
                              <div id="cou2" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading5">
                                  <div class="panel-body">
                                      <h3>يجب ان يكون الملتحق/ة من منسوبي الجامعة وملتحقيها, لكن يمكنك تصفح الدورات التدريبية وتحميل محتوياتها والتعليق وإرسال الرسائل . </h3>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </section>
</div>
@endsection