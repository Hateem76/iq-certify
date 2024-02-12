<div class="new-quizz-wrapper">
    <div class="new-quizz-slider">

        @foreach($quiz as $row)
        <div class="new-quizz-item">
            <h3 class="nqi-title">{{ App\Helpers\Translations::Translations($row->title)}} </h3>
            <div class="nqi-meta">
                <div class="nqi-questions nqi-m-row"><span class="nqi-m-label"><img src="{{asset('panel/img/icons/lightbulb-bolt.svg')}}" class="img-fluid svg-icon icon-green nqi-m-icon" alt="User" />{{getLangValue('dashboard.newtest_questions')}}</span><span class="nqi-m-val">{{count($row->questions)}}</span></div>
                <div class="nqi-diff nqi-m-row"><span class="nqi-m-label"><img src="{{asset('panel/img/icons/dumbbell-large.svg')}}" class="img-fluid svg-icon icon-green nqi-m-icon" alt="User" />{{getLangValue('dashboard.newtest_difficult')}}</span><span class="nqi-m-val">5/10</span></div>
            </div>
            <p class="nqi-description">{{ App\Helpers\Translations::Translations($row->description)}}</p>
            <div class="nqi-img-wrapper">
                <img src="https://placehold.co/800x400" alt="" class="img-fluid nqi-img" />
            </div>
            <div class="nqi-cta">
                <a href="{{url('/take-test',base64_encode($row->id))}}" class="cta-btn cta-btn-big">
                    <span>{{getLangValue('dashboard.newtest_button')}}</span>
                    <img src="{{asset('panel/img/icons/login-3.svg')}}" class="img-fluid svg-icon icon-white cta-btn-icon" alt="Icon Go" />
                </a>
            </div>
        </div>
        @endforeach

    </div>
</div>
