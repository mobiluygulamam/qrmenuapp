@php
$posts = request()->user()->posts;
@endphp
<div id="wrapper" class="">
     <!-- Header Container
    ================================================== -->
     <header id="header-container" class="fullwidth">
          <x-demo-frame />

          @if(session()->get('quick_admin_user_id'))
          <div class="notification notice margin-bottom-0 padding-bottom-10 padding-top-10">
               <div class="d-flex justify-content-between">
                    <span>{!! ___('You are logged in as :user_name.', ['user_name' =>
                         '<strong>'.request()->user()->name.'</strong>']) !!}</span>
                    <a href="{{ route('logout') }}"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{
                         ___('Exit') }}
                    </a>
               </div>
          </div>
          @endif
          @auth
          @if($settings->non_active_msg == 1 && !request()->user()->hasVerifiedEmail())
          <div class="user-status-message">
               <div class="container container-active-msg">
                    <div class="row">
                         <div class="col-lg-8">
                              <i class="icon-lock text-18"></i>
                              <span>{{ ___('Your email address is not verified. Please verify your email address to use
                                   all the features.') }}</span>
                         </div>
                         <div class="col-lg-4">
                              <form action="{{ route('verification.resend') }}" method="post">
                                   @csrf
                                   <button type="submit" class="button ripple-effect gray">{{ ___('Resend Email')
                                        }}</button>
                              </form>

                         </div>
                    </div>
               </div>
          </div>
          @endif
          @endauth
          <!-- Header -->
          <section class="tw-bg-transparent ">
               <nav
                    class="navbar navbar-expand-lg navbar-dark tw-bg-gradient-to-b tw-from-sky-500 tw-to-sky-600 tw-rounded-b-3xl">
                    <span class="app-brand-logo demo tw-ml-12 ">
                         <img width="50" class="" src="{{ asset('storage/logo/'.$settings->site_admin_logo) }}"
                              alt="{{ @$settings->site_title }}" />
                    </span>
                    <div class="container position-relative" type="button" data-bs-toggle="collapse"
                         data-bs-target="#nav01" aria-controls="nav01" aria-expanded="false">

                         <div class=" collapse navbar-collapse position-absolute top-50 start-50 translate-middle"
                              id="nav01">
                              <ul class="navbar-nav">
                                   <li class="nav-item"><a class="nav-link" href="{{ route('restaurants.index') }}"><i
                                                  class="far fa-utensils"></i> {{ ___('My Restaurants') }}
                                        </a></li>
                                   <li
                                        class="nav-item {{ request()->route()->getName() == 'tables' ? 'active' : '' }} tablepage">
                                        <a class="nav-link" href="#"><i class="far fa-mug-hot"></i> {{ ___('My_tables')
                                             }}</a>
                                   </li>

                                   <li
                                        class="nav-item {{ request()->route()->getName() == 'restaurants.orders' ? 'active' : '' }}">
                                        <a class="nav-link" href="{{ route('restaurants.orders') }}"><i
                                                  class="icon-feather-package"></i> {{ ___('Orders') }}</a></li>




                              </ul>

                         </div>
                         <div class="tw-absolute  tw-right-12 md:tw-bottom-4 header-widget ">

                              <!-- Messages -->
                              <div class="header-notifications user-menu">

                                   <div class="header-notifications-trigger">
                                        <a href="#">


                                             <div class="align-self-sm-center tw-mr-12  user-avatar status-online"><img
                                                       src="{{ asset('storage/profile/'.request()->user()->image) }}"
                                                       alt="{{ request()->user()->username }}">

                                             </div>
                                        </a>

                                   </div>
                                   <!-- Dropdown -->
                                   <div class="header-notifications-dropdown">
                                        <ul class="user-menu-small-nav">
                                             @if(request()->user()->isAdmin())
                                             <li><a href="{{ route('admin.dashboard') }}" target="_blank"><i
                                                            class="icon-feather-external-link"></i> {{ ___('Admin') }}
                                                  </a></li>
                                             @endif

                                             <li><a href="{{ route('settings') }}"><i class="icon-feather-settings"></i>
                                                       {{ ___('Account Setting') }}
                                                  </a></li>



                                             <li><a href="{{ route('subscription') }}"><i class="icon-feather-gift"></i>
                                                       {{ ___('Membership') }}
                                                  </a></li>

                                             <li><a href="{{ route('feedbacks') }}"><i class="far fa-thumbs-up"></i> {{
                                                       ___('feedbacks') }}
                                                  </a></li>
                                             <li><a href="{{ route('integrations') }}"><i class="far fa-rocket"></i> {{
                                                       ___('integrations') }}
                                                  </a></li>
                                             <li><a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                            class="icon-feather-log-out"></i> {{ ___('Logout') }}
                                                  </a></li>
                                        </ul>
                                        <form id="logout-form" class="d-inline" action="{{ route('logout') }}"
                                             method="POST">
                                             @csrf
                                        </form>
                                   </div>
                              </div>

                         </div>
                    </div>


               </nav>
               <div class="d-none navbar-menu position-fixed top-0 start-0 bottom-0 w-100 mw-sm" style="z-index: 9999;">
                    <div
                         class="navbar-close navbar-backdrop position-fixed top-0 start-0 end-0 bottom-0 bg-primary-dark bg-opacity-25">
                    </div>
                    <nav
                         class="position-relative h-100 w-100 d-flex flex-column pt-8 pb-10 px-8 bg-black overflow-auto">
                         <div class="d-flex align-items-center justify-content-between mb-16"><a
                                   class="d-inline-block text-decoration-none" href="#"><img class="img-fluid"
                                        src="nightsable-assets/logos/logo.svg" alt=""></a><a
                                   class="navbar-close text-primary" href="#">
                                   <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"
                                             fill="currentColor"></path>
                                   </svg></a></div>
                         <ul class="nav flex-column my-auto">
                              <li class="nav-item mb-1"><a class="btn text-white ps-4 text-start w-100 fw-normal"
                                        href="#">Home</a></li>
                              <li class="nav-item mb-1"><a class="btn text-white ps-4 text-start w-100 fw-normal"
                                        href="#">About us</a></li>
                              <li class="nav-item mb-1"><a class="btn text-white ps-4 text-start w-100 fw-normal"
                                        href="#">Wallet</a></li>
                              <li class="nav-item mb-1"><a class="btn text-white ps-4 text-start w-100 fw-normal"
                                        href="#">Blog</a></li>
                         </ul><a class="btn mt-8 w-100 btn-outline-light" href="#">Get in touch</a>
                    </nav>

               </div>
          </section>
          <!-- Header / End -->

     </header>
     <div class="clearfix"></div>

     <div id="tablepage-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">


          <!--Tabs -->
          <div class="sign-in-form">
               <ul class="popup-tabs-nav">
                    <li><a>{{___('My Tables')}}</a></li>
               </ul>


               <div class="popup-tabs-container">




                    <!-- Tab -->
                    <div class="popup-tab-content">
                         <form action="#" method="post" id="selectPost">
                              @csrf
                              <div class="submit-field">

                                   <label for="menu" class="with-border block text-sm font-medium text-gray-700">{{
                                        ___('Name') }}</label>
                                   <select id="menu" name="name"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">

                                        @foreach ($posts as $post)
                                        <option data-item="{{ $post->id }}">{{$post->title}}</option>
                                        @endforeach
                                   </select>

                              </div>
                              <!-- Button -->
                              <button class=" margin-top-0 button button-sliding-icon ripple-effect"
                                   type="submit">{{___('Select')}} <i class="icon-material-outline-arrow-right-alt"></i>
                              </button>
                         </form>
                    </div>
               </div>
          </div>
     </div>
     <script>


          $('.tablepage').on('click', function (e) {
               e.preventDefault();

               $('#selectPost').trigger('reset');

               $.magnificPopup.open({
                    items: {
                         src: '#tablepage-dialog',
                         type: 'inline',
                         fixedContentPos: false,
                         fixedBgPos: true,
                         overflowY: 'auto',
                         closeBtnInside: true,
                         preloader: false,
                         midClick: true,
                         removalDelay: 300,
                         mainClass: 'my-mfp-zoom-in'
                    }
               });

               $("#selectPost").on("submit", function (e) {
                    e.preventDefault();


                    var selectedOption = $("#menu option:selected");
                    var postId = selectedOption.data("item");
                    if (postId) {
                         var redirectUrl = "{{ route('restaurants.tablemanage', ':id') }}".replace(':id', postId);

                         // Tarayıcıyı yeni route'a yönlendir
                         window.location.href = redirectUrl;
                    }

               });
          });

     </script>