<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
  <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close">
    </i>
  </button>
  <div id="m_aside_left" style="background: black" class="m-grid__item  m-aside-left  m-aside-left--skin-dark ">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
      <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__item  m-menu__item @yield('dashboard-active')" aria-haspopup="true">
          <a href="{{ route('admins.home') }}" class="m-menu__link ">
            <i class="m-menu__link-icon flaticon-line-graph">
            </i>
            <span class="m-menu__link-title">
              <span class="m-menu__link-wrap">
                <span class="m-menu__link-text">Dashboard
                </span>
              </span>
            </span>
          </a>
        </li>
        <li class="m-menu__section ">
          <h4 class="m-menu__section-text">Components
          </h4>
          <i class="m-menu__section-icon flaticon-more-v2">
          </i>
        </li>
        <!-- Start Admin Module -->
        <li class="m-menu__item  m-menu__item--submenu @yield('admins-active')" aria-haspopup="true"
            m-menu-submenu-toggle="hover">
          <a href="javascript:;" class="m-menu__link m-menu__toggle">
            <i class="m-menu__link-icon fa fa-users"> </i>
            <span class="m-menu__link-text">Admins </span>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu ">
            <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
              <li class="m-menu__item @yield('admins-create-active')" aria-haspopup="true">
                <a href="{{route('admins.admin.create')}}" class="m-menu__link ">
                  <i class="m-menu__link-bullet m-menu__link-icon fa fa-plus">
                    <span></span>
                  </i>
                  <span class="m-menu__link-text"> Add New</span>
                </a>
              </li>
              <li class="m-menu__item @yield('admins-view-active')" aria-haspopup="true">
                <a href="{{route('admins.admin.index').'?view=view'}}" class="m-menu__link ">
                  <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                    <span> </span>
                  </i>
                  <span class="m-menu__link-text">View</span>
                </a>
              </li>
              <li class="m-menu__item @yield('admins-trash-active')" aria-haspopup="true">
                <a href="{{route('admins.admin.index').'?view=trash'}}" class="m-menu__link ">
                  <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">
                    <span></span>
                  </i>
                  <span class="m-menu__link-text"> Recycle bin
                    <span class="m-menu__link-badge">
                      <span class="m-badge m-badge--danger" id="module-admins">
                        {{$adminTrashesCount}}
                      </span>
                    </span>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <!-- End Admin Module -->
        <!-- Start Project Categories Module -->
        <li class="m-menu__item  m-menu__item--submenu @yield('projectCategories-active')" aria-haspopup="true"
              m-menu-submenu-toggle="hover">
              <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-layer-group"> </i>
                  <span class="m-menu__link-text">Project Categories </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <li class="m-menu__item @yield('projectCategories-create-active')" aria-haspopup="true">
                          <a href="{{route('admins.projectCategory.create')}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-plus">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Add New</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('projectCategories-view-active')" aria-haspopup="true">
                          <a href="{{route('admins.projectCategory.index').'?view=view'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                                  <span> </span>
                              </i>
                              <span class="m-menu__link-text">View</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('projectCategories-trash-active')" aria-haspopup="true">
                          <a href="{{route('admins.projectCategory.index').'?view=trash'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Recycle bin
                    <span class="m-menu__link-badge">
                      <span class="m-badge m-badge--danger" id="module-projectCategories">
                        {{$projectCategoryTrashesCount}}
                      </span>
                    </span>
                  </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
        <!-- End Project Categories Module -->

          <!-- Start Project Module -->
          <li class="m-menu__item  m-menu__item--submenu @yield('projects-active')" aria-haspopup="true"
              m-menu-submenu-toggle="hover">
              <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-tasks"></i>
                  <span class="m-menu__link-text">Projects </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <li class="m-menu__item @yield('projects-create-active')" aria-haspopup="true">
                          <a href="{{route('admins.project.create')}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-plus">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Add New</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('projects-view-active')" aria-haspopup="true">
                          <a href="{{route('admins.project.index').'?view=view'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                                  <span> </span>
                              </i>
                              <span class="m-menu__link-text">View</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('projects-trash-active')" aria-haspopup="true">
                          <a href="{{route('admins.project.index').'?view=trash'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Recycle bin
                    <span class="m-menu__link-badge">
                      <span class="m-badge m-badge--danger" id="module-projects">
                        {{$projectTrashesCount}}
                      </span>
                    </span>
                  </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          <!-- End Project Module -->

          <!-- Start Video Module -->
          <li class="m-menu__item  m-menu__item--submenu @yield('videos-active')" aria-haspopup="true"
              m-menu-submenu-toggle="hover">
              <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-video"> </i>
                  <span class="m-menu__link-text">Videos </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <li class="m-menu__item @yield('videos-create-active')" aria-haspopup="true">
                          <a href="{{route('admins.video.create')}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-plus">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Add New</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('videos-view-active')" aria-haspopup="true">
                          <a href="{{route('admins.video.index').'?view=view'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                                  <span> </span>
                              </i>
                              <span class="m-menu__link-text">View</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('videos-trash-active')" aria-haspopup="true">
                          <a href="{{route('admins.video.index').'?view=trash'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Recycle bin
                    <span class="m-menu__link-badge">
                      <span class="m-badge m-badge--danger" id="module-videos">
                        {{$videoTrashesCount}}
                      </span>
                    </span>
                  </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          <!-- End Video Module -->

          <!-- Start Photo Categories Module -->
          <li class="m-menu__item  m-menu__item--submenu @yield('photoCategories-active')" aria-haspopup="true"
              m-menu-submenu-toggle="hover">
              <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-layer-group"> </i>
                  <span class="m-menu__link-text">Photo Categories </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <li class="m-menu__item @yield('photoCategories-create-active')" aria-haspopup="true">
                          <a href="{{route('admins.photoCategory.create')}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-plus">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Add New</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('photoCategories-view-active')" aria-haspopup="true">
                          <a href="{{route('admins.photoCategory.index').'?view=view'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                                  <span> </span>
                              </i>
                              <span class="m-menu__link-text">View</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('photoCategories-trash-active')" aria-haspopup="true">
                          <a href="{{route('admins.photoCategory.index').'?view=trash'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Recycle bin
                    <span class="m-menu__link-badge">
                      <span class="m-badge m-badge--danger" id="module-photoCategories">
                        {{$photoCategoryTrashesCount}}
                      </span>
                    </span>
                  </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          <!-- End Photo Categories Module -->

          <!-- Start Photo Module -->
          <li class="m-menu__item  m-menu__item--submenu @yield('photos-active')" aria-haspopup="true"
              m-menu-submenu-toggle="hover">
              <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa flaticon-photo-camera"> </i>
                  <span class="m-menu__link-text">photos </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <li class="m-menu__item @yield('photos-create-active')" aria-haspopup="true">
                          <a href="{{route('admins.photo.create')}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-plus">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Add New</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('photos-view-active')" aria-haspopup="true">
                          <a href="{{route('admins.photo.index').'?view=view'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                                  <span> </span>
                              </i>
                              <span class="m-menu__link-text">View</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('photos-trash-active')" aria-haspopup="true">
                          <a href="{{route('admins.photo.index').'?view=trash'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Recycle bin
                    <span class="m-menu__link-badge">
                      <span class="m-badge m-badge--danger" id="module-photos">
                        {{$photoTrashesCount}}
                      </span>
                    </span>
                  </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          <!-- End Photo Module -->

          <!-- Start Awards Module -->
          <li class="m-menu__item  m-menu__item--submenu @yield('awards-active')" aria-haspopup="true"
              m-menu-submenu-toggle="hover">
              <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-award"> </i>
                  <span class="m-menu__link-text">Awards </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <li class="m-menu__item @yield('awards-create-active')" aria-haspopup="true">
                          <a href="{{route('admins.award.create')}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-plus">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Add New</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('awards-view-active')" aria-haspopup="true">
                          <a href="{{route('admins.award.index').'?view=view'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                                  <span> </span>
                              </i>
                              <span class="m-menu__link-text">View</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('awards-trash-active')" aria-haspopup="true">
                          <a href="{{route('admins.award.index').'?view=trash'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Recycle bin
                    <span class="m-menu__link-badge">
                      <span class="m-badge m-badge--danger" id="module-awards">
                        {{$awardTrashesCount}}
                      </span>
                    </span>
                  </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          <!-- End Awards Module -->
          <!-- Start Blogs Module -->
          <li class="m-menu__item  m-menu__item--submenu @yield('blogs-active')" aria-haspopup="true"
              m-menu-submenu-toggle="hover">
              <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-square-full"> </i>
                  <span class="m-menu__link-text">blogs </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <li class="m-menu__item @yield('blogs-create-active')" aria-haspopup="true">
                          <a href="{{route('admins.blog.create')}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-plus">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Add New</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('blogs-view-active')" aria-haspopup="true">
                          <a href="{{route('admins.blog.index').'?view=view'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                                  <span> </span>
                              </i>
                              <span class="m-menu__link-text">View</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('blogs-trash-active')" aria-haspopup="true">
                          <a href="{{route('admins.blog.index').'?view=trash'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Recycle bin
                    <span class="m-menu__link-badge">
                      <span class="m-badge m-badge--danger" id="module-blogs">
                        {{$blogTrashesCount}}
                      </span>
                    </span>
                  </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          <!-- End Blogs Module -->

          <!-- Start Messages Module -->
          <li class="m-menu__item  m-menu__item--submenu @yield('messages-active')" aria-haspopup="true"
              m-menu-submenu-toggle="hover">
              <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-reply-all"> </i>
                  <span class="m-menu__link-text">Messages </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <li class="m-menu__item @yield('messages-view-active')" aria-haspopup="true">
                          <a href="{{route('admins.message.index').'?view=view'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                                  <span> </span>
                              </i>
                              <span class="m-menu__link-text">View</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('messages-trash-active')" aria-haspopup="true">
                          <a href="{{route('admins.message.index').'?view=trash'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Recycle bin
                    <span class="m-menu__link-badge">
                      <span class="m-badge m-badge--danger" id="module-messages">
                        {{$messageTrashesCount}}
                      </span>
                    </span>
                  </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          <!-- End Messages Module -->

          <!-- Start Slider Module -->
          <li class="m-menu__item  m-menu__item--submenu @yield('sliders-active')" aria-haspopup="true"
              m-menu-submenu-toggle="hover">
              <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-sliders-h"> </i>
                  <span class="m-menu__link-text">Slider </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <li class="m-menu__item @yield('sliders-create-active')" aria-haspopup="true">
                          <a href="{{route('admins.slider.create')}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-plus">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Add New</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('sliders-view-active')" aria-haspopup="true">
                          <a href="{{route('admins.slider.index').'?view=view'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                                  <span> </span>
                              </i>
                              <span class="m-menu__link-text">View</span>
                          </a>
                      </li>
                      <li class="m-menu__item @yield('sliders-trash-active')" aria-haspopup="true">
                          <a href="{{route('admins.slider.index').'?view=trash'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">
                                  <span></span>
                              </i>
                              <span class="m-menu__link-text"> Recycle bin
                    <span class="m-menu__link-badge">
                      <span class="m-badge m-badge--danger" id="module-sliders">
                        {{$sliderTrashesCount}}
                      </span>
                    </span>
                  </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          <!-- End Slider Module -->

          <!-- Start Subscriber Module -->
          <li class="m-menu__item  m-menu__item--submenu @yield('subscribers-active')" aria-haspopup="true"
              m-menu-submenu-toggle="hover">
              <a href="javascript:;" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon fa fa-users"> </i>
                  <span class="m-menu__link-text">Subscriber </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <li class="m-menu__item @yield('subscribers-view-active')" aria-haspopup="true">
                          <a href="{{route('admins.subscriber.index').'?view=view'}}" class="m-menu__link ">
                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-eye">
                                  <span> </span>
                              </i>
                              <span class="m-menu__link-text">View</span>
                          </a>
                      </li>
{{--                      <li class="m-menu__item @yield('subscribers-trash-active')" aria-haspopup="true">--}}
{{--                          <a href="{{route('admins.subscriber.index').'?view=trash'}}" class="m-menu__link ">--}}
{{--                              <i class="m-menu__link-bullet m-menu__link-icon fa fa-trash">--}}
{{--                                  <span></span>--}}
{{--                              </i>--}}
{{--                              <span class="m-menu__link-text"> Recycle bin--}}
{{--                    <span class="m-menu__link-badge">--}}
{{--                      <span class="m-badge m-badge--danger" id="module-subscribers">--}}
{{--                        {{$subscriberTrashesCount}}--}}
{{--                      </span>--}}
{{--                    </span>--}}
{{--                  </span>--}}
{{--                          </a>--}}
{{--                      </li>--}}
                  </ul>
              </div>
          </li>
          <!-- End Subscriber Module -->
      </ul>
    </div>
  </div>
</div>
