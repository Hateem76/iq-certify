@extends('frontend.layouts.main')
@section('title'){{getLangValue('contact.page_title')}}@endsection
@section('main-container')
    <style>
        .modal-content.alert.alert-success {
            background: #d1e7dd !important;
            color: #0f5132 !important;
        }
    </style>

    @if (\Session::has('success-popup'))
        <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="padding-right: 17px; display: block;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content alert alert-success">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{getLangValue('contact.success')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            {{getLangValue('contact.success_message')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif



<section class="subpage-title-wrapper c-section-bg">
    <div class="container">
        <div class="breadcrumbs-wrapper">
            <ul class="breadcrumbs">
                <li><a href="index">{{getLangValue('contact.home')}}</a></li>
                <li class="breadcrumb-current"><span>{{getLangValue('contact.contact')}}</span></li>
            </ul>
        </div>
        <h1 class="subpage-title">{{getLangValue('contact.message_title')}}</h1>
        <span class="subpage-subtitle">{{getLangValue('contact.message_subtitle')}}</span>
    </div>
</section>
<section class="content-section subpage-section">
    <div class="container">
        <div class="s-content">
            <div class="contact-container standard-content-container">
                <div class="contact-wrapper">
                    <div class="row">
                        <div class="col-lg-4 col-m-mb">
                            <div class="contact-details-wrapper">
                                <div class="standard-content-title-wrapper">
                                    <h3 class="standard-content-title">{{getLangValue('contact.send_us_a_message')}}</h3>
                                </div>
                                <div class="contact-intro-wrapper">
                                    <p class="contact-intro-text">
                                       {{getLangValue('contact.message_desc')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="contact-form-wrapper">
                                <form id="contact-form" action="{{url('contact/store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contactName" class="form-control-label">{{getLangValue('contact.name')}}</label>
                                                <div class="form-group">
                                                    <img src="{{asset('panel/img/icons/user-rounded.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="User" />
                                                    <input id="contactName" type="text" class="form-control form-control-contact" name="contactName" required placeholder="{{getLangValue('contact.name')}}...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contactEmail" class="form-control-label">{{getLangValue('contact.email')}}</label>
                                                <div class="form-group">
                                                    <img src="{{asset('panel/img/icons/letter.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="Email" />
                                                    <input id="contactEmail" type="email" class="form-control form-control-contact" required name="contactEmail" autocomplete="email" placeholder="{{getLangValue('contact.email')}}...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contactSubject" class="form-control-label">{{getLangValue('contact.subjet')}}</label>
                                        <div class="form-group">
                                            <img src="{{asset('panel/img/icons/tag-horizontal.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="Subject" />
                                            <input id="contactSubject" type="text" class="form-control form-control-contact" required name="contactSubject" placeholder="{{getLangValue('contact.subjet')}}...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contactMessage" class="form-control-label">{{getLangValue('contact.message')}}</label>
                                        <div class="auth-textarea-wrapper">
                                            <textarea name="contactMessage" id="contactMessage" class="form-control  form-control-contact form-control-textarea" required rows="5" placeholder="{{getLangValue('contact.message')}}..."></textarea>
                                        </div>
                                    </div>
                                    <!-- Google Recaptcha -->
                                    <div class="g-recaptcha mt-4" data-sitekey={{config('services.recaptcha.key')}}></div>
                                    <div class="auth-button-wrapper">
                                        <button type="submit" class="cta-btn cta-btn-acc-action">{{getLangValue('contact.send')}}</button>
                                    </div>
                                    <div id="mail-status"></div>
                                </form>
                            </div>
                        </div>
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
                <span>{{getLangValue('contact.verify_iq_title')}} <br><span class="footer-cta-typed"></span></span>
            </div>
            <div class="before-footer-cta-btn-wrapper">
                <a href="quizz" class="cta-btn cta-btn-xl animate__animated animate__pulse animate__infinite">
                    <span>{{getLangValue('contact.start_iq_button')}}</span>
                    <img src="{{asset('panel/img/icons/login-3.svg')}}" class="img-fluid svg-icon icon-white cta-btn-icon" alt="Icon Go" />
                </a>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $('.btn-close').on('click',function(){
            $('.modal').remove();

        })
    </script>
@endsection
