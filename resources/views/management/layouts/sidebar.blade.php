<div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list pt-4">
                <li class="sidebar-user-panel active">
                    <div class="contact-photo">
                        <div class="profile-usertitle ml-4">
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{url('admin/dashboard')}}" >
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                @can('quiz-sidebar')
                    <li>
                        <a href="{{url('admin/quiz')}}" >
                            <i class="fas fa-book-open"></i>
                            <span>Quiz</span>
                        </a>
                    </li>
                @endcan
                @can('user-sidebar')
                    <li>
                        <a href="{{url('admin/unregister')}}" >
                            <i class="fas fa-book-open"></i>
                            <span>Unregister Users</span>
                        </a>
                    </li>
                @endcan
                @can('user-sidebar')
                    <li>
                        <a  onClick="return false;" class="menu-toggle" href="" >
                            <i class="fas fa-unlock-alt"></i>
                            <span>Subscribers</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="{{url('admin/order')}}?type=trialing" >
                                    <span>Trial Subscribers</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('admin/order')}}?type=active" >
                                    <span>Active Subscribers</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('admin/order')}}?type=cancel" >
                                    <span>Cancel Subscribers</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('language-sidebar')
                    <li>
                        <a href=" {{route('languages.index')}}">
                            <i class="fas fa-language"></i>
                            <span>Manage Languages</span>
                        </a>
                    </li>
                @endcan
                @can('roles-and-permission-sidebar')
                    <li>
                        <a  onClick="return false;" class="menu-toggle" href="" >
                            <i class="fas fa-unlock-alt"></i>
                            <span> Roles | Permission</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href=" {{route('roles.index')}}">
                                    <span>Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href=" {{route('permissions.index')}}">
                                    <span>Permissions</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcan
                @can('user-sidebar')
                    <li>
                        <a href="{{url('admin/users')}}" >
                            <i class="fas fa-user"></i>
                            <span>Users Management</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <form class="m-0" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#"  :href="route('logout')"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="fas fa-power-off"></i> <span>
                                {{ __('Log Out') }}
                            </span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <div class="copyright">
            <a href="https://pixelssoft.com" class="text-dark d-block" target="_blank"> Powered By Pixels Soft</a>
        </div>
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation">
                <a href="#skins" data-toggle="tab" class="active">SKINS</a>
            </li>
            {{--            <li role="presentation">--}}
            {{--                <a href="#settings" data-toggle="tab">SETTINGS</a>--}}
            {{--            </li>--}}
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                <div class="demo-skin">

                    <div class="rightSetting">
                        <p>SIDEBAR MENU COLORS</p>
                        <button type="button"
                                class="btn btn-sidebar-light btn-border-radius p-l-20 p-r-20">Light</button>
                        <button type="button"
                                class="btn btn-sidebar-dark btn-default btn-border-radius p-l-20 p-r-20">Dark</button>
                    </div>
                    <div class="rightSetting">
                        <p>THEME COLORS</p>
                        <button type="button"
                                class="btn btn-theme-light btn-border-radius p-l-20 p-r-20">Light</button>
                        <button type="button"
                                class="btn btn-theme-dark btn-default btn-border-radius p-l-20 p-r-20">Dark</button>
                    </div>
                    <div class="rightSetting">
                        <p>SKINS</p>
                        <ul class="demo-choose-skin choose-theme list-unstyled">
                            <li data-theme="black" class="actived">
                                <div class="black-theme"></div>
                            </li>
                            <li data-theme="white">
                                <div class="white-theme white-theme-border"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple-theme"></div>
                            </li>
                            <li data-theme="blue">
                                <div class="blue-theme"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan-theme"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green-theme"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange-theme"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane stretchRight" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-green"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever switch-col-blue"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-purple"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-cyan"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked>
                                    <span class="lever switch-col-red"></span>
                                </label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label>
                                    <input type="checkbox">
                                    <span class="lever switch-col-lime"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</div>
<style>
    .copyright{
        position: absolute;
        bottom: 0 !important;
        width: 100% !important;
        text-align: center;
        font-size: 13px;
        padding: 15px;
        background: white;
        border-top: 1px solid #f1f2f7;
        z-index: 999;
    }
    .sidebar .menu .list{
        padding-bottom: 80px;
    }
</style>
