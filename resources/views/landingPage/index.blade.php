@extends('landingPage.layout')
@section('content')

    <!-- Back to top button -->
    <div class="btn-back_to_top">
        <span class="ti-arrow-up"></span>
    </div>

<div  dir="rtl" class="vg-page page-home" id="home" style="background-image: url({{asset('landing/assets/img/cover1.jpg')}})">
    <!-- Navbar -->
    <div dir="rtl" class="navbar navbar-expand-lg navbar-dark sticky" data-offset="500">
        <div  dir="rtl" class="container">
            <!--  <a href="" class="navbar-brand"> الجامعة الاسلامية-غزة</a>-->
            <button dir="rtl" class="navbar-toggler" data-toggle="collapse" data-target="#main-navbar" aria-expanded="true">
                <span dir="rtl" class="ti-menu"></span>
            </button>
            <div  dir="rtl" class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="#home" class="nav-link" data-animate="scrolling">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link" data-animate="scrolling">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a href="#seions" class="nav-link" data-animate="scrolling">الأقسام والتخصصات</a>
                    </li>
                    <li class="nav-item">
                        <a href="#gallery" class="nav-link" data-animate="scrolling">معرض الصور</a>
                    </li>
                    <li class="nav-item">
                        <a href="#ads" class="nav-link" data-animate="scrolling">الأخبار</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link" data-animate="scrolling">تواصل معنا</a>
                    </li>
                </ul>
                <ul class="nav ml-auto">
                    <li class="nav-item">
                        <a href="" class="navbar-brand">معهد التنمية المجتمعية الجامعة الاسلامية-غزة</a>

                    </li>

                </ul>
            </div>
        </div>
    </div> <!-- End Navbar -->
    <!-- Caption header -->
    <div dir="rtl" class="caption-header text-center wow zoomInDown">

        <div class="badge"   >كُنْ مستعدًا لِلنّجاح</div>
        <h1 class="fw-normal">تميز بانضمامك في برامج معهد التنمية المجتمعية</h1>
        <!--
    <h2 class="fw-light mb-4">لا تنتظر الفرصة <b class="fg-theme">بل اصنعها</b> </h2>-->
        <h2 class="fg-theme-red"><span class="typing"></span></h2> <br>
        <div class="login-dropdown">
            <button onclick="window.location.href='{{route('services-portal')}}'" id="login-dropdown-button">بوابة الخدمات</button>

        </div>
    </div>

</div> <!-- End Caption header -->




