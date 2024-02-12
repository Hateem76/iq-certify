@extends('frontend.dashboard.admin_master')
@section('admin')


    <style>
        .dashboard-panel {
            position: relative;
        }
        .preloader-wrapper {

            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: #00000070;
            z-index: 999;
            display: none;
            justify-content: center;
            align-items: center;
            color: white !important;
        }
    </style>
    <div class="dashboard-wrapper">
        <div class="dashboard-inner">
            @if(Session::has('error'))
                <div class="alert alert-success mt-3 text-center" role="alert">
                    {{ session::get('error') }}
                </div>
            @endif

            <div class="dashboardHeader">
                <a class="header-brand" href="#">
                    <img src="{{asset('panel/img/logo.png')}}" class="img-fluid logo-img" alt="Website Logo" />
                </a>
                <h4 class="signup-title">{{getLangValue('dashboard.welcome_message')}} <span id="dashboard-welcome-username">
                    {{Auth::user()->name}}
                </span></h4>
                <span class="signup-intro">{{Auth::user()->email}}</span>
                @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {!! \Session::get('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (\Session::has('wrong'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {!! \Session::get('wrong') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (\Session::has('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> {!! \Session::get('warning') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            </div>
            <span class="dtoggle-button">
						 <div class="menu-bar menu-bar-top"></div>
						 <div class="menu-bar menu-bar-middle"></div>
						 <div class="menu-bar menu-bar-bottom"></div>
					</span>
            <div class="dashboard-content-wrapper">
                <div class="nav dashboard-nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="nav-user-info-wrapper">
                        <div class="nav-user-info-left">
                            <div class="user-avatar-wrapper">
                                <img src="{{asset('panel/img/icons/user-rounded.svg')}}" class="img-fluid avatar-icon icon-white" alt="User" />
                            </div>
                        </div>
                        <div class="nav-user-info-right">
                            <div class="nav-user-info-username">{{Auth::user()->name}}</div>
                            <div class="nav-user-info-country">
                                                                <img src="{{\App\Helpers\Results::CountryFlag(Auth::user()->country)}}" class="img-fluid avatar-flag-img" alt="Spain Flag" />
                                <span>{{Auth::user()->country}}</span></div>
                        </div>
                    </div>
                    <button class="nav-link active" onclick="ajaxview('newtest', 'newtest',true,event)"  type="button" ><img src="{{asset('panel/img/icons/add-square.svg')}}" class="img-fluid dashboard-nav-icon" alt="History" />{{getLangValue('dashboard.header_newtest')}}</button>
                    <button class="nav-link"  onclick="ajaxview('results', 'results',false,event)"   type="button"><img src="{{asset('panel/img/icons/clipboard.svg')}}" class="img-fluid dashboard-nav-icon" alt="History" />{{getLangValue('dashboard.header_results')}}</button>
                    <button class="nav-link"  onclick="ajaxview('rankings', 'rankings',false,event)"  type="button"><img src="{{asset('panel/img/icons/ranking.svg')}}" class="img-fluid dashboard-nav-icon" alt="Card" />{{getLangValue('dashboard.header_ranking')}}</button>
                    <button class="nav-link" onclick="ajaxview('settings', 'settings',false,event)"  type="button"><img src="{{asset('panel/img/icons/settings.svg')}}" class="img-fluid dashboard-nav-icon" alt="Settings" />{{getLangValue('dashboard.header_settings')}}</button>
                    <form class="m-0" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" id="v-pills-logout-tab"   :href="route('logout')"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <img src="{{asset('panel/img/icons/logout-2.svg')}}" class="img-fluid dashboard-nav-icon" alt="Logout" />
                            {{getLangValue('dashboard.header_logout')}}
                        </a>
                    </form>
                </div>
                <div class="dashboard-panel">


                    <div class="preloader-wrapper">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div id="dynamic-section">
                        {{--                        <div class="new-quizz-wrapper">--}}
                        {{--                            <div class="new-quizz-slider">--}}
                        {{--                                <div class="new-quizz-item">--}}
                        {{--                                    <h3 class="nqi-title">Quizz Item 1</h3>--}}
                        {{--                                    <div class="nqi-meta">--}}
                        {{--                                        <div class="nqi-questions nqi-m-row"><span class="nqi-m-label"><img src="{{asset('panel/img/icons/lightbulb-bolt.svg')}}" class="img-fluid svg-icon icon-green nqi-m-icon" alt="User" />Questions:</span><span class="nqi-m-val">22</span></div>--}}
                        {{--                                        <div class="nqi-diff nqi-m-row"><span class="nqi-m-label"><img src="{{asset('panel/img/icons/dumbbell-large.svg')}}" class="img-fluid svg-icon icon-green nqi-m-icon" alt="User" />Difficulty:</span><span class="nqi-m-val">8/10</span></div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <p class="nqi-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae suscipit nulla, non tincidunt eros. Nullam sed dolor in felis pulvinar consequat id non ligula.</p>--}}
                        {{--                                    <div class="nqi-img-wrapper">--}}
                        {{--                                        <img src="https://placehold.co/800x400" alt="" class="img-fluid nqi-img" />--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="nqi-cta">--}}
                        {{--                                        <div class="cta-btn cta-btn-big">--}}
                        {{--                                            <span>Start IQ Test</span>--}}
                        {{--                                            <img src="{{asset('panel/img/icons/login-3.svg')}}" class="img-fluid svg-icon icon-white cta-btn-icon" alt="Icon Go" />--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="new-quizz-item">--}}
                        {{--                                    <h3 class="nqi-title">Quizz Item 2</h3>--}}
                        {{--                                    <div class="nqi-meta">--}}
                        {{--                                        <div class="nqi-questions nqi-m-row"><span class="nqi-m-label"><img src="{{asset('panel/img/icons/lightbulb-bolt.svg')}}" class="img-fluid svg-icon icon-green nqi-m-icon" alt="User" />Questions:</span><span class="nqi-m-val">30</span></div>--}}
                        {{--                                        <div class="nqi-diff nqi-m-row"><span class="nqi-m-label"><img src="{{asset('panel/img/icons/dumbbell-large.svg')}}" class="img-fluid svg-icon icon-green nqi-m-icon" alt="User" />Difficulty:</span><span class="nqi-m-val">9/10</span></div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <p class="nqi-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae suscipit nulla, non tincidunt eros. Nullam sed dolor in felis pulvinar consequat id non ligula.</p>--}}
                        {{--                                    <div class="nqi-img-wrapper">--}}
                        {{--                                        <img src="https://placehold.co/800x400" alt="" class="img-fluid nqi-img" />--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="nqi-cta">--}}
                        {{--                                        <div class="cta-btn cta-btn-big">--}}
                        {{--                                            <span>Start IQ Test</span>--}}
                        {{--                                            <img src="{{asset('panel/img/icons/login-3.svg')}}" class="img-fluid svg-icon icon-white cta-btn-icon" alt="Icon Go" />--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="new-quizz-item">--}}
                        {{--                                    <h3 class="nqi-title">Quizz Item 3</h3>--}}
                        {{--                                    <div class="nqi-meta">--}}
                        {{--                                        <div class="nqi-questions nqi-m-row"><span class="nqi-m-label"><img src="{{asset('panel/img/icons/lightbulb-bolt.svg')}}" class="img-fluid svg-icon icon-green nqi-m-icon" alt="User" />Questions:</span><span class="nqi-m-val">40</span></div>--}}
                        {{--                                        <div class="nqi-diff nqi-m-row"><span class="nqi-m-label"><img src="{{asset('panel/img/icons/dumbbell-large.svg')}}" class="img-fluid svg-icon icon-green nqi-m-icon" alt="User" />Difficulty:</span><span class="nqi-m-val">10/10</span></div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <p class="nqi-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae suscipit nulla, non tincidunt eros. Nullam sed dolor in felis pulvinar consequat id non ligula.</p>--}}
                        {{--                                    <div class="nqi-img-wrapper">--}}
                        {{--                                        <img src="https://placehold.co/800x400" alt="" class="img-fluid nqi-img" />--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="nqi-cta">--}}
                        {{--                                        <div class="cta-btn cta-btn-big">--}}
                        {{--                                            <span>Start IQ Test</span>--}}
                        {{--                                            <img src="{{asset('panel/img/icons/login-3.svg')}}" class="img-fluid svg-icon icon-white cta-btn-icon" alt="Icon Go" />--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>




                </div>

            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            ajaxview('newtest', 'newtest',true,event);
        };
    </script>


@endsection
