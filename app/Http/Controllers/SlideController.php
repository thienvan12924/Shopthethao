<?php

namespace App\Http\Controllers;

use App\Models\Slides;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index(){
        return view('Admin.Pages.Slides.index');
    }
    public function store(Request $request){
        Slides::create($request->all());
        return response()->json([
            'status'=>true,
        ]);
    }
    public function getData(){
        $data = Slides::all();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function edit($id){
        $slide = Slides::find($id);
        if($slide){
            return response()->json([
                'status' => true,
                'data'=> $slide,
            ]);
        }
        else
        {
            return response()->json([
                'status' => false,

            ]);
        }
    }
    public function update(Request $request){
        $slide = Slides::find($request->id);
        $slide->hinh_anh = $request->hinh_anh;
        $slide->is_open = $request->is_open;
        $slide->save();
        return response()->json([
            'status' => true,
        ]);
    }
    public function destroy($id){
        $slide = Slides::find($id);
        if($slide){
            $slide->delete();
            return response()->json([
                'status' => true,
            ]);
        }
        else{
            return response()->json([
                'status' => false,
            ]);
        }
    }
    public function updateStatus($id){
        $slide = Slides::find($id);
        if($slide){
            $slide->is_open = $slide->is_open == 0 ? 1 : 0;
            $slide->save();
            return response()->json([
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => false,
            ]);
        }
    }
}