<div dir="rtl" class="vg-page page-about" id="about">
    <div class="container py-5">
        <div dir="rtl" class="row">
            <div class="col-lg-4 py-3">
                <div class="img-place wow fadeInUp">
                    <img src="{{asset('landing/assets/img/sideimg2.jpg')}}" alt="">
                </div>
            </div>
            <div dir="rtl" class="col-lg-6 offset-lg-1 wow fadeInRight">
                <h1 class="fw-light">معهد التنمية المجتمعية</h1>
                <h3  class="fg-theme-red mb-3">التعليم المستمر</h3>
                <p class="text-muted">انبثق هذا المعهد من خلال عمادة خدمة المجتمع والتعليم المستمر ليقوم بالإشراف على البرامج المهنية المتخصصة والتي تساهم في تنمية وتطوير المجتمع الفلسطيني، حيث يضم المعهد فريقا من الخبراء والمتميزين، ويستعين المعهد في تنفيذ برامجه على الكفاءات والإمكانيات المتوفرة في الجامعة وخارجها، علاوة على ما توفره عمادة خدمة المجتمع والتعليم المستمر من مختبرات وورش عمل ووسائل تعليمية متطورة.الرؤية:نحو شراكة متميزة في عملية بناء قدرات الإنسان الفلسطيني من خلال تعليم أكاديمي بحلة مهنية ونوعية في اختيار البرامج المتخصصة.</p>
                <ul dir="rtl" class="theme-list">
                    <li><b>العنوان:</b> الجامعة الاسلامية / التعليم المستمر</li>
                    <li><b>المدينة:</b> مدينة غزة</li>
                    <li><b>الايميل:</b> cdi@iugaza.edu.ps</li>
                    <li><b>الهاتف:</b>
                        2644400 8 (970+)</li>
                </ul>
                <button onclick="window.location.href='https://cdi.iugaza.edu.ps/enrollment-application/'" class="btn btn-theme-outline">طلب الالتحاق</button>
            </div>
        </div>
    </div>




    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6 wow fadeInRight">
                <h2 class="fw-normal">أهداف المعهد</h2>
                <ul class="timeline mt-4 pr-md-5">
                    <li>
                        <div class="title">أولا</div>
                        <div class="details">
                            <p>
                                تأهيل كوادر تنموية وإدارية ومجتمعية قادرة على المشاركة في عملية البناء وما تتطلبه هذه العملية من خبرات غير تقليدية في مختلف المجالات.

                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">ثانيا</div>
                        <div class="details">
                            <p>
                                رفع كفاءة العاملين من مختلف القطاعات عبر تزويدهم وصقل مهارتهم وقدراتهم الإدارية المختلفة من خلال اطلاعهم على أحدث ما توصلت إليه المعارف المتخصصة الحديثة.

                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">ثالثا</div>
                        <div class="details">
                            <p>
                                تزويد العاملين والكوادر البشرية المختلفة بالأطر والمنهجيات التي تؤهلهم للتعليم والتطوير ذاتيًا.

                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">رابعا</div>
                        <div class="details">
                            <p>
                                تعزيز التعاون بين المؤسسات الأكاديمية الفلسطينية المختلفة من جهة ومؤسسات المجتمع المدني والأهلي المحلي من جهة أخرى لوضع وبناء رؤية تنموية إستراتيجية للحالة الفلسطينية.

                            </p>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-delay="200ms">
                <h2 class="fw-normal">رسائل المعهد</h2>
                <ul class="timeline mt-4 pr-md-5">
                    <li>
                        <div class="title">أولا</div>
                        <div class="details">
                            <p>
                                من منطلق شعورنا بالمسئولية الاجتماعية تجاه المجتمع الفلسطيني ومؤسساته المختلفة، فإن برامج الدبلوم المهنية تعزز مشروع الشراكة في التنمية بين عمادة خدمة المجتمع والتعليم المستمر ومؤسسات المجتمع الفلسطيني وأفراده وهيئاته، من خلال رفدها بالكوادر البشرية المدربة والمؤهلة.


                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">ثانيا</div>
                        <div class="details">
                            <p>
                                تعتبر هذه البرامج إضافة نوعية في مجال البرامج المهنية المتخصصة في التنمية المجتمعية، حيث أنها ومن خلال المساقات المطروحة لقادرة على تأهيل العاملين في هذه المؤسسات إضافة لفتح أفاق العمل للراغبين في العمل في المؤسسات الحكومية والأهلية والقطاع الخاص.

                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="title">ثالثا</div>
                        <div class="details">
                            <p>
                                دعم ورفد المؤسسات الحكومية ومؤسسات المجتمع المدني الفلسطينية بالمصادر البشرية المدربة والمؤهلة للمساهمة في تحقيق وإنجاح برامج التنمية.

                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="vg-page page-service">
    <div class="container">
        <div class="text-center wow fadeInUp">
            <div class="badge badge-subhead">ما يميزنا</div>
        </div>
        <h1 class="fw-normal text-center wow fadeInUp">لماذا تنضم الينا؟</h1>
        <div class="row mt-5">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card card-service wow fadeInUp">
                    <div class="icon">
                        <span class="ti-paint-bucket"></span>
                    </div>
                    <div class="caption">
                        <h3>لصناعة التغيير
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card card-service wow fadeInUp">
                    <div class="icon">
                        <span class="ti-search"></span>
                    </div>
                    <div class="caption">
                        <H3>زيادة الخبرات والرغبة في تعلم المزيد فالمزيد</H3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card card-service wow fadeInUp">
                    <div class="icon">
                        <span class="ti-vector"></span>
                    </div>
                    <div class="caption">
                        <h3>وجود الكوادر المتخصصة في كافة المجالات يسهل تطورها
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card card-service wow fadeInUp">
                    <div class="icon">
                        <span class="ti-desktop"></span>
                    </div>
                    <div class="caption">
                        <h3>العمل وفق خطط تنمية متقنة تنقلنا نحنُ والمجتمع إلى أعلى درجات الرقي
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="vg-page page-funfact" style="background-image: url({{asset('landing/assets/img/bg_banner.jpg')}});">
    <div class="container">
        <div class="row section-counter">
            <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                <h1 class="number" data-number="3">3</h1>
                <h4> <span>التخصصات العملية</span></h4>
            </div>
            <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                <h1 class="number" data-number="23">23</h1>
                <h4><span>برامج الدبلوم</span></h4>
            </div>
            <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                <h1 class="number" data-number="3200">3200</h1>
                <h4><span>خريجي المعهد</span></h4>
            </div>
            <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                <h1 class="number" data-number="276">276</h1>
                <h4><span>المدرسين</span></h4>
            </div>
        </div>
    </div>
