<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <title>{{ $profile->first_name ?? 'Profile' }} -  profile</title>

    <!-- Global stylesheets -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/devicons/css/devicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none  mx-0 px-0"><img src="img/logo-white.png" alt="" class="img-fluid"></span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ $profile ? asset('storage/'.$profile->profile_image) : asset('img/profile.jpg') }}" alt="">
        </span>
      </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#awards">Awards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid p-0">

    <!--====================================================
                        ABOUT
    ======================================================-->
      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
          <div class="my-auto" >
              <img src="img/logo-s.png" class="img-fluid mb-3" alt="">
              <h1 class="mb-0">{{ $profile ? $profile->first_name : 'Johndon' }}
                <span class="text-primary">{{ $profile ? $profile->last_name : 'Bonsen' }}</span>
              </h1>
              <div class="subheading mb-5">{{ $profile ? $profile->title : 'THE NEXT BIG IDEA IS WAITING FOR ITS NEXT BIG CHANGER WITH THEMSBIT' }}
              </div>
              <p class="mb-5" style="max-width: 500px;" >{{ $profile ? $profile->bio : 'I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews.' }}</p>
              <ul class="list-inline list-social-icons mb-0">
                  @if($profile && $profile->facebook_url)
                  <li class="list-inline-item">
                      <a href="{{ $profile->facebook_url }}">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
                  </li>
                  @endif
                  @if($profile && $profile->twitter_url)
                  <li class="list-inline-item">
                      <a href="{{ $profile->twitter_url }}">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
                  </li>
                  @endif
                  @if($profile && $profile->linkedin_url)
                  <li class="list-inline-item">
                      <a href="{{ $profile->linkedin_url }}">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
                  </li>
                  @endif
                  @if($profile && $profile->github_url)
                  <li class="list-inline-item">
                      <a href="{{ $profile->github_url }}">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
                  </li>
                  @endif
              </ul>
          </div>
      </section>    <!--====================================================
                        EXPERIENCE
    ======================================================-->
      <section class="resume-section p-3 p-lg-5 " id="experience">
          <div class="row my-auto">
              <div class="col-12">
                <h2 class="  text-center">Experience</h2>
                <div class="mb-5 heading-border"></div>
              </div>
              @forelse($experiences as $experience)
              <div class="resume-item col-md-6 col-sm-12 " >
                <div class="card mx-0 p-4 mb-5" style="border-color: {{ $experience->color }}; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                  <div class=" resume-content mr-auto">
                      <h4 class="mb-3"><i class="fa {{ $experience->icon }} mr-3" style="color: {{ $experience->color }};"></i> {{ $experience->title }}</h4>
                      <p>{{ $experience->description }}</p>
                  </div>
                  <div class="resume-date text-md-right">
                      <span class="text-primary">{{ $experience->start_date->format('F Y') }} - {{ $experience->is_current ? 'Present' : $experience->end_date->format('F Y') }}</span>
                  </div>
                </div>
              </div>
              @empty
              <div class="col-12">
                <p class="text-center text-muted">لا توجد خبرات مضافة حتى الآن</p>
              </div>
              @endforelse
          </div>
      </section>

    <!--====================================================
                        PORTFOLIO
    ======================================================-->
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="portfolio">
          <div class="row my-auto">
              <div class="col-12">
                <h2 class="  text-center">Portfolio</h2>
                <div class="mb-5 heading-border"></div>
              </div>
              <div class="col-md-12">
                <div class="port-head-cont">
                  <button class="btn btn-general btn-green filter-b" data-filter="all">All</button>
                  <button class="btn btn-general btn-green filter-b" data-filter="consulting">Web Design</button>
                  <button class="btn btn-general btn-green filter-b" data-filter="finance">Mobile Apps</button>
                  <button class="btn btn-general btn-green filter-b" data-filter="marketing">Graphics Design</button>
                </div>
              </div>
          </div>
          <div class="row my-auto">
              @forelse($portfolios as $index => $portfolio)
              <div class="col-sm-4 portfolio-item filter {{ $portfolio->category }}">
                  <a class="portfolio-link" href="#portfolioModal{{ $loop->iteration }}" data-toggle="modal">
                      <div class="caption-port">
                          <div class="caption-port-content">
                              <i class="fa fa-search-plus fa-3x"></i>
                          </div>
                      </div>
                      <img class="img-fluid" src="{{ asset('storage/'.$portfolio->image) }}" alt="{{ $portfolio->title }}">
                  </a>
              </div>
              @empty
              <div class="col-12">
                <p class="text-center text-muted">لا توجد مشاريع مضافة حتى الآن</p>
              </div>
              @endforelse
          </div>
      </section>

    <!--====================================================
                        SKILLS
    ======================================================-->
      <section class=" d-flex flex-column" id="skills">
         <div class="p-lg-5 p-3 skill-cover">
          <h3 class="text-center text-white">Coding Skills</h3>
          <div class="row text-center my-auto ">
              @forelse($skills as $skill)
              <div class="col-md-3 col-sm-6">
                  <div class="skill-item">
                      <i class="fa {{ $skill->icon }} fa-5x"></i>
                      <h2><span class="counter"> {{ $skill->percentage }} </span><span>%</span></h2>
                      <p>{{ $skill->name }}</p>
                  </div>
              </div>
              @empty
              <div class="col-12">
                <p class="text-center text-muted text-white">لا توجد مهارات مضافة حتى الآن</p>
              </div>
              @endforelse
          </div>
         </div>
      </section>

    <!--====================================================
                           AWARDS
    ======================================================-->
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
          <div class="row my-auto">
              <div class="col-12">
                <h2 class="  text-center">Awards</h2>
                <div class="mb-5 heading-border"></div>
              </div>
              <div class="main-award" id="award-box">
                  @forelse($awards as $award)
                  <div class="award">
                      <div class="award-icon"></div>
                      <div class="award-content">
                          <span class="date">{{ $award->start_date->format('M Y') }} @if($award->end_date)- {{ $award->end_date->format('M Y') }}@endif</span>
                          <h5 class="title">{{ $award->title }}</h5>
                          <p class="description">
                              {{ $award->description }}
                          </p>
                      </div>
                  </div>
                  @empty
                  <p class="text-center text-muted w-100">لا توجد جوائز مضافة حتى الآن</p>
                  @endforelse
              </div>
          </div>
      </section>

    <!--====================================================
                          CONTACT
    ======================================================-->
      <section class="resume-section p-3 p-lg-5 d-flex flex-column">
          <div class="row my-auto" id="contact">
            <div class="col-md-8">
              <div class="contact-cont">
                <h3>CONTACT Us</h3>
                <div class="heading-border-light"></div>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.</p>
              </div>
              <div class="row con-form">
                <div class="col-md-12">
                  <input type="text" name="full-name" placeholder="Full Name" class="form-control">
                </div>
                <div class="col-md-12">
                  <input type="text" name="email" placeholder="Email Id" class="form-control">
                </div>
                <div class="col-md-12">
                  <input type="text" name="subject" placeholder="Subject" class="form-control">
                </div>
                <div class="col-md-12"><textarea name="" id=""></textarea></div>
                <div class="col-md-12 sub-but"><button class="btn btn-general btn-white" role="button">Send</button></div>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 mt-5">
              <div class="contact-cont2">
                <div class="contact-add contact-box-desc">
                  <h3><i class="fa fa-map-marker cl-atlantis fa-2x"></i> Address</h3>
                  <p>{{ $profile ? $profile->address : '25, Dist town Street, Logn California, US' }} <br></p>
                </div>
                <div class="contact-phone contact-side-desc contact-box-desc">
                  <h3><i class="fa fa-phone cl-atlantis fa-2x"></i> Phone</h3>
                  <p>{{ $profile ? $profile->phone : '800 123 3456' }}</p>
                </div>
                <div class="contact-mail contact-side-desc contact-box-desc">
                  <h3><i class="fa fa-envelope-o cl-atlantis fa-2x"></i> Email</h3>
                <address class="address-details-f">
                  Email: <a href="mailto:{{ $profile ? $profile->email : 'info@themsbit.com' }}" class="">{{ $profile ? $profile->email : 'info@themsbit.com' }}</a>
                </address>
                <ul class="list-inline social-icon-f top-data">
                  @if($profile && $profile->facebook_url)
                  <li><a href="{{ $profile->facebook_url }}" target="_empty"><i class="fa top-social fa-facebook" style="color: #4267b2; border-color:#4267b2;"></i></a></li>
                  @endif
                  @if($profile && $profile->twitter_url)
                  <li><a href="{{ $profile->twitter_url }}" target="_empty"><i class="fa top-social fa-twitter" style="color: #4AB3F4; border-color:#4AB3F4;"></i></a></li>
                  @endif
                </ul>
                </div>
              </div>
            </div>
          </div>
      </section>

      <section class=" d-flex flex-column" id="maps">
        <div id="map">
          <div class="map-responsive">
             <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6030.418742494061!2d-111.34563870463673!3d26.01036670629853!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1471908546569" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </section>


    </div>


