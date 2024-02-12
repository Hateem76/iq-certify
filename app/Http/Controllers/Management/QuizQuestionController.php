<?php

namespace App\Http\Controllers\management;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizQuestionOption;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return abort(404);
        Quiz::findorfail($request->p);
        $data['parent'] =$request->p;
        return view('management.quiz.questions.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'correct_option' => 'required',
            'title' => 'required',
            'question_image' => 'required',
        ]);
        if($request->file('question_image')){
            $questionimage = $request->file('question_image');
            $questionimagefileext = $questionimage->getClientOriginalExtension();
            $questionimagefile = time() . rand(1000, 14000000000) . '.' . $questionimagefileext;
            $questionimage->move(public_path('/images/question'), $questionimagefile);
        }else{
            $questionimagefile = null;
        }

        $question = QuizQuestion::create([
            'title'=>$request->title,
            'quiz_id'=>$request->parent,
            'question_image'=>$questionimagefile,
            'category'=>$request->category,
        ]);
        if($request->file('option_image'))
        {

            $i = 0;
            foreach($request->file('option_image') as $image)
            {
                $mainext = $image->getClientOriginalExtension();
                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/options'), $main_file);

                $multi_image=
                    [
                        'question_id'=>$question->id,
                        'correct_option'=>isset($request->correct_option[$i]) != null ? $request->correct_option[$i] : null,
                        'file' => $main_file,
                    ];

                $multi = QuizQuestionOption::create($multi_image);


                $i++;
            }
        }
        else{

        }
        $option = QuizQuestionOption::where('question_id',$question->id)
            ->where('correct_option','!=',null)->first();

        QuizQuestion::findorfail($question->id)->update([
            'correct_option_id'=>$option->id,
        ]);

        return redirect()->back()->with('success','Question Created Successfully') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(QuizQuestion $quizQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['question'] = QuizQuestion::findorfail($id);
        $data['options'] = QuizQuestionOption::whereQuestionId($id)->get();
        return view('management.quiz.questions.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

$que = QuizQuestion::findorfail($id);

        if($request->file('question_image')){
            $questionimage = $request->file('question_image');
            $questionimagefileext = $questionimage->getClientOriginalExtension();
            $questionimagefile = time() . rand(1000, 14000000000) . '.' . $questionimagefileext;
            $questionimage->move(public_path('/images/question'), $questionimagefile);
        }else{
            $questionimagefile = $que->question_image;
        }

        $quedata = $request->all();
        $quedata['question_image'] = $questionimagefile;
          $que->update($quedata);

        QuizQuestionOption::whereQuestionId($id)->update(['correct_option'=>null]);


        if($request->has('last_correct_option')){
            QuizQuestionOption::whereId($request->last_correct_option)->first()->update(['correct_option'=>1]);
        }
        if($request->file('last_option_image')) {
            $i = 0;
            foreach($request->file('last_option_image') as $key => $image)
            {
//                dd($request->last_correct_option[14]);
                $mainext = $image->getClientOriginalExtension();
                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/options'), $main_file);

                $multi_image=
                    [
                        'file' => $main_file,
                    ];

                $multi = QuizQuestionOption::whereId($key)->first();
                $multi->update($multi_image);

                $i++;
            }
        }

        if($request->file('option_image')) {
            $i = 0;
            foreach($request->file('option_image') as $key => $image)
            {
                $mainext = $image->getClientOriginalExtension();
                $main_file = time() . rand(1000, 14000000000) . '.' . $mainext;
                $image->move(public_path('/images/options'), $main_file);
                $multi_image=
                    [
                        'question_id'=>$id,
                        'correct_option'=>isset($request->correct_option[$key]) != null ? $request->correct_option[$key] : null,
                        'file' => $main_file,
                    ];
                $multi = QuizQuestionOption::create($multi_image);
                $i++;
            }
        }


        QuizQuestion::findorfail($id)->update([
            'correct_option_id'=>$request->last_correct_option,
        ]);
        return redirect()->back()->with('success','Question Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        QuizQuestion::findorfail($id)->delete();
        QuizQuestionOption::whereQuestionId($id)->delete();
        //
        return redirect()->back()->with('success','Question Deleted Successfully');

    }
}
