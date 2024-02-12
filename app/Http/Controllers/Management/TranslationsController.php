<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Translations;
use Illuminate\Http\Request;

class TranslationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['request'] = $request;

        $data['category'] = Language::where('code',$request->lang)
            ->first();
        if($data['category'] == null){
            return abort(404);
        }
        return view('management.translation.index',$data);
    }


    public function Templates(Request $request)
    {
        $data['category'] = Language::where('code',$request->lang)->first();
        if($data['category'] == null){
            return abort(404);
        }
        $data['template'] = Translations::get()->groupBy('template');
//dd($data);
        return view('management.translation.template',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Translations  $translations
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $lang = Language::where('id', $id)->latest()->first();
        $data['skills'] = Translations::where('code', $lang->code)
            ->where('template',$request->template)

            ->latest()->get();
        return view('management.translation.loop', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Translations  $translations
     * @return \Illuminate\Http\Response
     */
    public function edit(Translations $translations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Translations  $translations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'value' => 'required',
        ]);

        $skills = Translations::findorfail($id);
        $skills->update($request->all());
        return redirect()->back()
            ->with('success','Skills updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Translations  $translations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Translations $translations)
    {
        //
    }
}
