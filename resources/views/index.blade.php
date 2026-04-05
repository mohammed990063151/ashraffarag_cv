<!--
author: Boostraptheme
author URL: https://boostraptheme.com
License: Creative Commons Attribution 4.0 Unported
License URL: https://creativecommons.org/licenses/by/4.0/
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    @php
        $profilePhoto = ($profile && $profile->profile_image) ? asset('storage/'.$profile->profile_image) : null;
    @endphp
    <title>{{ $profile ? $profile->first_name.' '.$profile->last_name : 'Portfolio' }}</title>

    <!-- Global stylesheets -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="{{ asset('css/devicons/css/devicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
    /* منع التمرير الأفقي وقصّ المحتوى على الهاتف */
    html { overflow-x: hidden; -webkit-text-size-adjust: 100%; }
    body { overflow-x: hidden; width: 100%; max-width: 100vw; position: relative; }
    .site-main-wrap { max-width: 100%; }

    #about {
    @if($profilePhoto)
    background-image: url("{{ $profilePhoto }}");
    @else
    background: linear-gradient(135deg, #1a252f 0%, #0d47a1 100%);
    @endif
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    min-height: 100vh;
    }
    /* شريط التنقل — الجوال */
    @media (max-width: 991.98px) {
        #sideNav.navbar {
            padding: 0.6rem max(0.75rem, env(safe-area-inset-left)) 0.6rem max(0.75rem, env(safe-area-inset-right));
            flex-wrap: wrap;
            align-items: center;
            box-shadow: 0 4px 24px rgba(0,0,0,.18);
            z-index: 1030;
        }
        #sideNav .navbar-brand {
            flex: 1 1 auto;
            min-width: 0;
            margin-right: 0.75rem;
            padding: 0.25rem 0;
        }
        #sideNav .mobile-nav-avatar {
            width: 42px;
            height: 42px;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,.35);
            flex-shrink: 0;
        }
        #sideNav .mobile-nav-title {
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            max-width: calc(100vw - 140px);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        #sideNav .navbar-toggler {
            flex-shrink: 0;
            border: 2px solid rgba(255,255,255,.55);
            border-radius: 10px;
            padding: 0.4rem 0.55rem;
            transition: background 0.2s, border-color 0.2s;
        }
        #sideNav .navbar-toggler:hover,
        #sideNav .navbar-toggler:focus {
            background: rgba(255,255,255,.12);
            outline: none;
        }
        #sideNav .navbar-toggler-icon {
            width: 1.35em;
            height: 1.35em;
        }
        #sideNav .navbar-collapse {
            flex-basis: 100%;
            width: 100%;
            margin-top: 0.65rem;
        }
        #sideNav .navbar-collapse .navbar-nav {
            width: 100%;
            padding: 0.35rem 0;
            background: rgba(0,0,0,.18);
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,.14);
            box-shadow: inset 0 1px 0 rgba(255,255,255,.08);
            overflow: hidden;
        }
        #sideNav .navbar-nav .nav-item .nav-link {
            padding: 0.95rem 1.15rem !important;
            border-bottom: 1px solid rgba(255,255,255,.1);
            font-size: 0.95rem;
            letter-spacing: 0.06em;
            transition: background 0.15s ease;
        }
        #sideNav .navbar-nav .nav-item:last-child .nav-link {
            border-bottom: none;
        }
        #sideNav .navbar-nav .nav-link:hover,
        #sideNav .navbar-nav .nav-link:focus {
            background: rgba(255,255,255,.1);
            color: #fff !important;
        }
    }
    /* Responsive typography & layout */
    @media (max-width: 991px) {
        h1 { font-size: clamp(2rem, 7vw, 3.25rem) !important; line-height: 1.15 !important; }
        h2 { font-size: clamp(1.6rem, 5.5vw, 2.35rem) !important; }
        h3 { font-size: clamp(1.25rem, 4vw, 1.85rem) !important; }
        .subheading { font-size: 1.05rem !important; word-wrap: break-word; }
        .resume-section { padding-top: 3rem !important; padding-bottom: 3rem !important; }
        #contact .contact-cont h3 { font-size: clamp(1.6rem, 5vw, 2.25rem) !important; }
    }
    @media (max-width: 575px) {
        .con-form input { margin-top: 1rem !important; }
        .con-form textarea { margin: 1rem 0 !important; height: 160px !important; }
    }
    .contact-form-card { background: rgba(255,255,255,.06); border-radius: 12px; padding: 1.25rem; }
    #maps .map-responsive { padding-bottom: min(56%, 420px); }
    #contact .contact-cont p,
    #contact .contact-box-desc p { word-wrap: break-word; overflow-wrap: anywhere; }
    </style>

    
