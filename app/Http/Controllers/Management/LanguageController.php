<?php

namespace App\Http\Controllers\Management;

use App\Models\Translations;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function switcher(Request $request, $code){
//        dd('ggg');
        Session::forget('lang');
        Session::put('lang',$code);
        if($request->return != null){
            $return = $request->return;
        }else{
            $return = '/';
        }
//        $path = $request->getPathInfo();
//        dd($path);
        return redirect($code.$return);
        return redirect()->back();
    }



    public function index(Request $request)
    {

        $data['language'] = Language::get();
        return view('management.language.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->file('flag')){
            $questionimage = $request->file('flag');
            $questionimagefileext = $questionimage->getClientOriginalExtension();
            $questionimagefile = time() . rand(1000, 140000) . '.' . $questionimagefileext;
            $questionimage->move(public_path('/images/flag'), $questionimagefile);
        }else{
            $questionimagefile = null;
        }


        $data = $request->all();
        $data['flag'] = $questionimagefile;
        $data['created_at'] = Auth::user()->id;
        Language::create($data);
        return redirect('admin/language')->with('success','Language Created Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language, $id)
    {
//        dd('dd');

        $data['language']= Language::where('id', $id)->first();
        return view('management.language.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Language::findorfail($id);



        if($request->file('flag')){
            $questionimage = $request->file('flag');
            $questionimagefileext = $questionimage->getClientOriginalExtension();
            $questionimagefile = time() . rand(1000, 140000) . '.' . $questionimagefileext;
            $questionimage->move(public_path('/images/flag'), $questionimagefile);
        }else{
            $questionimagefile = $data->flag;
        }
        $u = $request->all();
        $u['flag'] = $questionimagefile;
        $data->update($u);




        return redirect()->back()->with('success','Language Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Language::findorfail($id)->delete();
        return redirect()->back()->with('success','Language Deleted Successfully');
    }
}
