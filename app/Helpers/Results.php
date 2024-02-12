<?php

namespace App\Helpers;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use App\Models\Country;
use App\Models\User;
use Auth;
use Mail;

class Results{

    public static function Get($id, $result_type)
    {
        $result =  QuizResult::whereId($id)->first();
        $quizAnswer = json_decode($result->question_answer);
        if($result->quiz_id == 1){
            if($result_type == 'total'){
                $variable = 0;
                $data = [];
                foreach ($quizAnswer as $key => $answer){

                    $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                    if($quizrr != null){

                        $data[] = [
                            $key=>$answer,
                        ];
                    }
                }




                $yourArray = [
                    '0'  => 69,
                    '1'  => 72,
                    '2'  => 75,
                    '3'  => 78,
                    '4'  => 81,
                    '5'  => 84,
                    '6'  => 87,
                    '7'  => 91,
                    '8'  => 94,
                    '9'  => 97,
                    '10' => 100,
                    '11' => 103,
                    '12' => 107,
                    '13' => 110,
                    '14' => 113,
                    '15' => 116,
                    '16' => 119,
                    '17' => 123,
                    '18' => 126,
                    '19' => 129,
                    '20' => 132,
                    '21' => 135,
                    '22' => 138,
                ];
                $keyToFind = count($data); // The key you want to find
                $value = $yourArray[array_search($keyToFind, array_keys($yourArray))];
                return $value;
            }
            if($result_type == 'detail'){
                $variable = 0;
                $data = [];


                foreach ($quizAnswer as $key => $answer){

                    $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                    if($quizrr != null){

//                        $data = [$answer];
                        array_push($data, $key);
                    }
                }


                $sequenceQuestion = QuizQuestion::whereIn('id',$data)->where('category','Sequence')->get()->count();
                $visionQuestion = QuizQuestion::whereIn('id',$data)->where('category','Vision')->get()->count();
                $numericQuestion = QuizQuestion::whereIn('id',$data)->where('category','Numeric')->get()->count();

//return ['sequence'=>$sequenceQuestion,'vision'=>$visionQuestion,'numeric'=>$numericQuestion];
                $vision = [
                    '0' => 80,
                    '1' => 87,
                    '2' => 94,
                    '3' => 102,
                    '4' => 109,
                    '5' => 116,
                    '6' => 123,
                    '7' => 130,
                    '8' => 137,
                ];

                $sequence = [
                    '0' => 71,
                    '1' => 78,
                    '2' => 85,
                    '3' => 92,
                    '4' => 97,
                    '5' => 104,
                    '6' => 111,
                    '7' => 118,
                    '8' => 125,
                    '9' => 133,
                ];

                $numeric = [
                    '0' => 83,
                    '1' => 92,
                    '2' => 102,
                    '3' => 112,
                    '4' => 121,
                    '5' => 130,
                ];

                $sequence = $sequence[array_search($sequenceQuestion, array_keys($sequence))];
                $vision = $vision[array_search($visionQuestion, array_keys($vision))];
                $numeric = $numeric[array_search($numericQuestion, array_keys($numeric))];

                return ['sequence'=>$sequence,'vision'=>$vision,'numeric'=>$numeric];

            }
        }









        if($result->quiz_id == 2){
            if($result_type == 'total'){
                $variable = 0;
                $data = [];
                foreach ($quizAnswer as $key => $answer){

                    $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                    if($quizrr != null){

                        $data[] = [
                            $key=>$answer,
                        ];
                    }
                }
                $yourArray2 = [
                    0 => 65,
                    1 => 70,
                    2 => 72,
                    3 => 73,
                    4 => 74,
                    5 => 75,
                    6 => 76,
                    7 => 77,
                    8 => 78,
                    9 => 79,
                    10 => 80,
                    11 => 81,
                    12 => 82,
                    13 => 83,
                    14 => 84,
                    15 => 85,
                    16 => 88,
                    17 => 92,
                    18 => 96,
                    19 => 100,
                    20 => 102,
                    21 => 105,
                    22 => 108,
                    23 => 111,
                    24 => 114,
                    25 => 117,
                    26 => 120,
                    27 => 123,
                    28 => 127,
                    29 => 130,
                    30 => 135,
                ];

                $keyToFind = count($data); // The key you want to find
                $value = $yourArray2[array_search($keyToFind, array_keys($yourArray2))];
                return $value;
            }
            if($result_type == 'detail'){
                $variable = 0;
                $data = [];


                foreach ($quizAnswer as $key => $answer){

                    $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                    if($quizrr != null){

//                        $data = [$answer];
                        array_push($data, $key);
                    }
                }


                $sequenceQuestion = QuizQuestion::whereIn('id',$data)->where('category','Sequence')->get()->count();
                $visionQuestion = QuizQuestion::whereIn('id',$data)->where('category','Vision')->get()->count();
                $numericQuestion = QuizQuestion::whereIn('id',$data)->where('category','Numeric')->get()->count();

//return ['sequence'=>$sequenceQuestion,'vision'=>$visionQuestion,'numeric'=>$numericQuestion];
                $vision = [
                    '0' => 80,
                    '1' => 87,
                    '2' => 94,
                    '3' => 102,
                    '4' => 109,
                    '5' => 116,
                    '6' => 123,
                    '7' => 130,
                    '8' => 137,
                    '9' => 137,
                    '10' => 137,
                    '11' => 137,
                    '12' => 137,
                ];

                $sequence = [
                    '0' => 71,
                    '1' => 78,
                    '2' => 85,
                    '3' => 92,
                    '4' => 97,
                    '5' => 104,
                    '6' => 111,
                    '7' => 118,
                    '8' => 125,
                    '9' => 133,
                    '10' => 133,
                    '11' => 133,
                    '12' => 133,
                ];

                $numeric = [
                    '0' => 83,
                    '1' => 92,
                    '2' => 102,
                    '3' => 112,
                    '4' => 121,
                    '5' => 130,
                    '6' => 130,
                ];

                $sequence = $sequence[array_search($sequenceQuestion, array_keys($sequence))];
                $vision = $vision[array_search($visionQuestion, array_keys($vision))];
                $numeric = $numeric[array_search($numericQuestion, array_keys($numeric))];

                return ['sequence'=>$sequence,'vision'=>$vision,'numeric'=>$numeric];

            }
        }




        if($result->quiz_id == 3){
            if($result_type == 'total'){
                $variable = 0;
                $data = [];
                foreach ($quizAnswer as $key => $answer){

                    $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                    if($quizrr != null){

                        $data[] = [
                            $key=>$answer,
                        ];
                    }
                }



                $yourArray2 = [
                    0 => 60,
                    1 => 61,
                    2 => 62,
                    3 => 63,
                    4 => 64,
                    5 => 65,
                    6 => 66,
                    7 => 67,
                    8 => 68,
                    9 => 69,
                    10 => 70,
                    11 => 71,
                    12 => 73,
                    13 => 74,
                    14 => 75,
                    15 => 77,
                    16 => 78,
                    17 => 79,
                    18 => 80,
                    19 => 81,
                    20 => 83,
                    21 => 85,
                    22 => 87,
                    23 => 89,
                    24 => 90,
                    25 => 92,
                    26 => 94,
                    27 => 96,
                    28 => 98,
                    29 => 99,
                    30 => 100,
                    31 => 101,
                    32 => 102,
                    33 => 103,
                    34 => 104,
                    35 => 105,
                    36 => 105,
                    37 => 106,
                    38 => 107,
                    39 => 108,
                    40 => 108,
                    41 => 109,
                    42 => 110,
                    43 => 110,
                    44 => 111,
                    45 => 112,
                    46 => 113,
                    47 => 114,
                    48 => 114,
                    49 => 115,
                    50 => 115,
                    51 => 116,
                    52 => 117,
                    53 => 118,
                    54 => 119,
                    55 => 120,
                    56 => 121,
                    57 => 122,
                    58 => 123,
                    59 => 124,
                    60 => 125,
                    61 => 125,
                    62 => 126,
                    63 => 126,
                    64 => 127,
                    65 => 127,
                    66 => 128,
                    67 => 128,
                    68 => 129,
                    69 => 131,
                    70 => 135,
                ];

                $keyToFind = count($data); // The key you want to find
                $value = $yourArray2[array_search($keyToFind, array_keys($yourArray2))];
                return $value;
            }
            if($result_type == 'detail'){
                $variable = 0;
                $data = [];


                foreach ($quizAnswer as $key => $answer){

                    $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                    if($quizrr != null){

//                        $data = [$answer];
                        array_push($data, $key);
                    }
                }


                $sequenceQuestion = QuizQuestion::whereIn('id',$data)->where('category','Sequence')->get()->count();
                $visionQuestion = QuizQuestion::whereIn('id',$data)->where('category','Vision')->get()->count();
                $numericQuestion = QuizQuestion::whereIn('id',$data)->where('category','Numeric')->get()->count();

//return ['sequence'=>$sequenceQuestion,'vision'=>$visionQuestion,'numeric'=>$numericQuestion];
                $vision = [
                    '0' => 80,
                    '1' => 87,
                    '2' => 94,
                    '3' => 102,
                    '4' => 109,
                    '5' => 116,
                    '6' => 123,
                    '7' => 130,
                    '8' => 137,
                    '9' => 137,
                    '10' => 137,
                    '11' => 137,
                    '12' => 137,
                ];

                $sequence = [
                    '0' => 71,
                    '1' => 78,
                    '2' => 85,
                    '3' => 92,
                    '4' => 97,
                    '5' => 104,
                    '6' => 111,
                    '7' => 118,
                    '8' => 125,
                    '9' => 133,
                    '10' => 133,
                    '11' => 133,
                    '12' => 133,
                ];

                $numeric = [
                    '0' => 83,
                    '1' => 92,
                    '2' => 102,
                    '3' => 112,
                    '4' => 121,
                    '5' => 130,
                    '6' => 130,
                ];

                $sequence = $sequence[array_search($sequenceQuestion, array_keys($sequence))];
                $vision = $vision[array_search($visionQuestion, array_keys($vision))];
                $numeric = $numeric[array_search($numericQuestion, array_keys($numeric))];

                return ['sequence'=>$sequence,'vision'=>$vision,'numeric'=>$numeric];

            }
        }
        return 0;
    }
    public static function GetPartial($id, $result_type)
    {
        $result =  QuizResult::whereId($id)->first();
        $quizAnswer = json_decode($result->question_answer);
        if($result->quiz_id == 1){
            $variable = 0;
            $data = [];


            foreach ($quizAnswer as $key => $answer){

                $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                if($quizrr != null){

//                        $data = [$answer];
                    array_push($data, $key);
                }
            }


            $sequenceQuestion = QuizQuestion::whereIn('id',$data)->where('category','Sequence')->get()->count();
            $visionQuestion = QuizQuestion::whereIn('id',$data)->where('category','Vision')->get()->count();
            $numericQuestion = QuizQuestion::whereIn('id',$data)->where('category','Numeric')->get()->count();

//return ['sequence'=>$sequenceQuestion,'vision'=>$visionQuestion,'numeric'=>$numericQuestion];
            $vision = [
                '0' => 80,
                '1' => 87,
                '2' => 94,
                '3' => 102,
                '4' => 109,
                '5' => 116,
                '6' => 123,
                '7' => 130,
                '8' => 137,
            ];

            $sequence = [
                '0' => 71,
                '1' => 78,
                '2' => 85,
                '3' => 92,
                '4' => 97,
                '5' => 104,
                '6' => 111,
                '7' => 118,
                '8' => 125,
                '9' => 133,
            ];

            $numeric = [
                '0' => 83,
                '1' => 92,
                '2' => 102,
                '3' => 112,
                '4' => 121,
                '5' => 130,
            ];

            $sequence = $sequence[array_search($sequenceQuestion, array_keys($sequence))];
            $vision = $vision[array_search($visionQuestion, array_keys($vision))];
            $numeric = $numeric[array_search($numericQuestion, array_keys($numeric))];
            if($result_type == 'sequence'){
                return $sequence;
            }
            if($result_type == 'numeric'){
                return $numeric;
            }
            if($result_type == 'vision'){
                return $vision;
            }
            return 'NA';
        }









        if($result->quiz_id == 2){
            if($result_type == 'total'){
                $variable = 0;
                $data = [];
                foreach ($quizAnswer as $key => $answer){

                    $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                    if($quizrr != null){

                        $data[] = [
                            $key=>$answer,
                        ];
                    }
                }
                $yourArray2 = [
                    0 => 65,
                    1 => 70,
                    2 => 72,
                    3 => 73,
                    4 => 74,
                    5 => 75,
                    6 => 76,
                    7 => 77,
                    8 => 78,
                    9 => 79,
                    10 => 80,
                    11 => 81,
                    12 => 82,
                    13 => 83,
                    14 => 84,
                    15 => 85,
                    16 => 88,
                    17 => 92,
                    18 => 96,
                    19 => 100,
                    20 => 102,
                    21 => 105,
                    22 => 108,
                    23 => 111,
                    24 => 114,
                    25 => 117,
                    26 => 120,
                    27 => 123,
                    28 => 127,
                    29 => 130,
                    30 => 135,
                ];

                $keyToFind = count($data); // The key you want to find
                $value = $yourArray2[array_search($keyToFind, array_keys($yourArray2))];
                return $value;
            }
            if($result_type == 'detail'){
                $variable = 0;
                $data = [];


                foreach ($quizAnswer as $key => $answer){

                    $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                    if($quizrr != null){

//                        $data = [$answer];
                        array_push($data, $key);
                    }
                }


                $sequenceQuestion = QuizQuestion::whereIn('id',$data)->where('category','Sequence')->get()->count();
                $visionQuestion = QuizQuestion::whereIn('id',$data)->where('category','Vision')->get()->count();
                $numericQuestion = QuizQuestion::whereIn('id',$data)->where('category','Numeric')->get()->count();

//return ['sequence'=>$sequenceQuestion,'vision'=>$visionQuestion,'numeric'=>$numericQuestion];
                $vision = [
                    '0' => 80,
                    '1' => 87,
                    '2' => 94,
                    '3' => 102,
                    '4' => 109,
                    '5' => 116,
                    '6' => 123,
                    '7' => 130,
                    '8' => 137,
                    '9' => 137,
                    '10' => 137,
                    '11' => 137,
                    '12' => 137,
                ];

                $sequence = [
                    '0' => 71,
                    '1' => 78,
                    '2' => 85,
                    '3' => 92,
                    '4' => 97,
                    '5' => 104,
                    '6' => 111,
                    '7' => 118,
                    '8' => 125,
                    '9' => 133,
                    '10' => 133,
                    '11' => 133,
                    '12' => 133,
                ];

                $numeric = [
                    '0' => 83,
                    '1' => 92,
                    '2' => 102,
                    '3' => 112,
                    '4' => 121,
                    '5' => 130,
                    '6' => 130,
                ];

                $sequence = $sequence[array_search($sequenceQuestion, array_keys($sequence))];
                $vision = $vision[array_search($visionQuestion, array_keys($vision))];
                $numeric = $numeric[array_search($numericQuestion, array_keys($numeric))];

                return ['sequence'=>$sequence,'vision'=>$vision,'numeric'=>$numeric];

            }
        }




        if($result->quiz_id == 3){
            if($result_type == 'total'){
                $variable = 0;
                $data = [];
                foreach ($quizAnswer as $key => $answer){

                    $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                    if($quizrr != null){

                        $data[] = [
                            $key=>$answer,
                        ];
                    }
                }



                $yourArray2 = [
                    0 => 60,
                    1 => 61,
                    2 => 62,
                    3 => 63,
                    4 => 64,
                    5 => 65,
                    6 => 66,
                    7 => 67,
                    8 => 68,
                    9 => 69,
                    10 => 70,
                    11 => 71,
                    12 => 73,
                    13 => 74,
                    14 => 75,
                    15 => 77,
                    16 => 78,
                    17 => 79,
                    18 => 80,
                    19 => 81,
                    20 => 83,
                    21 => 85,
                    22 => 87,
                    23 => 89,
                    24 => 90,
                    25 => 92,
                    26 => 94,
                    27 => 96,
                    28 => 98,
                    29 => 99,
                    30 => 100,
                    31 => 101,
                    32 => 102,
                    33 => 103,
                    34 => 104,
                    35 => 105,
                    36 => 105,
                    37 => 106,
                    38 => 107,
                    39 => 108,
                    40 => 108,
                    41 => 109,
                    42 => 110,
                    43 => 110,
                    44 => 111,
                    45 => 112,
                    46 => 113,
                    47 => 114,
                    48 => 114,
                    49 => 115,
                    50 => 115,
                    51 => 116,
                    52 => 117,
                    53 => 118,
                    54 => 119,
                    55 => 120,
                    56 => 121,
                    57 => 122,
                    58 => 123,
                    59 => 124,
                    60 => 125,
                    61 => 125,
                    62 => 126,
                    63 => 126,
                    64 => 127,
                    65 => 127,
                    66 => 128,
                    67 => 128,
                    68 => 129,
                    69 => 131,
                    70 => 135,
                ];

                $keyToFind = count($data); // The key you want to find
                $value = $yourArray2[array_search($keyToFind, array_keys($yourArray2))];
                return $value;
            }
            if($result_type == 'detail'){
                $variable = 0;
                $data = [];


                foreach ($quizAnswer as $key => $answer){

                    $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

                    if($quizrr != null){

//                        $data = [$answer];
                        array_push($data, $key);
                    }
                }


                $sequenceQuestion = QuizQuestion::whereIn('id',$data)->where('category','Sequence')->get()->count();
                $visionQuestion = QuizQuestion::whereIn('id',$data)->where('category','Vision')->get()->count();
                $numericQuestion = QuizQuestion::whereIn('id',$data)->where('category','Numeric')->get()->count();

//return ['sequence'=>$sequenceQuestion,'vision'=>$visionQuestion,'numeric'=>$numericQuestion];
                $vision = [
                    '0' => 80,
                    '1' => 87,
                    '2' => 94,
                    '3' => 102,
                    '4' => 109,
                    '5' => 116,
                    '6' => 123,
                    '7' => 130,
                    '8' => 137,
                    '9' => 137,
                    '10' => 137,
                    '11' => 137,
                    '12' => 137,
                ];

                $sequence = [
                    '0' => 71,
                    '1' => 78,
                    '2' => 85,
                    '3' => 92,
                    '4' => 97,
                    '5' => 104,
                    '6' => 111,
                    '7' => 118,
                    '8' => 125,
                    '9' => 133,
                    '10' => 133,
                    '11' => 133,
                    '12' => 133,
                ];

                $numeric = [
                    '0' => 83,
                    '1' => 92,
                    '2' => 102,
                    '3' => 112,
                    '4' => 121,
                    '5' => 130,
                    '6' => 130,
                ];

                $sequence = $sequence[array_search($sequenceQuestion, array_keys($sequence))];
                $vision = $vision[array_search($visionQuestion, array_keys($vision))];
                $numeric = $numeric[array_search($numericQuestion, array_keys($numeric))];

                return ['sequence'=>$sequence,'vision'=>$vision,'numeric'=>$numeric];

            }
        }
        return 0;
    }
    public static function CorrectAnswer($id,$formated=false)
    {
        $result =  QuizResult::whereId($id)->first();
        $TotalQuestion = QuizQuestion::where('quiz_id',$result->quiz_id)->get()->count();
        $quizAnswer = json_decode($result->question_answer);
        $variable = 0;
        $data = [];
        foreach ($quizAnswer as $key => $answer){

            $quizrr = QuizQuestion::where('id',$key)->where('correct_option_id',$answer)->first();

            if($quizrr != null){

                $data[] = [
                    $key=>$answer,
                ];
            }
        }
        $passedAnswer = count($data); // The key you want to find
        if($formated){
            return $passedAnswer.' / '.$TotalQuestion;
        }
        return $passedAnswer;

    }
    public static function CountryFlag($countryName)
    {


        $countries = Country::where('name', 'LIKE', '%' . $countryName . '%')->first();
        return url('/svg'.'/'.strtolower($countries->iso).'.svg');


    }
    public static function PercentageAllOver($id)
    {


        $q = QuizResult::findorfail($id);
//        dd($q);
        $correctanswer = \App\Helpers\Results::CorrectAnswer($q->id);
        $userSpecificAgegroup = User::get();
        foreach ($userSpecificAgegroup as $speuserloop){
            $firstquiz = $speuserloop->quizzes->where('quiz_id',1)->where('user_id','!=',$q->user->id)->first();
//            dd($firstquiz->id);
            if($firstquiz != null){
                $data[$firstquiz->user_id] =\App\Helpers\Results::CorrectAnswer($firstquiz->id);

            }
        }

        $lessresults = array_filter($data, function ($number) use ($correctanswer) {
            return $number < $correctanswer;
        });

//        print_r($filteredNumbers);
        $percentage = (int)(count($lessresults)/count($data) * 100);
        return $percentage;

    }

