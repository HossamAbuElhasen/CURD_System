<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputersController extends Controller
{
   


    public function index()
    {
        return view('computers.index',[
            'computers'=> Computer::all() 
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('computers.create');    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer-name'=>'required',
            'computer-origin'=>'required',
            'computer-price'=>['required','integer']

        ]);


        $Computer =new Computer();
        $Computer->name= strip_tags( $request ->input('computer-name'));
        $Computer->origin =strip_tags( $request ->input('computer-origin'));
        $Computer->price=strip_tags ($request ->input('computer-price'));

        
      $Computer->save();
      return redirect()->route('computers.index'); 

    }

    
    public function show($computer) // بتاعه من قاعده البيانات idمحتاج استخرج ال
    {
     
        return view('computers.show',['computer'=>  Computer::findOrFail($computer)]);   
         //  ياخد منها البارميتر اللى محتاج يرجعه Modelبيروح لل
        // findOrFail  معناها لو داخله بارميتر مش موجود هيطلع صفحه 404
    }

    
    public function edit($computer)
    {
        return view('computers.edit',['computer'=>  Computer::findOrFail($computer)]);
   

    }

   
    public function update(Request $request, $computer)
    {
        $request->validate([
            'computer-name'=>'required',
            'computer-origin'=>'required',
            'computer-price'=>['required','integer']

        ]);


        $to_update =Computer::findOrFail($computer);
        $to_update->name= strip_tags( $request ->input('computer-name'));
        $to_update->origin =strip_tags( $request ->input('computer-origin'));
        $to_update->price=strip_tags ($request ->input('computer-price'));

        $to_update->save();
        return redirect()->route('computers.show',$computer); 
  
    }

    
    public function destroy($computer)
    {
        $to_delete= Computer::findOrFail($computer);
        $to_delete->delete();
        return redirect()->route('computers.index'); 

    }
}
