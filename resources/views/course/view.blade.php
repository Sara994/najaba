@extends('layouts.app')

@section('content')

<section class="header-course">
  <div class="ccontainer">
    <div class="row">
      <div class="col-md-12">
        <img src="../images/lecu6.jpg" class="img-responsive center-block img-circle" width="200px" height="200px">
      </div>
      <div class="col-md-12 text-center">
        <div class="section-title">
          <h2>كتابة التقارير الاعلامية</h2>
        </div>
      </div>
    </div>
  </div>
</section>
</header>


<section >
  <div class="ccontainer">
    <div class="row">
      <div class="col-md-7">
        <nav class="navbar  navbar-default">
          <ul class="nav navbar-nav">
            <li><a href="course_deteles.html" >الوصف</a></li>
             <li><a href="cours_subject.html" class="active">المحتوى</a></li>
           <!--   <li><a href="#">التقيم</a></li>-->
               <li><a href="commnt.html">التعليقات</a></li>
          </ul>
        </nav>
        <div class="col-md-9">

         <div class="col-md-12 text-center">
           <h4>المحتوى : </h4>
         </div>
          <div class="col-md-8">
            <ul>
              <li><a href="#">الدرس الاول </a></li>
                <li><a href="#">االدرس الثاني </a></li>
                  <li><a href="#">الدرس الثالث </a></li>
                    <li><a href="#">الدرس الرابع </a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-headeing">
              <!--<video src="></video>-->
              <iframe width="400" height="315" src="https://www.youtube.com/embed/MsW9wvi3uAg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            <div class="panel-body">
              <a href="#" class="btn btn-info" data-toggle="modal" data-target="#Login">تسجيل</a>
               <div class="rank">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <ul class="deteals">
               <ul class="deteals">
                <li><i class="fas fa-hourglass-start"></i> الزمان :7:30pm </li>
                <li><i class="fas fa-location-arrow"></i> المكان : ق5 مبنى علوم الحاسب </li>

              </ul>
              <ul class="deteals ">
                <li><i class="fas fa-calendar-alt"></i> المده :ثلاث ايام        </li>
                <li class="fla"><i class="fas fa-users"></i> المفاعد: 35 </li>
              </ul>
            </div>
              </ul>
            </div>

            <div class="panel-body">
              <div class="col-md-3">
                <img src="../images/man.png"  class="img-responsive" width="100px" height="100px">
              </div>
              <div class="text-detels ">
                <h4>احمد علي <a href="#"><i class="fas fa-envelope-square"></i></a></div></h4>
                 <p>خريج كلية الاعلام و الاتصال - جامعة الامام محمد بن سعود الاسلامية.</p>

              <div></div>
            </div>

            <div class="panel-footer">

                <h3>#</h3>

                <h4>الثقافه و الفن</h4>


                <span>شارك الدروس </span>

                 <i class="fab fa-twitter"></i>
                 <i class="fab fa-facebook-f"></i>
            </div>

            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="col-md-12">

        </div>
      </div>
    </div>
  </div>
</section>

<!-- pop windo for Login -->
<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">تسجيل في الدورة  </h4>
      </div>
      <div class="modal-body">

          <img src="../images/logo.png" width="150px" height="150px" class="center-block">
            <form class="form-horizontal">
             <div class="form-group">
               <div class="col-md-8 col-md-offset-2">
                  <input type="number" name="" placeholder="االسجل المدني  " class="form-control">
               </div>
             </div>
             <div class="form-group">
               <div class="col-md-8 col-md-offset-2">
                  <input type="number" name="" placeholder="السجل الاكاديمي" class="form-control">
               </div>
             </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        <button type="button" class="btn btn-primary">تسجيل دخول </button>
      </div>
    </div>
  </div>
</div>



@endsection