</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger d-flex d-lg-block align-items-center" href="#page-top">
            <span class="d-flex d-lg-none align-items-center">
                <img class="rounded-circle mobile-nav-avatar" src="{{ $profilePhoto ?? 'https://ui-avatars.com/api/?name=' . urlencode($profile ? trim($profile->first_name.' '.$profile->last_name) : 'Portfolio') . '&size=256&background=2196f3&color=fff' }}" alt="">
                <span class="mobile-nav-title text-white ml-2">{{ $profile ? $profile->first_name : 'Portfolio' }}</span>
            </span>
            <span class="d-none d-lg-flex flex-column w-100 align-items-center">
                <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ $profilePhoto ?? 'https://ui-avatars.com/api/?name=' . urlencode($profile ? trim($profile->first_name.' '.$profile->last_name) : 'Portfolio') . '&size=256&background=2196f3&color=fff' }}" alt="">
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="فتح القائمة">
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

    <div class="container-fluid px-3 px-sm-4 px-lg-5 site-main-wrap">

        <!--====================================================
                        ABOUT
    ======================================================-->
   
        <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
            <div class="my-auto">
                {{-- <img src="{{ asset('ashraffarag_cv/storage/app/public/' . $profile->logo) }}" alt="Logo"  style="
    max-height: 50px !important;
    width: auto !important;
"> --}}

                <div class="pt-5 mt-lg-4"></div>
                <h1 class="mb-0">{{ $profile ? $profile->first_name : 'اشرف' }}
                    <span class="text-primary">{{ $profile ? $profile->last_name : 'Bonsen' }}</span>
                </h1>
                <div class="subheading mb-5">{{ $profile ? $profile->title : 'THE NEXT BIG IDEA IS WAITING FOR ITS NEXT BIG CHANGER WITH THEMSBIT' }}
                    {{-- <a href="#">THEMSBIT</a> --}}
                </div>
                <p class="mb-5" style="max-width: 500px;">{{ $profile ? $profile->bio : 'I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews.' }}.</p>
                {{-- <ul class="list-inline list-social-icons mb-0">
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                        </a>
                    </li>
                </ul> --}}
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
        </section>

        <!--====================================================
                        EXPERIENCE
    ======================================================-->
        <section class="resume-section p-3 p-lg-5 " id="experience">
            <div class="row my-auto">
                <div class="col-12">
                    <h2 class="  text-center">Experience</h2>
                    <div class="mb-5 heading-border"></div>
                </div>
                {{-- <div class="resume-item col-md-6 col-sm-12 ">
                    <div class="card mx-0 p-4 mb-5" style="border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                        <div class=" resume-content mr-auto">
                            <h4 class="mb-3"><i class="fa fa-globe mr-3 text-info"></i> Senior Web Developer</h4>
                            <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close
                                the loop on focusing solely on the bottom line.</p>
                        </div>
                        <div class="resume-date text-md-right">
                            <span class="text-primary">March 2019 - Present</span>
                        </div>
                    </div>
                </div>
                <div class="resume-item col-md-6 col-sm-12">
                    <div class="card mx-0 p-4 mb-5" style="border-color: #ffc107; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                        <div class="resume-content mr-auto">
                            <h4 class="mb-3"><i class="fa fa-laptop mr-3 text-warning"></i> Web Developer</h4>
                            <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close
                                the loop on focusing solely on the bottom line.</p>
                        </div>
                        <div class="resume-date text-md-right">
                            <span class="text-primary">December 2018 - March 2019</span>
                        </div>
                    </div>
                </div>
                <div class="resume-item col-md-6 col-sm-12">
                    <div class="card mx-0 p-4 mb-5" style="border-color: #28a745; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                        <div class="resume-content mr-auto">
                            <h4 class="mb-3"><i class="fa fa-camera mr-3 text-success"></i> Junior Web Designer</h4>
                            <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close
                                the loop on focusing solely on the bottom line.</p>
                        </div>
                        <div class="resume-date text-md-right">
                            <span class="text-primary">July 2017 - December 2018</span>
                        </div>
                    </div>
                </div>
                <div class="resume-item col-md-6 col-sm-12">
                    <div class="card mx-0 p-4 mb-5" style="border-color: #2196f3; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                        <div class="resume-content mr-auto">
                            <h4 class="mb-3"><i class="fa fa-area-chart mr-3 text-primary"></i> Web Design Intern</h4>
                            <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close
                                the loop on focusing solely on the bottom line.</p>
                        </div>
                        <div class="resume-date text-md-right">
                            <span class="text-primary">September 2018 - June 2019</span>
                        </div>
                    </div>
                </div> --}}
                 @forelse($experiences as $experience)
              <div class="resume-item col-md-6 col-sm-12 " >
                <div class="card mx-0 p-4 mb-5" style="border-color: {{ $experience->color }}; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                  <div class=" resume-content mr-auto">
                      <h4 class="mb-3"><i class="{{ $experience->icon }} mr-3" style="color: {{ $experience->color }};"></i> {{ $experience->title }}</h4>
                      <p>{{ $experience->description }}</p>
                  </div>
                  <div class="resume-date text-md-right">
                      <span class="text-primary">{{ $experience->start_date->format('F Y') }} — {{ $experience->is_current ? 'Present' : ($experience->end_date ? $experience->end_date->format('F Y') : '—') }}</span>
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
                {{-- <div class="col-sm-4 portfolio-item filter finance">
                    <a class="portfolio-link" href="#portfolioModal4" data-toggle="modal">
                        <div class="caption-port">
                            <div class="caption-port-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/p-4.jpg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item filter marketing">
                    <a class="portfolio-link" href="#portfolioModal5" data-toggle="modal">
                        <div class="caption-port">
                            <div class="caption-port-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/p-5.jpg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item filter consulting">
                    <a class="portfolio-link" href="#portfolioModal6" data-toggle="modal">
                        <div class="caption-port">
                            <div class="caption-port-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/p-6.jpg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item filter consulting">
                    <a class="portfolio-link" href="#portfolioModal7" data-toggle="modal">
                        <div class="caption-port">
                            <div class="caption-port-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/p-7.jpg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item filter consulting">
                    <a class="portfolio-link" href="#portfolioModal8" data-toggle="modal">
                        <div class="caption-port">
                            <div class="caption-port-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/p-8.jpg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item filter finance">
                    <a class="portfolio-link" href="#portfolioModal9" data-toggle="modal">
                        <div class="caption-port">
                            <div class="caption-port-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/p-9.jpg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item filter marketing">
                    <a class="portfolio-link" href="#portfolioModal1" data-toggle="modal">
                        <div class="caption-port">
                            <div class="caption-port-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/p-1.jpg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item filter marketing">
                    <a class="portfolio-link" href="#portfolioModal2" data-toggle="modal">
                        <div class="caption-port">
                            <div class="caption-port-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/p-2.jpg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item filter finance">
                    <a class="portfolio-link" href="#portfolioModal3" data-toggle="modal">
                        <div class="caption-port">
                            <div class="caption-port-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/p-3.jpg" alt="">
                    </a>
                </div> --}}
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
        <section class="d-flex flex-column" id="skills">
            <div class="p-lg-5 p-3 skill-cover">
                <h3 class="text-center text-white mb-2">Skills</h3>
                <p class="text-center small mb-4" style="color: rgba(255,255,255,.75)">Core competencies and tools</p>
                <div class="row text-center my-auto justify-content-center">
                     @forelse($skills as $skill)
              <div class="col-md-3 col-sm-6 mb-4">
                  <div class="skill-item">
                      <i class="{{ $skill->icon ?: 'fa fa-code' }}" style="font-size: 3.5rem;" aria-hidden="true"></i>
                      <h2><span class="counter">{{ $skill->percentage }}</span><span>%</span></h2>
                      <p>{{ $skill->name }}</p>
                  </div>
              </div>
              @empty
              <div class="col-12">
                <p class="text-center" style="color: rgba(255,255,255,.75)">لا توجد مهارات مضافة حتى الآن</p>
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
              {{-- </div> --}}
            </div>
        </section>

       

        <!--====================================================
                          CONTACT
    ======================================================-->
        <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="contact">
            <div class="row my-auto">
                <div class="col-lg-8 col-md-12 order-lg-1 order-2">
                    <div class="contact-cont">
                        <h3>Contact</h3>
                        <div class="heading-border-light"></div>
                        <p class="mb-4">أرسل رسالة وسأرد عليك في أقرب وقت ممكن.</p>
                    </div>
                    @if(session('contact_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('contact_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <form class="contact-form-card" action="{{ route('contact.store') }}" method="POST" novalidate>
                        @csrf
                        <div class="row con-form">
                            <div class="col-md-12">
                                <label class="sr-only" for="contact-name">الاسم</label>
                                <input type="text" id="contact-name" name="name" value="{{ old('name') }}" placeholder="الاسم الكامل" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12">
                                <label class="sr-only" for="contact-email">البريد</label>
                                <input type="email" id="contact-email" name="email" value="{{ old('email') }}" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12">
                                <label class="sr-only" for="contact-subject">الموضوع</label>
                                <input type="text" id="contact-subject" name="subject" value="{{ old('subject') }}" placeholder="الموضوع (اختياري)" class="form-control @error('subject') is-invalid @enderror">
                                @error('subject')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12">
                                <label class="sr-only" for="contact-message">الرسالة</label>
                                <textarea id="contact-message" name="message" rows="6" placeholder="رسالتك..." class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12 sub-but">
                                <button type="submit" class="btn btn-general btn-white btn-block">إرسال</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-12 mt-4 mt-lg-0 order-lg-2 order-1">
                    <div class="contact-cont2">
                        <div class="contact-add contact-box-desc">
                            <h3><i class="fa fa-map-marker cl-atlantis fa-2x"></i> Address</h3>
                            <p>{{ $profile ? $profile->address : '25, Dist town Street, Logn California, US' }}</p>
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
                                {{-- <li><a href="#" target="_empty"><i class="fa top-social fa-facebook" style="color: #4267b2; border-color:#4267b2;"></i></a></li>
                                <li><a href="#" target="_empty"><i class="fa top-social fa-twitter" style="color: #4AB3F4; border-color:#4AB3F4;"></i></a></li>
                                <li><a href="#" target="_empty"><i class="fa top-social fa-google-plus" style="color: #e24343; border-color:#e24343;"></i></a></li> --}}
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
    {{-- <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2 class="text-center">Our Project</h2>
                                    <div class="heading-border"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid img-centered" src="img/portfolio/p-1.jpg" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p>Our new Project every processes had become fragmented; meaning quality and service were inconsistent. This lack of standardization was adversely impacting operating costs, productivity and customer satisfaction. For
                                        several years now Payfast has worked strategically with innovations as a means of developing new solutions, products and services. In line with this vision, Success was approached to find new payments solutions
                                        to offer Payfast customers on their website, including open invoice and partial payments options.</p>
                                    <ul class="list-inline item-details">
                                        <li>Client:
                                            <strong>
                                            <a href="#">Techs Soft</a>
                                          </strong>
                                        </li>
                                        <li>Date:
                                            <strong>
                                            <a href="#">April 2018</a>
                                          </strong>
                                        </li>
                                        <li>Service:
                                            <strong>
                                            <a href="#">Web Development</a>
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
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2 class="text-center">Our Project</h2>
                                    <div class="heading-border"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid img-centered" src="img/portfolio/p-2.jpg" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p>Our new Project every processes had become fragmented; meaning quality and service were inconsistent. This lack of standardization was adversely impacting operating costs, productivity and customer satisfaction. For
                                        several years now Payfast has worked strategically with innovations as a means of developing new solutions, products and services. In line with this vision, Success was approached to find new payments solutions
                                        to offer Payfast customers on their website, including open invoice and partial payments options.</p>
                                    <ul class="list-inline item-details">
                                        <li>Client:
                                            <strong>
                                          <a href="#">Techs Soft</a>
                                        </strong>
                                        </li>
                                        <li>Date:
                                            <strong>
                                          <a href="#">April 2018</a>
                                        </strong>
                                        </li>
                                        <li>Service:
                                            <strong>
                                          <a href="#">Web Development</a>
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
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2 class="text-center">Our Project</h2>
                                    <div class="heading-border"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid img-centered" src="img/portfolio/p-3.jpg" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p>Our new Project every processes had become fragmented; meaning quality and service were inconsistent. This lack of standardization was adversely impacting operating costs, productivity and customer satisfaction. For
                                        several years now Payfast has worked strategically with innovations as a means of developing new solutions, products and services. In line with this vision, Success was approached to find new payments solutions
                                        to offer Payfast customers on their website, including open invoice and partial payments options.</p>
                                    <ul class="list-inline item-details">
                                        <li>Client:
                                            <strong>
                                          <a href="#">Techs Soft</a>
                                        </strong>
                                        </li>
                                        <li>Date:
                                            <strong>
                                          <a href="#">April 2018</a>
                                        </strong>
                                        </li>
                                        <li>Service:
                                            <strong>
                                          <a href="#">Web Development</a>
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
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2 class="text-center">Our Project</h2>
                                    <div class="heading-border"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid img-centered" src="img/portfolio/p-4.jpg" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p>Our new Project every processes had become fragmented; meaning quality and service were inconsistent. This lack of standardization was adversely impacting operating costs, productivity and customer satisfaction. For
                                        several years now Payfast has worked strategically with innovations as a means of developing new solutions, products and services. In line with this vision, Success was approached to find new payments solutions
                                        to offer Payfast customers on their website, including open invoice and partial payments options.</p>
                                    <ul class="list-inline item-details">
                                        <li>Client:
                                            <strong>
                                          <a href="#">Techs Soft</a>
                                        </strong>
                                        </li>
                                        <li>Date:
                                            <strong>
                                          <a href="#">April 2018</a>
                                        </strong>
                                        </li>
                                        <li>Service:
                                            <strong>
                                          <a href="#">Web Development</a>
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
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2 class="text-center">Our Project</h2>
                                    <div class="heading-border"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid img-centered" src="img/portfolio/p-5.jpg" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p>Our new Project every processes had become fragmented; meaning quality and service were inconsistent. This lack of standardization was adversely impacting operating costs, productivity and customer satisfaction. For
                                        several years now Payfast has worked strategically with innovations as a means of developing new solutions, products and services. In line with this vision, Success was approached to find new payments solutions
                                        to offer Payfast customers on their website, including open invoice and partial payments options.</p>
                                    <ul class="list-inline item-details">
                                        <li>Client:
                                            <strong>
                                          <a href="#">Techs Soft</a>
                                        </strong>
                                        </li>
                                        <li>Date:
                                            <strong>
                                          <a href="#">April 2018</a>
                                        </strong>
                                        </li>
                                        <li>Service:
                                            <strong>
                                          <a href="#">Web Development</a>
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
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2 class="text-center">Our Project</h2>
                                    <div class="heading-border"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid img-centered" src="img/portfolio/p-6.jpg" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p>Our new Project every processes had become fragmented; meaning quality and service were inconsistent. This lack of standardization was adversely impacting operating costs, productivity and customer satisfaction. For
                                        several years now Payfast has worked strategically with innovations as a means of developing new solutions, products and services. In line with this vision, Success was approached to find new payments solutions
                                        to offer Payfast customers on their website, including open invoice and partial payments options.</p>
                                    <ul class="list-inline item-details">
                                        <li>Client:
                                            <strong>
                                          <a href="#">Techs Soft</a>
                                        </strong>
                                        </li>
                                        <li>Date:
                                            <strong>
                                          <a href="#">April 2018</a>
                                        </strong>
                                        </li>
                                        <li>Service:
                                            <strong>
                                          <a href="#">Web Development</a>
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
    <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2 class="text-center">Our Project</h2>
                                    <div class="heading-border"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid img-centered" src="img/portfolio/p-7.jpg" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p>Our new Project every processes had become fragmented; meaning quality and service were inconsistent. This lack of standardization was adversely impacting operating costs, productivity and customer satisfaction. For
                                        several years now Payfast has worked strategically with innovations as a means of developing new solutions, products and services. In line with this vision, Success was approached to find new payments solutions
                                        to offer Payfast customers on their website, including open invoice and partial payments options.</p>
                                    <ul class="list-inline item-details">
                                        <li>Client:
                                            <strong>
                                          <a href="#">Techs Soft</a>
                                        </strong>
                                        </li>
                                        <li>Date:
                                            <strong>
                                          <a href="#">April 2018</a>
                                        </strong>
                                        </li>
                                        <li>Service:
                                            <strong>
                                          <a href="#">Web Development</a>
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
    <div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2 class="text-center">Our Project</h2>
                                    <div class="heading-border"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid img-centered" src="img/portfolio/p-8.jpg" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p>Our new Project every processes had become fragmented; meaning quality and service were inconsistent. This lack of standardization was adversely impacting operating costs, productivity and customer satisfaction. For
                                        several years now Payfast has worked strategically with innovations as a means of developing new solutions, products and services. In line with this vision, Success was approached to find new payments solutions
                                        to offer Payfast customers on their website, including open invoice and partial payments options.</p>
                                    <ul class="list-inline item-details">
                                        <li>Client:
                                            <strong>
                                          <a href="#">Techs Soft</a>
                                        </strong>
                                        </li>
                                        <li>Date:
                                            <strong>
                                          <a href="#">April 2018</a>
                                        </strong>
                                        </li>
                                        <li>Service:
                                            <strong>
                                          <a href="#">Web Development</a>
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
    <div class="portfolio-modal modal fade" id="portfolioModal9" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2 class="text-center">Our Project</h2>
                                    <div class="heading-border"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid img-centered" src="img/portfolio/p-9.jpg" alt="">
                                </div>
                                <div class="col-md-6">
                                    <p>Our new Project every processes had become fragmented; meaning quality and service were inconsistent. This lack of standardization was adversely impacting operating costs, productivity and customer satisfaction. For
                                        several years now Payfast has worked strategically with innovations as a means of developing new solutions, products and services. In line with this vision, Success was approached to find new payments solutions
                                        to offer Payfast customers on their website, including open invoice and partial payments options.</p>
                                    <ul class="list-inline item-details">
                                        <li>Client:
                                            <strong>
                                          <a href="#">Techs Soft</a>
                                        </strong>
                                        </li>
                                        <li>Date:
                                            <strong>
                                          <a href="#">April 2018</a>
                                        </strong>
                                        </li>
                                        <li>Service:
                                            <strong>
                                          <a href="#">Web Development</a>
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
    </div> --}}


    <!-- Global javascript -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            /* إغلاق قائمة الجوال بعد اختيار قسم */
            $('#navbarSupportedContent .nav-link').on('click', function () {
                if ($(window).width() < 992) {
                    $('#navbarSupportedContent').collapse('hide');
                }
            });

            $(".filter-b").click(function() {
                var value = $(this).attr('data-filter');
                if (value == "all") {
                    $('.filter').show('1000');
                } else {
                    $(".filter").not('.' + value).hide('3000');
                    $('.filter').filter('.' + value).show('3000');
                }
            });

            if ($(".filter-b").removeClass("active")) {
                $(this).removeClass("active");
            }
            $(this).addClass("active");
        });

        // SKILLS
        $(function() {
            $('.counter').counterUp({
                delay: 10,
                time: 2000
            });

        });
    </script>
</body>

</html>