    public static function PercentageByAge($id)
    {


        $q = QuizResult::findorfail($id);
//        dd($q);
        $correctanswer = \App\Helpers\Results::CorrectAnswer($q->id);
        $userSpecificAgegroup = User::where('age',$q->user->age)->get();
        foreach ($userSpecificAgegroup as $speuserloop){
            $firstquiz = $speuserloop->quizzes->where('quiz_id',1)->where('user_id','!=',$q->user->id)->first();
//            dd($firstquiz->id);
            if($firstquiz != null){
                $data[$firstquiz->user_id] =\App\Helpers\Results::CorrectAnswer($firstquiz->id);

            }else{
                $data = [];
            }
        }

        $lessresults = array_filter($data, function ($number) use ($correctanswer) {
            return $number < $correctanswer;
        });

//        print_r($filteredNumbers);
//        dd(count($lessresults) != 0);
        if(count($lessresults) != 0){
            $percentage = (int)(count($lessresults)/count($data) * 100);
            return $percentage;
        }else{
            return 0;
        }


    }

    public static function PercentageByEdu($id)
    {


        $q = QuizResult::findorfail($id);
//        dd($q);
        $correctanswer = \App\Helpers\Results::CorrectAnswer($q->id);
        $userSpecificAgegroup = User::where('edu_level',$q->user->edu_level)->get();
        foreach ($userSpecificAgegroup as $speuserloop){
            $firstquiz = $speuserloop->quizzes->where('quiz_id',1)->where('user_id','!=',$q->user->id)->first();
//            dd($firstquiz->id);
            if($firstquiz != null){
                $data[$firstquiz->user_id] =\App\Helpers\Results::CorrectAnswer($firstquiz->id);

            }else{
                $data = [];
            }
        }

        $lessresults = array_filter($data, function ($number) use ($correctanswer) {
            return $number < $correctanswer;
        });

        if(count($lessresults) != 0){
        $percentage = (int)(count($lessresults)/count($data) * 100);
        return $percentage;
        }else{
            return 0;
        }

    }
    public static function PercentageByEduField($id)
    {


        $q = QuizResult::findorfail($id);
//        dd($q);
        $correctanswer = \App\Helpers\Results::CorrectAnswer($q->id);
        $userSpecificAgegroup = User::where('field_of_studies',$q->user->field_of_studies)->get();
        foreach ($userSpecificAgegroup as $speuserloop){
            $firstquiz = $speuserloop->quizzes->where('quiz_id',1)->where('user_id','!=',$q->user->id)->first();
//            dd($firstquiz->id);
            if($firstquiz != null){
                $data[$firstquiz->user_id] =\App\Helpers\Results::CorrectAnswer($firstquiz->id);

            }else{
                $data = [];
            }
        }

        $lessresults = array_filter($data, function ($number) use ($correctanswer) {
            return $number < $correctanswer;
        });

//        print_r($filteredNumbers);
        if(count($lessresults) != 0){
        $percentage = (int)(count($lessresults)/count($data) * 100);
        return $percentage;
        }else{
            return 0;
        }

    }




}

