<h3 class="dptc-title">{{getLangValue('dashboard.results_title')}}</h3>
<div class="result-history-table">
    <div class="result-history-row header">
        <div class="result-history-cell">{{getLangValue('dashboard.results_table_iq')}}</div>
        <div class="result-history-cell">{{getLangValue('dashboard.results_table_score')}}</div>
        <div class="result-history-cell">{{getLangValue('dashboard.results_table_date')}}</div>
        <div class="result-history-cell">{{getLangValue('dashboard.results_table_results')}}</div>
    </div>

    @foreach($quiz as $row)
    <div id="eeee{{$row->quiz_id}}" class="result-history-row">
        <div class="result-history-cell result-history-cell-name" data-title="Quizz Name">
            <a target="_blank" class="text-dark text-decoration-none" href="{{url('test-result',$row->unique_key)}}">
                {{ App\Helpers\Translations::Translations($row->quiz->title)}}
            </a>
        </div>
        <div class="result-history-cell result-history-cell-score" data-title="Score"> <span>{{ App\Helpers\Results::Get($row->id,'total')}}</span> </div>
        <div class="result-history-cell" data-title="Date"> {{$row->created_at}}
        </div>
        <div class="result-history-cell" data-title="Report">
            <a  target="_blank" href="{{url('generate-certificate',$row->unique_key)}}" class="cta-btn cta-btn-download"><img src="{{asset('panel/img/icons/download-square.svg')}}" class="img-fluid svg-icon icon-white cta-btn-download-icon" alt="Icon Go" /><span>{{getLangValue('dashboard.view_results_button')}}</span></a>
        </div>
    </div>
 
    @if($row->quiz_id == 1)
        <div class="detail-box card w-100 " style="display:none;">
            <div class="d-block w-100 card-body">
                <h5>
                    <em> Total Score</em>
                </h5>
                <ul class="px-0">
                        <li>{{ App\Helpers\Results::Get($row->id,'total')}}</li>
                </ul>
                <h5>
                   <em> Divided Points</em>
                </h5>
              <ul class="px-0">
                  @foreach(App\Helpers\Results::Get($row->id,'detail') as $key => $value)
                  <li><strong class="text-capitalize">{{$key}}:</strong> {{$value}}</li>
                  @endforeach
              </ul>
            </div>
        </div>
        @endif
    @endforeach
</div>


<script>
    $('body').on('click','#eeee1', function(){
        $(this).next("div").slideToggle(500);

    })








</script>

