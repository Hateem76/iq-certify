@extends('frontend.layouts.main')
@section('title'){{getLangValue('result_before_payment.page_title')}}@endsection
@section('main-container')
    <?php
    $alphabets = [
        1=>'A',
        2=>'B',
        3=>'C',
        4=>'D',
        5=>'E',
        6=>'F'
    ]
    ?>

    <style>
        .paymenttab{
            /*display: none;*/
        }
        .error.hide {
            display: none;
        }
    </style>
    <div class="container">
        <div class="test-results-wrapper">
            <div class="test-results-inner">
                <div class="dashboardHeader">
                    <a class="header-brand" href="{{url('/')}}">
                        <img src="{{asset('panel/img/logo.png')}}" class="img-fluid logo-img" alt="Website Logo" />
                    </a>
                    <h4 class="signup-title"> {{getLangValue('result_before_payment.your_results')}}</h4>
                    <span class="signup-intro"> {{getLangValue('result_before_payment.congratulations_for_completing')}}</span>
                </div>
                <div class="test-results-content-wrapper">
                    <div class="test-results-header">
                        <h2 class="ytr-title">
                           {{getLangValue('result_before_payment.quizz_title')}}</h2>
                    </div>
                    <div class="test-results-panel">
                        <div class="trp-intro">
                            <div class="row row-dm">
                                <div class="col-lg-8 col-dp">
                                    <h2 class="trp-i-title"> {{getLangValue('result_before_payment.congratulations')}}</h2>
                                    <div class="trp-i-duration"> {{getLangValue('result_before_payment.completed_test_in')}} <span>{{$result->timer}} {{getLangValue('result_before_payment.minutes')}}</span></div>
                                    <div class="trp-i-description">{{getLangValue('result_before_payment.iq_skill')}}<strong> Visuospatial Pattern Reasoning</strong></div>
                                    <div class="trp-i-secondary">
                                        <p>{{getLangValue('result_before_payment.iq_analyzed')}}</p>
                                        <p>
                                            {{getLangValue('result_before_payment.result_available')}}
                                        </p>
                                    </div>
                                    <div class="total-summary-content total-summary-content-secondary total-summary-content-secondary-top">
                                        <div class="total-summary-left">
                                            <span class="tsl-title">{{getLangValue('result_before_payment.total')}}</span>
                                        </div>
                                        <div class="total-summary-right">
                                            <div class="total-summary-val">0.60€</div>
                                        </div>
                                    </div>
                                    <div class="secondary-payment-cta">
                                        <div class="secondary-payment-cta-left">
                                        </div>
                                        <div class="secondary-payment-cta-right">
                                            <div class="cta-btn cta-btn-big payment-cta-trigger">
                                                <span>{{getLangValue('result_before_payment.get_iq_results')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-dp">
                                    <img src="https://placehold.co/600x700" alt="" class="img-fluid result-demo-img" />
                                </div>
                            </div>
                        </div>
                        <div class="order-details">
                            <div class="order-details-header">
                                <span>{{getLangValue('result_before_payment.order_details')}}</span>
                            </div>
                            <div class="order-details-content">
                                <div class="order-details-row">
                                    <div class="order-details-row-left">
                                        <span class="odr-number">1.</span>
                                        <div class="odr-details">
                                            <h4 class="odr-title">{{getLangValue('result_before_payment.iq_evaluation_score')}}</h4>
                                            <span class="odr-desc">{{getLangValue('result_before_payment.iq_evaluation_desc')}}</span>
                                        </div>
                                    </div>
                                    <div class="order-details-row-right">
                                        <div class="odr-score">
                                            <span>{{getLangValue('result_before_payment.your_iq_score')}}</span>
                                            <div class="odr-score-icon-w">
                                                <img src="{{asset('panel/img/icons/question-circle.svg')}}" class="img-fluid svg-icon icon-green odr-score-icon" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-details-row">
                                    <div class="order-details-row-left">
                                        <span class="odr-number">2.</span>
                                        <div class="odr-details">
                                            <h4 class="odr-title">{{getLangValue('result_before_payment.iq_certificate')}}</h4>
                                            <span class="odr-desc">{{getLangValue('result_before_payment.iq_certificate_desc')}} <span class="odr-hs"></span> </span>
                                        </div>
                                    </div>
                                    <div class="order-details-row-right">
                                        <div class="odr-cert-example">
                                            <img src="{{asset('panel/img/certificate-example.png')}}" class="img-fluid cert-example-img" alt="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="order-details-row">
                                    <div class="order-details-row-left">
                                        <span class="odr-number">3.</span>
                                        <div class="odr-details">
                                            <h4 class="odr-title">{{getLangValue('result_before_payment.iq_performance_report')}}</h4>
                                            <span class="odr-desc">{{getLangValue('result_before_payment.iq_performance_report_desc')}} <span class="odr-hs">{{getLangValue('result_before_payment.high_quality_pdf')}}  - <a href="#">{{getLangValue('result_before_payment.see_example_report')}}</a></span> </span>
                                        </div>
                                    </div>
                                    <div class="order-details-row-right">
                                        <div class="odr-cert-example">
                                            <img src="{{asset('panel/img/report-example.png')}}" class="img-fluid report-example-img" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="total-summary-content">
                                <div class="total-summary-left">
                                    <span class="tsl-title">{{getLangValue('result_before_payment.total')}}:</span>
                                    <span class="tsl-secondary">({{getLangValue('result_before_payment.no_additional_costs')}})</span>
                                </div>
                                <div class="total-summary-right">
                                    <div class="total-summary-val">0.60€</div>
                                </div>
                            </div>
                            <div class="payment-cta-wrapper">
                                <div class="cta-btn cta-btn-big payment-cta-trigger">
                                    <span>{{getLangValue('result_before_payment.get_iq_results')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="payment-modal-wrapper mfp-hide">
        <div class="payment-modal-content">
            <div class="pmc-header">
                <h4>{{getLangValue('result_before_payment.make_payment')}}</h4>
            </div>
            <div class="pmc-content">
                <div class="pmc-content-form-wrapper">
                    <div class="payment-form-wrapper">
                        <form
                                id="paymentForm"
                                role="form"
                                action="{{ url('paynow') }}"
                                method="post"
                                class="require-validation"
                                data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                id="payment-form">
                            @csrf
                            <input type="hidden" name="key" value="{{$key}}">
                            <div class="paymenttab">
                                <div class="payment-form-section-title-wrapper payment-form-section-title-wrapper-mt mt-0">
                                    <h4 class="payment-form-section-title">{{getLangValue('result_before_payment.payment_details')}}</h4>
                                    <span class="pfst-decor"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default credit-card-box">
                                            <div class="panel-heading display-table" >
                                            </div>
                                            <div class="panel-body">
                                                <div class='form-row row'>
                                                    <div class='col-xs-12 form-group required'>
                                                        <label class='form-control-label'>{{getLangValue('result_before_payment.name_on_card')}}</label>
                                                        <input placeholder="{{getLangValue('result_before_payment.name_example')}}" class=' form-control-pl form-control-payment form-control' size='4' type='text'>
                                                    </div>
                                                </div>
                                                <div class='form-row row'>
                                                    <div class='col-xs-12 col-md-6  form-group required'>
                                                        <label class='form-control-label'>{{getLangValue('result_before_payment.card_number')}}</label> <input
                                                                autocomplete='off' class='form-control form-control-pl form-control-payment card-number' id="cardnumber" maxlength='19'
                                                                type='text' pattern="[0-9]{4}( [0-9]{4}){3}" title="Please enter a valid 16-digit credit card number" placeholder="0000 0000 0000 0000">
                                                        <div class="cards-svg-wrapper pe-3">
                                                            <img src="{{asset('panel/img/visa.svg')}}" class="img-fluid card-i-img card-i-img-l" alt="">
                                                            <img src="{{asset('panel/img/mastercard.svg')}}" class="img-fluid card-i-img" alt="">
                                                        </div>
                                                    </div>
                                                    <div class='col-xs-12 col-md-3 form-group expiration required'>
                                                        <label class='form-control-label'>{{getLangValue('result_before_payment.expiration')}}</label> <input
                                                        <input type="text" class="card-expiry form-control form-control-pl form-control-payment" placeholder="07/24" maxlength="5">
                                                    </div>
                                                    <div class='col-xs-12 col-md-3 form-group cvc required'>
                                                        <label class='form-control-label'>{{getLangValue('result_before_payment.cvv')}}</label>
                                                        <input autocomplete='off'
                                                               class='form-control form-control-pl form-control-payment card-cvc' placeholder='CVC' maxlength='4'
                                                               type='text'>
                                                        <div class="cvc-svg-wrapper pe-3">
                                                            <img src="{{asset('panel/img/cvc.svg')}}" class="img-fluid cvc-img" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='form-row row'>
                                                    <div class='col-md-12 error form-group hide'>
                                                        <div class='alert-danger alert'>
                                                            {{getLangValue('result_before_payment.please_correct_errors')}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="total-summary-content total-summary-content-secondary total-summary-content-secondary-top mt-3">
                                                            <div class="total-summary-left">
                                                                <span class="tsl-title">{{getLangValue('result_before_payment.total')}}:</span>
                                                            </div>
                                                            <div class="total-summary-right">
                                                                <div class="total-summary-val">0.60€</div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="cta-btn cta-btn-acc-action cta-btn-dashboard btn-cta-pay-now">{{getLangValue('result_before_payment.pay_now')}}</button>
                                                        <div class="pmc-secure-notice">
                                                            <img src="{{asset('panel/img/icons/lock-keyhole-minimalistic.svg')}}" class="img-fluid svg-icon icon-green secure-payment-icon" alt="User" />
                                                            <span>{{getLangValue('result_before_payment.secure_and_encripted_alert')}}</span>
                                                        </div>
                                                        <div class="pmc-secondary-notice">
                                                            <span>{{getLangValue('result_before_payment.subscription_notice')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/
            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    var expiryData = parseExpiry($('.card-expiry').val());
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month:  expiryData == null ? 01 : expiryData.exp_month,
                        exp_year: expiryData == null ? 2000 : expiryData.exp_year
                    }, stripeResponseHandler);

                }
            });
            function parseExpiry(expiry) {
                const parts = expiry.split('/');
                if (parts.length === 2) {
                    const [month, year] = parts;
                    const currentYear = new Date().getFullYear() % 100;
                    if (parseInt(year) >= currentYear && parseInt(month) >= 1 && parseInt(month) <= 12) {
                        return {
                            exp_month: parseInt(month),
                            exp_year: parseInt(year)
                        };
                    }
                }
                return null;
            }

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
    <style>
        .has-error input {
            border-color: red;
        }
    </style>
@endsection
