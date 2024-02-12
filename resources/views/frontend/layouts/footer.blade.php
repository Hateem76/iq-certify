<footer>
    <div class="container">
        <div class="footer-branding-wrapper">
            <img src="{{asset('panel/img/logo-w.png')}}" class="img-fluid logo-img" alt="Footer Logo" />
        </div>
        <div class="footer-cols-wrapper">
            <div class="row frow-dm">
                <div class="col-md-6 col-sm-6 footer-col fcol-dp">
                    <div class="footer-col-nav-wrapper row">
                        <div class="footer-col-title-wrapper">
                            <h3 class="footer-col-title">{{getLangValue('footer.navigation')}}</h3>
                            <span class="footer-col-title-border"></span>
                        </div>
                        <ul class="footer-col-nav col-6">
                            <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="index">{{getLangValue('footer.home')}}</a>
                            </li>
                            <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="pricing">{{getLangValue('footer.pricing')}}</a>
                            </li>
                            <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="about">{{getLangValue('footer.about')}}</a>
                            </li>
                        </ul>
                        <ul class="footer-col-nav col-6">

                        <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="faq">{{getLangValue('footer.iqreport_demo')}}</a>
                            </li>
                            <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="faq">{{getLangValue('footer.faq')}}</a>
                            </li>
                            <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="contact">{{getLangValue('footer.contact')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 footer-col footer-col-second fcol-dp">
                    <div class="footer-col-nav-wrapper row">
                        <div class="footer-col-title-wrapper">
                            <h3 class="footer-col-title">{{getLangValue('footer.useful_links')}}</h3>
                            <span class="footer-col-title-border"></span>
                        </div>
                        <ul class="footer-col-nav  col-6">
                            <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="dashboard">{{getLangValue('footer.dashboard')}}</a>
                            </li>
                            <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="login">{{getLangValue('footer.login')}}</a>
                            </li>
                            <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="register">{{getLangValue('footer.sign_up')}}</a>
                            </li>
                        </ul>
                        <ul class="footer-col-nav  col-6">
                        <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="privacy-policy">{{getLangValue('footer.privacy')}}</a>
                            </li>
                            <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="cookies">{{getLangValue('footer.cookies')}}</a>
                            </li>
                            <li>
                                <img src="{{asset('panel/img/icons/arrow-right.svg')}}" class="img-fluid footer-nav-icon" alt="Checkmark" />
                                <a href="terms-of-use">{{getLangValue('footer.terms')}}</a>
                            </li>

                            <li class="nav-button">
                                @php
                                    $language = \App\Models\Language::where('status',1)->get();
                                                                      $selected = App\Helpers\Translations::Selectedlanguage();
                                    $selectedquer = \App\Models\Language::where('code',$selected)->first();
                                @endphp

                                <div class="dropdown country-switcher">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset('images/flag'.'/'.$selectedquer->flag)}}" alt="">

                                        {{$selectedquer->name}}
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                        @foreach($language as $lang)
                                            <li>
                                                <a class="dropdown-item" href="{{url('switcher',$lang->code)}}?return={{ \Illuminate\Support\Facades\Route::current()->getName() }}">
                                                    <img src="{{asset('images/flag'.'/'.$lang->flag)}}" alt="">
                                                    {{$lang->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>


{{--                                <select class="btn btn-dark" id="selectRedirect">--}}
{{--                                    @foreach($language as $lang)--}}
{{--                                        <option {{$selected == $lang->code ? 'selected' : ''}} value="{{url('switcher',$lang->code)}}">{{$lang->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="copyright-wrapper">
                <span class="copyright">@IQ-Certify.com 2024</span>
                <div class="payment-methods">
                    <span class="copyright-payment-methods-text">{{getLangValue('footer.payment_methods')}}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="214" height="40" viewBox="0 0 214 40">
                        <g fill="#FFF" fill-rule="evenodd">
                            <path d="M44.823 13.26h-3.004c-.933 0-1.627.254-2.037 1.184l-5.773 13.074h4.083s.666-1.758.817-2.143l4.979.006c.116.498.474 2.137.474 2.137h3.606L44.823 13.26zm-4.795 9.196c.32-.819 1.549-3.987 1.549-3.987-.021.039.317-.825.518-1.362l.262 1.23.9 4.119h-3.229zm-5.747.394c-.028 2.963-2.683 4.875-6.77 4.875-1.743-.018-3.422-.361-4.332-.76l.547-3.193.501.228c1.277.532 2.104.747 3.661.747 1.117 0 2.313-.438 2.325-1.393.007-.625-.501-1.07-2.016-1.77-1.476-.683-3.43-1.827-3.405-3.876.021-2.773 2.729-4.708 6.57-4.708 1.507 0 2.713.31 3.483.599l-.526 3.092-.35-.165a7.177 7.177 0 0 0-2.91-.546c-1.522 0-2.228.634-2.228 1.227-.008.668.824 1.108 2.184 1.77 2.247 1.015 3.283 2.252 3.266 3.873zm-16.563-9.592l-6.123 14.239-4.113.007L4 15.607c2.503 1.602 4.635 4.144 5.386 5.914l.406 1.469 3.807-9.729 4.119-.003zm1.572-.012h3.89l-2.433 14.266h-3.888l2.43-14.266z"></path>
                            <path d="M0 13.408l.05-.286h6.028c.813.031 1.468.29 1.694 1.159l1.311 6.304C7.795 17.288 4.691 14.545 0 13.408zM86.63 13c2.46 0 5.213.497 6.785 1.837 1.32 1.124 1.754 2.874 1.831 4.571h-8.638v.583h8.652c0 1.94-.539 4.074-2.097 5.34C91.6 26.601 89.016 27 86.63 27c-2.457 0-5.004-.355-6.576-1.69C78.576 24.054 78 21.874 78 20c0-1.789.295-3.78 1.657-5.018C81.237 13.546 84.07 13 86.63 13zm21.214 6.988c1.758.088 3.156 1.622 3.156 3.392a3.31 3.31 0 0 1-3.156 3.298v.01H95.826V19.99h12.018zm-.517-6.717c.115-.013.261.01.379.01a3.045 3.045 0 0 1 3.074 3.058c0 1.614-1.25 2.933-2.838 3.07H95.826V13.27z"></path>
                            <g>
                                <path d="M186.697 23.726c.905 0 2.22-.664 2.22-.664l-.48 2.947s-1.444.37-2.348.37c-3.204 0-4.83-2.225-4.83-5.593 0-5.08 3.014-7.786 6.111-7.786 1.399 0 3.023.661 3.023.661l-.438 2.862s-1.098-.772-2.463-.772c-1.826 0-3.464 1.754-3.464 4.942 0 1.57.763 3.033 2.67 3.033zm26.202.934a.742.742 0 0 0-.304.305.813.813 0 0 0 0 .815c.071.13.172.233.3.306a.813.813 0 0 0 1.217-.712.82.82 0 0 0-.107-.41.736.736 0 0 0-.306-.304.807.807 0 0 0-.8 0zm.99.37a.68.68 0 0 1 .003.68.686.686 0 0 1-.588.347.683.683 0 0 1-.587-1.027.676.676 0 0 1 1.172 0zM202.99 21.92c0 2.214 1.094 4.382 3.327 4.382 1.609 0 2.5-1.128 2.5-1.128l-.117.964h2.61l2.052-12.843-2.692.005-.579 3.614s-1.009-1.405-2.591-1.405c-2.461.001-4.51 2.985-4.51 6.412zm6.432-1.573c0 1.427-.701 3.332-2.155 3.332-.967 0-1.42-.815-1.42-2.096 0-2.095.935-3.476 2.115-3.476.964.002 1.46.669 1.46 2.24zm3.521 4.596v.882h.143v-.375h.082c.05 0 .09.01.114.03a.892.892 0 0 1 .15.208l.075.139h.175l-.107-.174a1.096 1.096 0 0 0-.129-.175.2.2 0 0 0-.075-.045.268.268 0 0 0 .181-.08.229.229 0 0 0 .028-.297.247.247 0 0 0-.108-.087.67.67 0 0 0-.223-.026h-.306zm.506.18a.13.13 0 0 1-.02.168c-.032.026-.086.037-.167.037h-.173v-.266h.16c.07 0 .115.005.143.014a.138.138 0 0 1 .057.047zm-18.82-9.684c-1.844 0-3.253.595-3.253.595l-.39 2.327s1.164-.476 2.924-.476c1 0 1.732.112 1.732.93 0 .496-.092.68-.092.68s-.786-.065-1.154-.065c-2.32 0-4.757.994-4.757 4.003 0 2.369 1.6 2.91 2.591 2.91 1.892 0 2.71-1.236 2.753-1.24l-.088 1.033h2.361l1.054-7.437c.006-3.159-2.732-3.26-3.681-3.26zm-1.322 8.64c-.835 0-1.05-.64-1.05-1.021 0-.739.398-1.627 2.365-1.627.457.001.506.049.584.063.05.455-.285 2.584-1.9 2.584zm9.956-5.349c-1.862-.663-2.005 2.965-2.79 7.438h-2.754l1.675-10.469h2.5l-.24 1.518s.893-1.65 2.095-1.65c.35 0 .516.034.516.034-.356.73-.673 1.4-1.002 3.13zM166 14.122l-.273 1.575h1.34l-.344 2.54h-1.42l-.753 4.686c-.06.369.043.871.977.871.238 0 .508-.08.692-.08l-.336 2.296c-.27.075-1.033.348-2.012.355-1.25.012-2.139-.695-2.139-2.29 0-1.07 1.525-9.895 1.585-9.953H166zm5.431 1.274c2.946 0 3.826 2.17 3.826 3.95 0 .712-.353 2.462-.353 2.462h-5.454s-.504 2.163 2.378 2.163c1.353 0 2.85-.665 2.85-.665l-.473 2.604s-.866.444-2.835.444c-2.133 0-4.636-.906-4.636-4.723 0-3.308 1.998-6.234 4.697-6.235zm-20.311.043c.95 0 3.685.102 3.687 3.26l-1.054 7.438h-2.363l.088-1.032c-.041.003-.859 1.239-2.753 1.239-.993 0-2.591-.541-2.591-2.91 0-3.009 2.438-4.003 4.76-4.003.365 0 1.153.065 1.153.065s.089-.184.089-.68c0-.818-.73-.93-1.73-.93-1.763 0-2.926.476-2.926.476l.39-2.328s1.41-.595 3.25-.595zm8.231.018c1.534 0 2.477.212 2.477.212l-.34 2.383s-1.455-.12-1.832-.12c-.957.001-1.477.211-1.477.882 0 1.349 3.198.686 3.198 4.042 0 3.59-3.455 3.432-4.059 3.432-2.252 0-2.948-.312-3.012-.33l.358-2.363c.004-.018 1.13.413 2.385.413.723 0 1.662-.072 1.662-.94 0-1.306-3.36-.99-3.36-4.085 0-2.728 2.014-3.526 4-3.526zm21.86.112c.35-.004.518.031.518.031-.357.732-.672 1.402-.999 3.133-1.862-.663-2.008 2.966-2.79 7.437h-2.754l1.675-10.468h2.499l-.242 1.517s.89-1.65 2.092-1.65zm-41.148-2.282l.137 7.892 2.645-7.892h4.25l-2.116 12.862h-2.748l1.529-9.696-3.449 9.696h-1.848l-.24-9.696-1.633 9.696H134l2.146-12.862h3.917zm11.047 8.144c-1.967 0-2.366.89-2.366 1.628 0 .381.218 1.02 1.05 1.02 1.618 0 1.952-2.13 1.9-2.585-.077-.014-.125-.06-.584-.063zm20.33-3.615c-1.463 0-1.744 1.675-1.744 1.85h2.979c0-.137.28-1.85-1.235-1.85z"></path>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</footer>
<style>
    .dropdown.country-switcher img {
        width: 35px;
    }

    .dropdown.country-switcher button {
        display: flex;
        align-items: center;
        gap: 12px;
    }
</style>
</body>

<!-- JS -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('panel/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('panel/js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('panel/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('panel/js/jquery.flipbox.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript" src="{{asset('panel/js/typed.umd.js')}}"></script>
<script type="text/javascript" src="{{asset('panel/js/custom.js')}}"></script>
@yield('script')

</html>