</div>

<!--  Majors -->
<div dir="rtl" class="vg-page page-portfolio" id="seions">
    <div class="container">
        <div class="text-center wow fadeInUp">
            <div class="badge badge-subhead">الأقسام والتخصصات</div>
        </div>
        <h1 class="text-center fw-normal wow fadeInUp">أقسام وتخصصات المعهد</h1>
        <div class="filterable-button py-3 wow fadeInUp" data-toggle="selected">
            <button class="btn btn-theme-outline selected" data-filter="*">جميع التخصصات</button>
            <button class="btn btn-theme-outline" data-filter=".apps"> قسم التخصصات التقنية</button>
            <button class="btn btn-theme-outline" data-filter=".medical">قسم التخصصات الطبية</button>
            <button class="btn btn-theme-outline" data-filter=".humanities">قسم العلوم الانسانية</button>

        </div>

        <div class="gridder my-3">
            <div class="grid-item apps wow zoomIn">
                <div  class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/big-data-analysis/"><img src="{{asset('landing/assets/img/Majors/bigData.jfif')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم تحليل البيانات الضخمة</h5>
                        <p>قسم التخصصات التقنية</p>
                    </div>
                </div>

            </div>
            <div class="grid-item apps wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/digital-marketing/"><img src="{{asset('landing/assets/img/Majors/marketing.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم التسويق الرقمي</h5>
                        <p>قسم التخصصات التقنية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item apps ios wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/the-new-media/"><img src="{{asset('landing/assets/img/Majors/media.png')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم الاعلام الجديد</h5>
                        <p>قسم التخصصات التقنية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item apps ui-ux wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/technology-creativity-and-design/"><img src="{{asset('landing/assets/img/Majors/graphic.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم تكنولوجيا التصميم والابداع</h5>
                        <p>قسم التخصصات التقنية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item apps ios wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/computer-maintenance-and-smart-devices/"><img src="{{asset('landing/assets/img/Majors/computer.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم صيانة الحاسوب والأجهزة الذكية</h5>
                        <p>قسم التخصصات التقنية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item apps ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/prevention-safety-and-occupational-health/"><img src="{{asset('landing/assets/img/Majors/safety.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">الوقاية والسلامة والصحة المهنية</h5>
                        <p>قسم التخصصات التقنية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item apps ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/energy-efficient-buildings/"><img src="{{asset('landing/assets/img/Majors/enargy.jpeg')}}" alt="">
                        <div class="img-caption"></div></a>
                    <h5 class="fg-theme">دبلوم المباني الموفرة للطاقة</h5>
                    <p>قسم التخصصات التقنية</p>
                </div>
            </div>
            <div class="grid-item medical ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/critical-care-nursing/"><img src="{{asset('landing/assets/img/Majors/nursing.jfif')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم تمريض الرعاية الحثيثة</h5>
                        <p>قسم التخصصات الطبية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item medical ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/anesthesia-and-intensive-care-doctors/"><img src="{{asset('landing/assets/img/Majors/anesthesia.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم التخدير والعناية المركزة للأطباء</h5>
                        <p>قسم التخصصات الطبية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item medical ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/emergency-medicine-for-physicians/"><img src="{{asset('landing/assets/img/Majors/Emergency.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم طب الطوارىء للأطباء</h5>
                        <p>قسم التخصصات الطبية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item medical ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/obstetrics-and-reproductive-health/"><img src="{{asset('landing/assets/img/Majors/Birth.jfif')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم علم الولادة والصحة الانجابية</h5>
                        <p>قسم التخصصات الطبية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item medical ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/child-health-and-nutrition-for-doctors/"><img src="{{asset('landing/assets/img/Majors/kids.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم صحة وتغذية الطفل للأطباء</h5>
                        <p>قسم التخصصات الطبية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item humanities ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/language-translation/"><img src="{{asset('landing/assets/img/Majors/translate.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم الترجمة اللغوية</h5>
                        <p>قسم تخصصات العلوم الانسانية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item humanities ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/english-for-professional-purposes/"><img src="{{asset('landing/assets/img/Majors/english.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم اللغة الانجليزية لأغراض مهنية</h5>
                        <p>قسم تخصصات العلوم الانسانية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item humanities ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/hebrew-language/"><img src="{{asset('landing/assets/img/Majors/Hebrew.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم اللغة العبرية</h5>
                        <p>قسم تخصصات العلوم الانسانية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item humanities ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/quality-management/"><img src="{{asset('landing/assets/img/Majors/quality.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم ادارة الجودة</h5>
                        <p>قسم تخصصات العلوم الانسانية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item humanities ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/civil-society-organizations-management/"><img src="{{asset('landing/assets/img/Majors/administration.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم ادارة مؤسسات المجتمع المدني</h5>
                        <p>قسم تخصصات العلوم الانسانية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item humanities ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/psychological-support-and-guidance/"><img src="{{asset('landing/assets/img/Majors/psychological.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم الدعم النفسي والارشاد</h5>
                        <p>قسم تخصصات العلوم الانسانية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item humanities ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/foreign-trade-international-business/"><img src="{{asset('landing/assets/img/Majors/Foreign.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم التجارة الخارجية وادارة الأعمال الدولية</h5>
                        <p>قسم تخصصات العلوم الانسانية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item humanities ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/leadership-and-business-applications/"><img src="{{asset('landing/assets/img/Majors/entrepreneurship.png')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم الريادة وتطبيقات الأعمال</h5>
                        <p>قسم تخصصات العلوم الانسانية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item humanities ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/banking-and-finance/"><img src="{{asset('landing/assets/img/Majors/financial.jpeg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم العلوم المالية والمصرفية</h5>
                        <p>قسم تخصصات العلوم الانسانية</p>
                    </div>
                </div>
            </div>
            <div class="grid-item humanities ui-ux wireframes wow zoomIn">
                <div class="img-place">
                    <a href="https://cdi.iugaza.edu.ps/tourism-and-travel/"><img src="{{asset('landing/assets/img/Majors/tourism.jpg')}}" alt=""></a>
                    <div class="img-caption">
                        <h5 class="fg-theme">دبلوم السياحة والسفر</h5>
                        <p>قسم تخصصات العلوم الانسانية</p>
                    </div>
                </div>


            </div>

        </div> <!-- End gridder -->
        <div class="text-center wow fadeInUp">
            <a href="https://cdi.iugaza.edu.ps/departments-and-programs/" class="btn btn-theme">اعرض المزيد</a>
        </div>
    </div>
</div> <!-- End  Majors-->




<br><br>
<!-- Image -->
<div class="text-center">
    <div id="gallery" class="badge badge-subhead wow fadeInUp">الصور</div>
</div>
<h1 class="text-center fw-normal wow fadeInUp"> معرض الصور</h1>

<br>
<div class="vg-page page-client">

    <d class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-3 item">
                <div class="img-place wow fadeInUp">
                    <img src="{{asset('landing/assets/img/IugImg/iud5.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 item">
                <div class="img-place wow fadeInUp">
                    <img src="{{asset('landing/assets/img/IugImg/iug1.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 item">
                <div class="img-place wow fadeInUp">
                    <img src="{{asset('landing/assets/img/IugImg/iug6.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 item">
                <div class="img-place wow fadeInUp">
                    <img src="{{asset('landing/assets/img/IugImg/iug2.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-3 item">
                <div class="img-place wow fadeInUp">
                    <img src="{{asset('landing/assets/img/IugImg/iug4.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 item">
                <div class="img-place wow fadeInUp">
                    <img src="{{asset('landing/assets/img/IugImg/iug3.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 item">
                <div class="img-place wow fadeInUp">
                    <img src="{{asset('landing/assets/img/IugImg/iug7.jpeg')}}" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 item">
                <div class="img-place wow fadeInUp">
                    <img src="{{asset('landing/assets/img/IugImg/iug8.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <br>
        <div class="btn-photo">
            <button  onclick="window.location.href='https://cdi.iugaza.edu.ps/gallery/'" class="btn btn-theme-outline">المزيد من الصور</button>
        </div>
    </d>
</div>

<br><br><br>


<div class="vg-page page-blog" id="blog">
    <div class="container">
        <div class="text-center">
            <div class="badge badge-subhead wow fadeInUp">Blog</div>
        </div>
        <h1 class="text-center fw-normal wow fadeInUp">Latest Post</h1>
        <div class="row post-grid">
            <div class="col-md-6 col-lg-4 wow fadeInUp">
                <div class="card">
                    <div class="img-place">
                        <img src="{{asset('landing/assets/img/work/work-9.jpg')}}" alt="">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)" class="post-category">Technology</a>
                        <a href="#" class="post-title">Invision design forward fund</a>
                        <span class="post-date"><span class="sr-only">Published on</span> May 22, 2018</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp">
                <div class="card">
                    <div class="img-place">
                        <img src="{{asset('landing/assets/img/work/work-6.jpg')}}" alt="">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)" class="post-category">Business</a>
                        <a href="#" class="post-title">Announcing a plan for small teams</a>
                        <span class="post-date"><span class="sr-only">Published on</span> May 22, 2018</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp">
                <div class="card">
                    <div class="img-place">
                        <img src="{{asset('landing/assets/img/work/work-1.jpg')}}" alt="">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)" class="post-category">Design</a>
                        <a href="#" class="post-title">5 basic tips for illustrating</a>
                        <span class="post-date"><span class="sr-only">Published on</span> May 22, 2018</span>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center py-3 wow fadeInUp">
                <a href="blog-fullbar.html" class="btn btn-theme">See All Post</a>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
    <div class="badge badge-subhead wow fadeInUp" id="ads">الأخبار والاعلانات</div>
</div>
<h1 class="text-center fw-normal wow fadeInUp">اخر الاخبار والاعلانات</h1>

<section class="blog section">
    <div class="container">
        <div class="section-header">

        </div>

        <div class="blog-wrapper">
            <div class="blog-wrap">
                <img
                    src="{{asset('landing/img/shapes/points3.png')}}"
                    alt=""
                    class="points points-sq"
                />

                <div class="blog-card">
                    <div class="blog-image">
                        <img src="{{asset('landing/assets/img/cover1.jpg')}}" alt="" />
                    </div>

                    <div class="blog-content">
                        <div class="blog-info">
                            <h5 class="blog-date"> 23 أغسطس، 2021</h5>
                            <h5 class="blog-user"><i class="fas fa-user"></i>المدير </h5>
                        </div>
                        <h3 class="title-sm">تكريم المتفوقين من ذوي الاحتياجات الخاصة</h3>
                        <p class="blog-text">
                            قام معهد التنمية المجتمعية بعمادة خدمة المجتمع والتعليم المستمر بالجامعة الإسلامية، باستقبال الناجحين في الثانوية العامة من الطلبة ذوي الإعاقة السمعية،
                        </p>
                        <button onclick="window.location.href='https://cdi.iugaza.edu.ps/%d9%85%d8%b9%d9%87%d8%af-%d8%a7%d9%84%d8%aa%d9%86%d9%85%d9%8a%d8%a9-%d8%a7%d9%84%d9%85%d8%ac%d8%aa%d9%85%d8%b9%d9%8a%d8%a9-%d8%a8%d8%a7%d9%84%d8%ac%d8%a7%d9%85%d8%b9%d8%a9-%d8%a7%d9%84%d8%a5%d8%b3/'" type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">اقرأ المزيد..</button>
                    </div>
                </div>
            </div>

            <div class="blog-wrap">
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="{{asset('landing/assets/img/cover1.jpg')}}" alt="" />
                    </div>

                    <div class="blog-content">
                        <div class="blog-info">
                            <h5 class="blog-date">16 يناير، 2021
                            </h5>
                            <h5 class="blog-user"><i class="fas fa-user"></i>المدير</h5>
                        </div>
                        <h3 class="title-sm">توقيع اتفاقية بروتوكل تعاون بين الجامعة الإسلامية في غزة وشبكة آرام الإعلامية</h3>
                        <p class="blog-text">
                            وقّعت الجامعة الإسلامية في غزة، الخميس، اتفاقية بروتوكل تعاون وشراكة مع شبكة آرام الإعلامية.
                        </p>
                        <br>
                        <button onclick="window.location.href='https://cdi.iugaza.edu.ps/%d8%aa%d9%88%d9%82%d9%8a%d8%b9-%d8%a7%d8%aa%d9%81%d8%a7%d9%82%d9%8a%d8%a9-%d8%a8%d8%b1%d9%88%d8%aa%d9%88%d9%83%d9%84-%d8%aa%d8%b9%d8%a7%d9%88%d9%86-%d8%a8%d9%8a%d9%86-%d8%a7%d9%84%d8%ac%d8%a7%d9%85-2/'" type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">اقرأ المزيد..</button>
                    </div>
                </div>
            </div>


            <div class="blog-wrap">
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="{{asset('landing/assets/img/cover1.jpg')}}" alt="" />
                    </div>

                    <div class="blog-content">
                        <div class="blog-info">
                            <h5 class="blog-date">16 يناير، 2021</h5>
                            <h5 class="blog-user"><i class="fas fa-user"></i>المدير</h5>
                        </div>
                        <h3 class="title-sm">عقد امتحان قبول لطلبة دبلوم الترجمة_اللغوية.</h3>
                        <p class="blog-text">
                            قام معهد التنمية المجتمعية بالجامعة الإسلامية بغزة، بعقد امتحان خاص بالطلبة الجدد المسجلين في دبلوم الترجمة اللغوية
                        </p>
                        <br><br>
                        <button onclick="window.location.href='https://cdi.iugaza.edu.ps/%d8%aa%d9%88%d9%82%d9%8a%d8%b9-%d8%a7%d8%aa%d9%81%d8%a7%d9%82%d9%8a%d8%a9-%d8%a8%d8%b1%d9%88%d8%aa%d9%88%d9%83%d9%84-%d8%aa%d8%b9%d8%a7%d9%88%d9%86-%d8%a8%d9%8a%d9%86-%d8%a7%d9%84%d8%ac%d8%a7%d9%85/'" type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">اقرأ المزيد..</button>
                    </div>
                </div>
            </div>

            <div class="blog-wrap">
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="{{asset('landing/assets/img/cover1.jpg')}}" alt="" />
                    </div>

                    <div class="blog-content">
                        <div class="blog-info">
                            <h5 class="blog-date">
                                يوليو 5, 2021</h5>
                            <h5 class="blog-user"><i class="fas fa-user"></i>المدير</h5>
                        </div>
                        <h3 class="title-sm">تكريم المعلمة وصال كراز الحاصلة على جائزة مؤسسة التعاون</h3>
                        <p class="blog-text">
                            كرمت الجامعة الإسلامية بغزة المعلمة المتميزة وصال كراز- الخريجة من دبلوم تكنولوجيا التصميم والإبداع في معهد التنمية المجتمعية ضمن الدفعة الأولى للطلبة الصم
                            <button onclick="window.location.href='https://cdi.iugaza.edu.ps/%d8%a7%d9%84%d8%ac%d8%a7%d9%85%d8%b9%d8%a9%d8%a7%d9%84%d8%a5%d8%b3%d9%84%d8%a7%d9%85%d9%8a%d8%a9-%d8%aa%d9%83%d8%b1%d9%85-%d8%a7%d9%84%d9%85%d8%b9%d9%84%d9%85%d8%a9-%d9%88%d8%b5%d8%a7%d9%84-%d9%83/'" type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">اقرأ المزيد..</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>


<!-- Contact -->
<div class="vg-page page-contact" id="contact">
    <div class="container-fluid">
        <div class="text-center wow fadeInUp">
            <div class="badge badge-subhead">التواصل</div>
        </div>
        <h1 class="text-center fw-normal wow fadeInUp">ابقى على تواصل</h1>
        <div class="row py-5">
            <div class="col-lg-7 px-0 pr-lg-3 wow zoomIn">
                <div class="vg-maps">
                    <div id="google-maps" style="width: 100%; height: 100%;"></div>
                </div>
            </div>
            <div class="col-lg-5">
                <form class="vg-contact-form">
                    <div class="form-row">
                        <div class="col-12 mt-3 wow fadeInUp">
                            <input class="form-control" type="text" name="Name" placeholder="اسمك">
                        </div>
                        <div class="col-6 mt-3 wow fadeInUp">
                            <input class="form-control" type="text" name="Email" placeholder="عنوان البريد الالكتروني">
                        </div>
                        <div class="col-6 mt-3 wow fadeInUp">
                            <input class="form-control" type="text" name="Subject" placeholder="العنوان">
                        </div>
                        <div class="col-12 mt-3 wow fadeInUp">
                            <textarea class="form-control" name="Message" rows="6" placeholder="أكتب رسالتك هنا.."></textarea>
                        </div>
                        <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- End Contact -->

<!-- Footer -->
<div class="vg-footer">
    <h1 class="text-center">معهد التنمية المجتمعية الجامعة الاسلامية-غزة</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 py-3">
                <div class="footer-info">
                    <p>أين تجدنا (العنوان)</p>
                    <hr class="divider">
                    <p class="fs-large fg-white">الجامعة الاسلامية-غزة-
                        مبنى التعليم المستمر - قطاع غزة - فلسطين المحتلة
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 py-3">
                <div class="float-lg-right">
                    <p>تابعنا على مواقع التواصل</p>
                    <hr class="divider">
                    <ul class="list-unstyled social-icons">
                        <li><a href="https://www.facebook.com/CommunityDI/"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/csced_iug"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/cdi_iug/"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com/user/mediaiug/featured"><i class="fab fa-youtube"></i></a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 py-3">
                <div class="float-lg-right">
                    <p>تواصل معنا</p>
                    <hr class="divider">
                    <ul class="list-unstyled">
                        <li>cdi@iugaza.edu.ps</li>
                        <li>
                            2644400 8 (970+)
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-12 mb-3">
                <h3 class="fw-normal text-center">الاشتراك</h3>
            </div>
            <div class="col-lg-6">
                <form class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="عنوان البريد الالكتروني">
                        <input type="submit" class="btn btn-theme no-shadow" value="الاشتراك">
                    </div>
                </form>
            </div>
            <div class="col-12">
                <p class="text-center mb-0 mt-4">حقوق النشر &copy;2023. جميع الحقوق محفوظة CDI <span class="ti-heart fg-theme-red"></span> </p>
            </div>
        </div>
    </div>
</div> <!-- End footer -->
@endsection
