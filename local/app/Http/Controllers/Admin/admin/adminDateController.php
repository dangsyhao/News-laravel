<?php

namespace App\Http\Controllers\admin\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Date;

class adminDateController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function date()
    {  
        $date_date=Date::paginate(12);
       // echo asset('storage/file.txt');
        
    return view('admin.admin.date.dateDate',['date_date'=>$date_date]);
    
    }


    public function getAdd()
    {
        return view('admin.admin.date.dateAdd');
    }


    public function add(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'values' => 'required|max:255|unique:Dates',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.admin.date-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $date = new Date;
       
        $date->values = $request->values;
        $date->description = $request->description; 
        $date->save();
        return redirect()->route('admin.admin.date-date');


    }

    public function getEdit($id)
    {
        $date_edit=Date::where('id',$id)->get();
       return view('admin.admin.date.dateEdit',['date_edit'=>$date_edit]);
    }

    public function edit(Request $request)
    {
        
        $validator = Validator::make($request->all(), [

            'values' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.admin.date-getAdd')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $date =Date::find($request->id);
        $date->values = $request->values;
        $date->description = $request->description;
        $date->save();
        return redirect()->route('admin.admin.date-date');

    }

    public function del($id)
    {
        $date= Date::find($id);
        $date->delete();        
        return redirect()->route('admin.admin.date-date');
    }

}
