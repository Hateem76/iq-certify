@extends('frontend.layouts.main')
@section('title'){{getLangValue('additional_info.page_title')}}@endsection
@section('main-container')
    <style>
        header{
            display:none;
        }
    </style>
    <div class="additional-info-wrapper">
        <div class="additional-info-inner">
            <div class="dashboardHeader">
                <a class="header-brand" href="index">
                    <img src="{{asset('panel/img/logo.png')}}" class="img-fluid logo-img" alt="Website Logo" />
                </a>
                <h4 class="signup-title">{{getLangValue('additional_info.almost_done')}}</h4>
                <span class="signup-intro">{{getLangValue('additional_info.almost_done_desc')}}</span>
            </div>
            <div class="additional-info-content-wrapper">
                <div class="additional-info-header">
                    <h2 class="ytr-title ytr-title-proc">{{getLangValue('additional_info.additional_info_title')}}</h2>
                </div>
                <div class="additional-info-panel">
                    <div class="additional-info-form-wrapper">
                        <form id="additionalInfoFor" method="POST" action="{{url('register-ses')}}">
                            @csrf
                            <input type="hidden" name="key" value="{{$key}}">
                            <div class="ai-form-section ai-form-section-1">
                                <div class="ai-form-header">
                                    <div class="ai-fh-num">1.</div>
                                    <div class="ai-fg-steps-wrapper">
                                        <div class="ai-fg-step ai-fg-step-active"></div>
                                        <div class="ai-fg-step"></div>
                                        <div class="ai-fg-step"></div>
                                        <div class="ai-fg-step"></div>
                                    </div>
                                    <h4 class="ai-form-section-title">{{getLangValue('additional_info.how_should_we_call_you')}}</h4>
                                </div>
                                <div class="form-group">
                                    <input type="text" value="{{old('name')}}"  class="form-control form-control-pl form-control-add-info" id="ai-name" name="name" placeholder="{{getLangValue('additional_info.your_name')}}..." required>
                                </div>
                                <div class="ai-form-btn-wrapper text-center">
                                    <div class="cta-btn cta-btn-big add-info-cta-btn aicb-1">
                                        <span>{{getLangValue('additional_info.next')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ai-form-section ai-form-section-2">
                                <div class="ai-form-header">
                                    <div class="ai-fh-num">2.</div>
                                    <div class="ai-fg-steps-wrapper">
                                        <div class="ai-fg-step ai-fg-step-active"></div>
                                        <div class="ai-fg-step ai-fg-step-active"></div>
                                        <div class="ai-fg-step"></div>
                                        <div class="ai-fg-step"></div>
                                    </div>
                                    <h4 class="ai-form-section-title animate__animated animate__bounceIn animation-delay-200">{{getLangValue('additional_info.what_is_your_email')}}</h4>
                                </div>
                                <div class="form-group animate__animated animate__bounceIn animation-delay-400">
                                    <input type="email" value="{{old('email')}}" class="form-control form-control-pl form-control-add-info" id="ai-email" name="email" placeholder="{{getLangValue('additional_info.your_email')}}..." required>
                                </div>
                                <div class="ai-form-btn-wrapper text-center animate__animated animate__bounceIn animation-delay-600">
                                    <div class="cta-btn cta-btn-big add-info-cta-btn aicb-2">
                                        <span>{{getLangValue('additional_info.next')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ai-form-section ai-form-section-3">
                                <div class="ai-form-header">
                                    <div class="ai-fh-num">3.</div>
                                    <div class="ai-fg-steps-wrapper">
                                        <div class="ai-fg-step ai-fg-step-active"></div>
                                        <div class="ai-fg-step ai-fg-step-active"></div>
                                        <div class="ai-fg-step ai-fg-step-active"></div>
                                        <div class="ai-fg-step"></div>
                                    </div>
                                    <h4 class="ai-form-section-title animate__animated animate__bounceIn animation-delay-200">{{getLangValue('additional_info.what_is_your_gender_age_and_country')}}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group animate__animated animate__bounceIn animation-delay-400">
                                            <select id="ai-gender" name="gender" class="form-control form-control-add-info form-control-select form-control-add-info-select" required>
                                                <option value="" disabled selected>{{getLangValue('additional_info.your_gender')}}</option>
                                                <option value="Male">{{getLangValue('additional_info.gender_male')}}</option>
                                                <option value="Female">{{getLangValue('additional_info.gender_female')}}</option>
                                                <option value="Other">{{getLangValue('additional_info.gender_other')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group animate__animated animate__bounceIn animation-delay-600">
                                            <select id="ai-age" name="age" class="form-control form-control-add-info form-control-select form-control-add-info-select" required>
                                                <option value="" disabled selected>{{getLangValue('additional_info.your_age')}}...</option>
                                                <option value="10-15">10-15</option>
                                                <option value="15-20">15-20</option>
                                                <option value="20-30">20-30</option>
                                                <option value="30-40">30-40</option>
                                                <option value="40-50">40-50</option>
                                                <option value="50-60">50-60</option>
                                                <option value="60-70">60-70</option>
                                                <option value="70+">70+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group animate__animated animate__bounceIn animation-delay-800">
                                            <select id="ai-country" name="country" class="form-control form-control-add-info form-control-select form-control-add-info-select" required>
                                                <option value="" disabled selected>{{getLangValue('additional_info.select_country')}}...</option>
                                                @foreach($countries as $countr)
                                                    <option {{$countr->nicename == $country ? 'selected' : ''}} value="{{$countr->nicename}}">{{$countr->nicename}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="ai-form-btn-wrapper text-center animate__animated animate__bounceIn animation-delay-1000">
                                    <div class="cta-btn cta-btn-big add-info-cta-btn aicb-3">
                                        <span>{{getLangValue('additional_info.next')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ai-form-section ai-form-section-4">
                                <div class="ai-form-header">
                                    <div class="ai-fh-num">4.</div>
                                    <div class="ai-fg-steps-wrapper">
                                        <div class="ai-fg-step ai-fg-step-active"></div>
                                        <div class="ai-fg-step ai-fg-step-active"></div>
                                        <div class="ai-fg-step ai-fg-step-active"></div>
                                        <div class="ai-fg-step ai-fg-step-active"></div>
                                    </div>
                                    <h4 class="ai-form-section-title animate__animated animate__bounceIn animation-delay-200">{{getLangValue('additional_info.your_education')}}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group animate__animated animate__bounceIn animation-delay-400">
                                            <select id="ai-study-level" name="level" class="form-control form-control-add-info form-control-select form-control-add-info-select" required>
                                                <option value="" disabled selected>{{getLangValue('study_levels.study_level')}}...</option>
                                                <option value="No studies">{{getLangValue('study_levels.no_studies')}}</option>
                                                <option value="Primary education">{{getLangValue('study_levels.primary_education')}}</option>
                                                <option value="Secondary education">{{getLangValue('study_levels.secondary_education')}}</option>
                                                <option value="High School studies">{{getLangValue('study_levels.high_school')}}</option>
                                                <option value="University or higher studies">{{getLangValue('study_levels.university_or_higher_studies')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group animate__animated animate__bounceIn animation-delay-600">
                                            <select id="ai-study-field" name="field" class="form-control form-control-add-info form-control-select form-control-add-info-select" required>
                                                <option value="" disabled selected>{{getLangValue('study_levels.study_field')}}...</option>
                                                <option value="Without university studies">{{getLangValue('study_levels.without_university_studies')}}</option>
                                                <option value="Agriculture">{{getLangValue('study_levels.agriculture')}}</option>
                                                <option value="Architecture and urbanism">{{getLangValue('study_levels.architecture_and_urbanism')}}</option>
                                                <option value="Art and design">{{getLangValue('study_levels.art_and_design')}}</option>
                                                <option value="Commercial and management">{{getLangValue('study_levels.commercial_and_management')}}</option>
                                                <option value="Education">{{getLangValue('study_levels.education')}}</option>                                                
                                                <option value="Engineering and technology">{{getLangValue('study_levels.engineering_and_technology')}}</option>
                                                <option value="Geography and geology">{{getLangValue('study_levels.geography_and_geology')}}</option>                                                
                                                <option value="Letters and culture">{{getLangValue('study_levels.letters_and_culture')}}</option>                                                
                                                <option value="Languages and philology">{{getLangValue('study_levels.languages_and_philology')}}</option>
                                                <option value="Law">{{getLangValue('study_levels.law')}}</option>
                                                <option value="Math and Computer sciences">{{getLangValue('study_levels.math_and_computer_sciences')}}</option>   
                                                <option value="Medical sciences">{{getLangValue('study_levels.medical_sciences')}}</option>
                                                <option value="Natural sciences">{{getLangValue('study_levels.natural_sciences')}}</option>
                                                <option value="Social sciences">{{getLangValue('study_levels.social_sciences')}}</option>
                                                <option value="Communication and information">{{getLangValue('study_levels.communication_and_information')}}</option>                                                   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="ai-form-btn-wrapper text-center animate__animated animate__bounceIn animation-delay-800">
                                    <div class="cta-btn cta-btn-big add-info-cta-btn aicb-4">
                                        <span>{{getLangValue('additional_info.next')}}</span>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="additional-info-proc-wrapper">
                        <div class="row row-dm">
                            <div class="col-lg-12 col-dp">
                                <div class="console-proc-left animate__animated animate__bounceIn animation-delay-200">
                                    <div class="circlePercent">
                                        <div class="counter" data-percent="0"></div>
                                        <div class="progress"></div>
                                        <div class="progressEnd"></div>
                                    </div>
                                    <div class="console-msg-wrapper animate__animated animate__pulse animate__infinite">{{getLangValue('additional_info.evaluation_in_progress')}}</div>
                                    <div id="progressBar" class="proccessing-loadbar"><div></div></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-dp">
                                <div class="console-proc-right">
                                    <div class="console-categories-wrapper">
                                        <div class="console-categories-item animate__animated animate__bounceIn animation-delay-400">
                                            <div class="console-categories-item-content ccic-1">
                                                <img src="{{asset('panel/img/icons/check-circle.svg')}}" class="img-fluid svg-icon console-cat-icon" alt="Checkmark" />
                                                <span>{{getLangValue('additional_info.visual_perception')}}</span>
                                            </div>
                                        </div>
                                        <div class="console-categories-item animate__animated animate__bounceIn animation-delay-600">
                                            <div class="console-categories-item-content ccic-2">
                                                <img src="{{asset('panel/img/icons/check-circle.svg')}}" class="img-fluid svg-icon console-cat-icon" alt="Checkmark" />
                                                <span>{{getLangValue('additional_info.abstract_reasoning')}}</span>
                                            </div>
                                        </div>
                                        <div class="console-categories-item animate__animated animate__bounceIn animation-delay-800">
                                            <div class="console-categories-item-content ccic-3">
                                                <img src="{{asset('panel/img/icons/check-circle.svg')}}" class="img-fluid svg-icon console-cat-icon" alt="Checkmark" />
                                                <span>{{getLangValue('additional_info.pattern_recognition')}}</span>
                                            </div>
                                        </div>
                                        <div class="console-categories-item animate__animated animate__bounceIn animation-delay-1000">
                                            <div class="console-categories-item-content ccic-4">
                                                <img src="{{asset('panel/img/icons/check-circle.svg')}}" class="img-fluid svg-icon console-cat-icon" alt="Checkmark" />
                                                <span>{{getLangValue('additional_info.spatial_orientation')}}</span>
                                            </div>
                                        </div>
                                        <div class="console-categories-item animate__animated animate__bounceIn animation-delay-1200">
                                            <div class="console-categories-item-content ccic-5">
                                                <img src="{{asset('panel/img/icons/check-circle.svg')}}" class="img-fluid svg-icon console-cat-icon" alt="Checkmark" />
                                                <span>{{getLangValue('additional_info.analytical_thinking')}}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="additionalbutton w-100 text-center pt-5" style="display: none">
                                        <p class="m-0">{{getLangValue('additional_info.no_redirect_text')}}</p>
                                        <button class="submitaddition  border-0 bg-white border-bottomn p-0" type="submit">{{getLangValue('additional_info.click_here')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection


@section('script')
    <script>
        $('input').bind('keydown', function(event) {
            myFunction(this,event)
        });
        $('select').bind('keydown', function(event) {
            myFunction(this,event)
        });
        function myFunction(button) {
            if (event.keyCode === 9) {
                $(button).parents('.ai-form-section').find('.add-info-cta-btn').click();
                event.preventDefault();
            }
        }
    </script>
@endsection