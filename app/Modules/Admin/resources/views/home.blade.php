<x-admin::layout>
 <x-slot name="pageTitle">Home</x-slot name="pageTitle">
 @section('dashboard-active', 'm-menu__item--active')
 <x-slot name="style">
  <style type="text/css">
        .card {
            border-radius: 12px;
            box-shadow: 0 6px 10px -4px rgba(0, 0, 0, .15);
            background-color: gray;
            color: #fff;
            margin-bottom: 20px;
            position: relative;
            border: 0;
            transition: box-shadow .2s ease, -webkit-transform .3s cubic-bezier(.34, 2, .6, 1);
            transition: transform .3s cubic-bezier(.34, 2, .6, 1), box-shadow .2s ease;
            transition: transform .3s cubic-bezier(.34, 2, .6, 1), box-shadow .2s ease, -webkit-transform .3s cubic-bezier(.34, 2, .6, 1);
        }
        .card {
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-clip: border-box;
        }
        .card-stats .card-body
        {
            padding: 15px 15px 0;
        }
        .card .card-body
        {
            padding: 15px 15px 10px;
        }
        .card-stats
        {
            position: relative;
            top: 0;
            transition: top ease 0.5s;
        }
        .card-stats:hover
        {
            top: -10px;
        }
        .card-body
        {
            flex: 1 1 auto;
            padding: 1.25rem;
        }
        .card-stats .card-body .numbers
        {
            text-align: right;
            font-size: 2em;
        }
        .card .numbers
        {
            font-size: 2em;
        }
        .card-stats .card-body .numbers .card-category
        {
            color: #9a9a9a;
            font-size: 16px;
            line-height: 1.4em;
        }
        .card-stats .card-body .numbers p
        {
            margin-bottom: 0;
        }
        .card-category
        {
            font-size: 1em;
        }

        .card-category,.category {
            text-transform: capitalize;
            font-weight: 400;
            color: #9a9a9a;
            font-size: .7142em;
        }

        .card-stats .card-body .numbers p
        {
            margin-bottom: 0;
        }
        .card-title
        {
            margin-bottom: .75rem;
        }
    </style>
</x-slot>
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Home
                </h3>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Dashboard
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <section class="content">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5 col-md-4">
                                                    <div style="margin-top: 10px;" class="icon-big  icon-warning"><i
                                                            class="fa fa-layer-group"></i></div>
                                                </div>
                                                <div class="col-7 col-md-8">
                                                    <div class="numbers">
                                                        <p class="card-title"> {{$statistics['project_categories']}}</p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="card-footer ">
                                                <a href="{{route('admins.projectCategory.index')}}">
                                                    <div class="stats" style="color:#fff;font-weight: bold;"> Project Categories
                                                    </div>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5 col-md-4">
                                                    <div style="margin-top: 10px;" class="icon-big  icon-warning"><i
                                                            class="fa fa-tasks"></i></div>
                                                </div>
                                                <div class="col-7 col-md-8">
                                                    <div class="numbers">
                                                        <p class="card-title">{{$statistics['projects']}}</p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{route('admins.project.index')}}">
                                                <div class="stats" style="color:#fff;font-weight: bold;"> Projects
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5 col-md-4">
                                                    <div style="margin-top: 10px;" class="icon-big  icon-warning"><i
                                                            class="fa fa-layer-group"></i></div>
                                                </div>
                                                <div class="col-7 col-md-8">
                                                    <div class="numbers">
                                                        <p class="card-title">{{$statistics['photo_categories']}}</p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="card-footer">
                                                <a href="{{route('admins.photoCategory.index')}}">
                                                    <div class="stats" style="color:#fff;font-weight: bold;"> Photo Categories
                                                    </div>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5 col-md-4">
                                                    <div style="margin-top: 10px;" class="icon-big  icon-warning"><i
                                                            class="fa flaticon-photo-camera"></i></div>
                                                </div>
                                                <div class="col-7 col-md-8">
                                                    <div class="numbers">
                                                        <p class="card-title"> {{$statistics['photos']}} </p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="card-footer">
                                                <a href="{{route('admins.photo.index')}}">
                                                    <div class="stats" style="color:#fff;font-weight: bold;"> Photos
                                                    </div>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5 col-md-4">
                                                    <div style="margin-top: 10px;" class="icon-big  icon-warning"><i
                                                            class="fa fa-video"></i></div>
                                                </div>
                                                <div class="col-7 col-md-8">
                                                    <div class="numbers">
                                                        <p class="card-title">{{$statistics['videos']}}</p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="card-footer">
                                                <a href="{{route('admins.video.index')}}">
                                                    <div class="stats" style="color:#fff;font-weight: bold;"> Videos
                                                    </div>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5 col-md-4">
                                                    <div style="margin-top: 10px;" class="icon-big  icon-warning"><i
                                                            class="fa fa-award"></i></div>
                                                </div>
                                                <div class="col-7 col-md-8">
                                                    <div class="numbers">
                                                        <p class="card-title"> {{$statistics['awards']}} </p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="card-footer ">
                                                <a href="{{route('admins.award.index')}}">
                                                    <div class="stats" style="color:#fff;font-weight: bold;"> Awards
                                                    </div>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5 col-md-4">
                                                    <div style="margin-top: 10px;" class="icon-big  icon-warning"><i
                                                            class="fa fa-square-full"></i></div>
                                                </div>
                                                <div class="col-7 col-md-8">
                                                    <div class="numbers">
                                                        <p class="card-title">{{$statistics['blogs']}}</p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="card-footer">
                                                <a href="{{route('admins.blog.index')}}">
                                                    <div class="stats" style="color:#fff;font-weight: bold;"> Blogs
                                                    </div>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5 col-md-4">
                                                    <div style="margin-top: 10px;" class="icon-big  icon-warning"><i
                                                            class="fa fa-reply-all"></i></div>
                                                </div>
                                                <div class="col-7 col-md-8">
                                                    <div class="numbers">
                                                        <p class="card-title"> {{$statistics['messages']}} </p>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="card-footer ">
                                                <a href="{{route('admins.message.index')}}">
                                                    <div class="stats" style="color:#fff;font-weight: bold;"> Messages
                                                    </div>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
    <!-- Some JS -->
     </x-slot>
  </x-admin::layout>