<!--====================================================
                    PORTFOLIO MODALS
======================================================-->
    @forelse($portfolios as $index => $portfolio)
    <div class="portfolio-modal modal fade" id="portfolioModal{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-hidden="true" >
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="close-modal" data-dismiss="modal">
                  <div class="lr">
                      <div class="rl"></div>
                  </div>
              </div>
              <div class="container">
                  <div class="row">
                          <div class="modal-body">
                              <div class="title-bar">
                                <div class="col-md-12">
                                  <h2 class="text-center">{{ $portfolio->title }}</h2>
                                  <div class="heading-border"></div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <img class="img-fluid img-centered" src="{{ asset('storage/'.$portfolio->image) }}" alt="{{ $portfolio->title }}">
                                </div>
                                <div class="col-md-6">
                                  <p>{{ $portfolio->description }}</p>
                                  <ul class="list-inline item-details">
                                      <li>Client:
                                          <strong>
                                            <a href="#">{{ $portfolio->client }}</a>
                                          </strong>
                                      </li>
                                      <li>Date:
                                          <strong>
                                            <a href="#">{{ $portfolio->project_date->format('F Y') }}</a>
                                          </strong>
                                      </li>
                                      <li>Service:
                                          <strong>
                                            <a href="#">{{ $portfolio->service }}</a>
                                          </strong>
                                      </li>
                                  </ul>
                                  <button class="btn btn-general btn-white" type="button" data-dismiss="modal">
                                      <i class="fa fa-times"></i> Close
                                  </button>
                              </div>
                            </div>
                          </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    @empty
    @endforelse


    <!-- Global javascript -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/counter/jquery.waypoints.min.js"></script>
    <script src="js/counter/jquery.counterup.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(document).ready(function(){

        $(".filter-b").click(function(){
            var value = $(this).attr('data-filter');
            if(value == "all")
            {
                $('.filter').show('1000');
            }
            else
            {
                $(".filter").not('.'+value).hide('3000');
                $('.filter').filter('.'+value).show('3000');
            }
        });

        if ($(".filter-b").removeClass("active")) {
          $(this).removeClass("active");
        }
        $(this).addClass("active");
        });

        // SKILLS
        $(function () {
            $('.counter').counterUp({
                delay: 10,
                time: 2000
            });

        });
    </script>
</body>

</html>
