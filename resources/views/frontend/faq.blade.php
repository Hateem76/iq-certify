@extends('frontend.layouts.main')
@section('title'){{getLangValue('faq.page_title')}}@endsection
@section('main-container')

<section class="subpage-title-wrapper c-section-bg">
    <div class="container">
        <div class="breadcrumbs-wrapper">
            <ul class="breadcrumbs">
                <li><a href="index">{{getLangValue('faq.home')}}</a></li>
                <li class="breadcrumb-current"><span>{{getLangValue('faq.faq')}}</span></li>
            </ul>
        </div>
        <h1 class="subpage-title">{{getLangValue('faq.faq_title')}}</h1>
        <span class="subpage-subtitle">{{getLangValue('faq.faq_desc')}}</span>
    </div>
</section>
<section class="content-section subpage-section">
    <div class="container">
        <div class="s-content">
            <div class="faq-container">
                <div class="accordion faq-content" id="accordionFAQ">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-item-1" aria-expanded="true" aria-controls="faq-item-1">
                                <span>1.</span> {{getLangValue('faq.title_01')}}
                            </button>
                        </h2>
                        <div id="faq-item-1" class="accordion-collapse collapse show" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                <p>{{getLangValue('faq.desc_01-1')}}</p>
                                <p>{{getLangValue('faq.desc_01-2')}}</p>
                                <p>{{getLangValue('faq.desc_01-3')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-item-2" aria-expanded="false" aria-controls="faq-item-2">
                                <span>2.</span>{{getLangValue('faq.title_02')}}
                            </button>
                        </h2>
                        <div id="faq-item-2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                <p>{{getLangValue('faq.desc_02-1')}}</p>
                                <p>{{getLangValue('faq.desc_02-2')}}</p>
                                <p>{{getLangValue('faq.desc_02-3')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-item-3" aria-expanded="false" aria-controls="faq-item-3">
                                <span>3.</span>{{getLangValue('faq.title_03')}}
                            </button>
                        </h2>
                        <div id="faq-item-3" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                <p>{{getLangValue('faq.desc_03-1')}}</p>
                                <p>{{getLangValue('faq.desc_03-2')}}</p>
                                <p>{{getLangValue('faq.desc_03-3')}}</p>
                                <table width="0">
                                    <tbody>
                                    <tr>
                                        <td width="50%">
                                            <strong>{{getLangValue('faq.desc_03-iq_scale')}}</strong>
                                        </td>
                                        <td width="50%">
                                            <strong>{{getLangValue('faq.desc_03-percentile_range')}}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">+130</td>
                                        <td width="50%">99</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">116 – 130</td>
                                        <td width="50%">68 – 98</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">101 – 115</td>
                                        <td width="50%">51 – 67</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">100</td>
                                        <td width="50%">50</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">85 – 99</td>
                                        <td width="50%">33 – 49</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">70 – 84</td>
                                        <td width="50%">2 – 32</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">-70</td>
                                        <td width="50%">1</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-item-4" aria-expanded="false" aria-controls="faq-item-4">
                                <span>4.</span>{{getLangValue('faq.title_04')}}
                            </button>
                        </h2>
                        <div id="faq-item-4" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                            <p>{{getLangValue('faq.desc_04-1')}}</p>
                                </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-item-5" aria-expanded="false" aria-controls="faq-item-5">
                                <span>5.</span>{{getLangValue('faq.title_05')}}
                            </button>
                        </h2>
                        <div id="faq-item-5" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                            <p>{{getLangValue('faq.desc_05-1')}}</p>                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-item-6" aria-expanded="false" aria-controls="faq-item-6">
                                <span>6.</span>{{getLangValue('faq.title_06')}}
                            </button>
                        </h2>
                        <div id="faq-item-6" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                            <p>{{getLangValue('faq.desc_06-1')}}</p>                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-item-7" aria-expanded="false" aria-controls="faq-item-7">
                                <span>7.</span>{{getLangValue('faq.title_07')}}
                            </button>
                        </h2>
                        <div id="faq-item-7" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                            <p>{{getLangValue('faq.desc_07-1')}}</p>
                            <p>{{getLangValue('faq.desc_07-2')}}</p>
                            <a href="contact">{{getLangValue('faq.desc_07-message')}}</a> </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</section>
<div class="before-footer-cta-wrapper">
    <div class="container">
        <div class="before-footer-cta-content">
            <div class="before-footer-cta-text">
                <span>{{ App\Helpers\Translations::Translations('Take this IQ test and check') }} <br><span class="footer-cta-typed"></span></span>
            </div>
            <div class="before-footer-cta-btn-wrapper">
                <a href="quizz" class="cta-btn cta-btn-xl animate__animated animate__pulse animate__infinite">
                    <span>{{ App\Helpers\Translations::Translations('Start IQ Test') }}</span>
                    <img src="{{asset('panel/img/icons/login-3.svg')}}" class="img-fluid svg-icon icon-white cta-btn-icon" alt="Icon Go" />
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
