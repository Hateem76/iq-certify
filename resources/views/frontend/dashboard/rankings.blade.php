<h3 class="dptc-title">{{getLangValue('dashboard.rankings_title')}}</h3>
<div class="ranking-intro-text">
    <p>
        {{getLangValue('dashboard.rankings_desc')}}
    </p>
</div>
<div class="last-results-wrapper dashboard-last-results-wrapper">
    <div class="row">
        @foreach($quiz as $row)
            <div class="last-results-wrapper-col col-lg-6 my-2">
                <div class="lrw-col-content">
                    <div class="lrw-item">
                        <div class="lrw-item-l">
                            <img src="{{\App\Helpers\Results::CountryFlag($row->user->country)}}" class="img-fluid flag-icon" alt="Spain" />
                            <div class="lrw-item-date-name">
                                <div class="lrw-item-name">{{$row->user->name}}</div>
                                <div class="lrw-item-date">{{date_format($row->created_at,"Y/m/d")}} - {{$row->timer}}</div>
                            </div>
                        </div>
                        <div class="lrw-item-r">
                            <div class="lrw-item-score"><span>{{ App\Helpers\Translations::Translations('IQ Score:','Dashboard => Ranking')}}</span><span class="lrq-score-val">{{ App\Helpers\Results::Get($row->id,'total',$row->quiz->id)}}</span></div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
