<div class="dashboard-panel-tab-content">
    <h3 class="dptc-title">{{getLangValue('dashboard.settings_profile_title')}}</h3>
    <form id="dashboardSettingsForm" method="POST" action="">
        <label for="fullname" class="form-control-label">{{getLangValue('dashboard.settings_fullname')}}</label>
        <div class="form-group">
            <img src="{{asset('panel/img/icons/user-id.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="User" />
            <input type="text" class="form-control form-control-pl form-control-dashboard" id="fullname" name="fullname" title="Please enter your Full Name" placeholder="{{getLangValue('dashboard.enter_yourname')}}" value="{{auth()->user()->name}}" required>
            <span class="help-block"></span>
        </div>
        {{--            <label for="fullname" class="form-control-label">Username</label>--}}
        {{--            <div class="form-group">--}}
        {{--                <img src="{{asset('panel/img/icons/user-rounded.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="User" />--}}
        {{--                <input type="text" class="form-control form-control-pl form-control-dashboard" id="username" name="username" title="Please enter your username" placeholder="Your username" value="{{auth()->user()->name}}" required>--}}
        {{--                <span class="help-block"></span>--}}
        {{--            </div>--}}
        <label for="fullname" class="form-control-label">{{getLangValue('dashboard.settings_email')}}</label>
        <div class="form-group">
            <img src="{{asset('panel/img/icons/letter.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="User" />
            <input type="email" class="form-control form-control-pl form-control-dashboard" id="email" name="email" title="{{getLangValue('dashboard.enter_youremail')}}" placeholder="{{getLangValue('dashboard.enter_youremail')}}" value="{{auth()->user()->email}}" required>
            <span class="help-block"></span>
        </div>

     {{--  <label for="fullname" class="form-control-label">Age</label>--}}
     {{--   <div class="form-group">--}}
     {{--     <img src="{{asset('panel/img/icons/letter.svg')}}" class="img-fluid svg-icon icon-green form-input-icon" alt="User" />--}}
     {{--      <input type="email" class="form-control form-control-pl form-control-dashboard" id="email" name="email" title="Please enter your email" placeholder="Age" value="{{auth()->user()->age}}">--}}
     {{--     <span class="help-block"></span>--}}
     {{--   </div>--}}
     
        <button type="submit" class="cta-btn cta-btn-acc-action cta-btn-dashboard">{{getLangValue('dashboard.save_button')}}</button>
    </form>
    <div class="dashboard-panel-additional-section">
        <h3 class="dptc-title">{{getLangValue('dashboard.subscription_title')}}</h3>
        <div class="subscription-status-wrapper">
            <div class="subscription-status-left">
                <div class="subscribtion-status"><span>{{getLangValue('dashboard.subscription_status')}}</span><span class="status-val">{{$payments->status}}</span></div>
            </div>
            <div class="subscription-status-right">
                <button class="cta-btn cta-btn-acc-action cta-btn-dashboard btn-manage-subscribtion"><img src="{{asset('panel/img/icons/settings.svg')}}" class="img-fluid svg-icon icon-white cta-btn-download-icon" alt="Icon Go" /><span>{{getLangValue('dashboard.manage_button')}}</span></button>
            </div>
        </div>
    </div>
    <div id="manage-subscribtion">
        <h3 class="dptc-title-secondary">{{getLangValue('dashboard.subscription_status')}}</h3>
        <div class="result-history-table">
            @if(count($invoices) > 1)
                <div class="result-history-row header">
                    <div class="result-history-cell">{{getLangValue('dashboard.plan_type')}}</div>
                    <div class="result-history-cell">{{getLangValue('dashboard.renews')}}</div>
                    <div class="result-history-cell">{{getLangValue('dashboard.manage')}}</div>
                </div>
                <div class="result-history-row">

                    <div class="result-history-cell result-history-cell-name" data-title="Quizz Name">{{getLangValue('dashboard.monthly_subscription')}}</div>
                    <div class="result-history-cell" data-title="Date"> {{$currentPeriodEnd}} </div>
                    <div class="result-history-cell" data-title="Report">
                        @if ($hasActiveSubscription)
                            <a href="#" class="cta-btn cta-btn-download"><img src="{{asset('panel/img/icons/bag-cross.svg')}}" class="img-fluid svg-icon icon-white cta-btn-download-icon" alt="Icon Go" /><span>{{getLangValue('dashboard.cancel_subscription_button')}}</span></a>

                            <!-- User has an active subscription -->
                        @else
                            <a href="#" class="cta-btn cta-btn-download"><img src="{{asset('panel/img/icons/bag-cross.svg')}}" class="img-fluid svg-icon icon-white cta-btn-download-icon" alt="Icon Go" /><span>{{getLangValue('dashboard.activate_subscription_button')}}</span></a>

                            <!-- User does not have an active subscription -->
                        @endif

                    </div>


                </div>
            @else
                <div class="fw-bold ">
                    <em>
                        {{getLangValue('dashboard.trial_message')}} {{$currentPeriodEnd}}
                    </em>
                </div>
            @endif
        </div>
        <div class="dashboard-panel-additional-section">
            <h3 class="dptc-title-secondary"><span style="font-weight:bold" id="toggleButton">{{getLangValue('dashboard.payment_history')}} +</span></h3>
            
            <div id="content" style="display:none;">


            <div class="result-history-row header">
                <div class="result-history-cell">{{getLangValue('dashboard.subscription_name')}}</div>
                <div class="result-history-cell">{{getLangValue('dashboard.subscription_amount')}}</div>
                <div class="result-history-cell">{{getLangValue('dashboard.subscription_date')}}</div>
                <div class="result-history-cell">{{getLangValue('dashboard.subscription_invoice')}}</div>
            </div>
            <div class="result-history-table">
                <div class="result-history-row">
                    <div class="result-history-cell result-history-cell-name" data-title="Quizz Name">{{getLangValue('dashboard.trial_subscription')}}</div>
                    <div class="result-history-cell result-history-cell-amount" data-title="Score"> <span> {{ number_format(0.60, 2) }}  €</span> </div>
                    <div class="result-history-cell" data-title="Date">
                        {{ $payments->created_at}}
                    </div>
                    <div class="result-history-cell" data-title="Report">
                    </div>
                </div>
                @if(count($invoices) > 1)
                    @foreach ($invoices as $invoice)
                        <div class="result-history-row">
                            <div class="result-history-cell result-history-cell-name" data-title="Quizz Name">{{getLangValue('dashboard.monthly_subscription')}}</div>
                            <div class="result-history-cell result-history-cell-amount" data-title="Score"> <span>{{ number_format($invoice->amount_paid / 100, 2) }} €</span> </div>
                            <div class="result-history-cell" data-title="Date"> {{ date('d/m/y h:i A', $invoice->created) }}
                                {{--                            15/7/2023 --}}
                            </div>
                            <div class="result-history-cell" data-title="Report">
                                <a href="{{$invoice->invoice_pdf}}" class="cta-btn cta-btn-download"><img src="{{asset('panel/img/icons/download-square.svg')}}" class="img-fluid svg-icon icon-white cta-btn-download-icon" alt="Icon Go" />
                                    <span>
                                        {{getLangValue('dashboard.download_receipt_button')}}
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
 
 </div>           
            
        </div>
    </div>
</div>

<script type="text/javascript">
    document.getElementById("toggleButton").addEventListener("click", function() {
    var content = document.getElementById("content");
    if (content.style.display === "none") {
        content.style.display = "block";
        this.textContent = "{{getLangValue('dashboard.payment_history')}} -";
    } else {
        content.style.display = "none";
        this.textContent = "{{getLangValue('dashboard.payment_history')}} +";
    }
});
</script>
