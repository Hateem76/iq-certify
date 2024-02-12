@extends('frontend.layouts.main')
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

    <div class="container">
        <div class="quiz-content-algn">
            <div class="quiz-header-wrapper animate__animated animate__bounceIn">
                <div class="qhw-left">
                    <h2 class="quiz-test-name">{{ App\Helpers\Translations::Translations($quiz['title'],'Quiz Page')}}</h2>
                </div>
                <div class="qhw-right">
                    <img src="{{asset('panel/img/icons/history-2.svg')}}" class="img-fluid quiz-timer-icon" alt="Time Left:">
                    <span id="quiz-timer">{{$quiz['time_duration']}}:00</span>
                </div>
            </div>
            <div class="quiz-wrapper">
                <div class="quiz-questions-wrapper animate__animated animate__bounceIn animation-delay-200">
                    <div class="quiz-questions-content">
                        @php
                            $i=1
                        @endphp
                        @foreach($quiz['questions'] as $row)
                            <div class="quiz-question quiz-question-{{$i}} q{{$i == 1 ? '': 'n'}}v">
                                <h3>{{ App\Helpers\Translations::Translations($row['title'],'Quiz Page')}}</h3>
                                <img src="{{asset('images/question'.'/'.$row['question_image'])}}" alt="" class="img-fluid quiz-question-img" />
                            </div>
                            @php
                                $i++
                            @endphp
                        @endforeach
                        {{--                        <div class="quiz-question quiz-question-2 qnv">--}}
                        {{--                            <h3>{{getLangValue('quizz.how_many_triangles_are_in_the_picture')}}</h3>--}}
                        {{--                            <img src="{{asset('panel/img/question-2.svg')}}" alt="" class="img-fluid quiz-question-img" />--}}
                        {{--                        </div>--}}



                    </div>
                </div>
                <div class="quiz-answers-wrapper animate__animated animate__bounceIn animation-delay-400">
                    <form action="{{url('submit-quiz')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{base64_encode($quiz['id'])}}">
                        <input type="hidden" class="timerinput" name="timer" value="">
                    <div class="quiz-answers-content">
                        @php
                            $i=1
                        @endphp
                        @foreach($quiz['questions'] as $row)
                            <div class="quiz-answers quiz-answers-{{$i}} q{{$i == 1 ? '': 'n'}}v">
                                <h3>{{getLangValue('quizz.please_select_answer')}}</h3>
                                <div class="quiz-answers-h">
                                    @php
                                        $oi=1;
                                    @endphp
                                    @foreach($row['option'] as $options)
                                        <div class="quiz-answer quiz-answer-{{$i}}-1">
                                            <input class="d-none"  id="answer{{$options['id']}}" type="radio" {{$options['correct_option'] == 1 ? '' : ''}}  value="{{$options['id']}}" name="answer[{{$row['id']}}]">
                                            <label for="answer{{$options['id']}}">
                                                <div class="quiz-answer-content">
                                                    <span>{{$alphabets[$oi]}})</span>

                                                    <img src="{{asset('images/options'.'/'.$options['file'])}}" alt="" class="img-fluid quiz-answer-img" />
                                                </div>
                                            </label>
                                        </div>
                                        @php
                                            $oi++;
                                        @endphp
                                    @endforeach

                                </div>
                                @if(count($quiz['questions']) == $i)
                                   <div class="d-block text-end">
                                       <button type="submit" class="btn btn-dark" value="">
                                           {{getLangValue('quizz.submit_button')}}
                                       </button>
                                   </div>
                                @endif
                            </div>
                            @php
                                $i++
                            @endphp
                        @endforeach
                    </div>
                    </form>
                </div>
            </div>
            <div class="quiz-nav-wrapper animate__animated animate__bounceIn animation-delay-600">
                <div class="quiz-nav-content">
                    @php
                        $i=1
                    @endphp
                    @foreach($quiz['questions'] as $row)
                        <div class="quiz-nav-item-wrapper my-2">
                            <div class="quiz-nav-item quiz-nav-item-cb quiz-nav-item-{{$i}} {{$i == 1 ? 'current': ''}} ">
                                <span>{{$i}}</span>
                            </div>
                        </div>
                        @php
                            $i++
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
