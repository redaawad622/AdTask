<?php

namespace App\Http\Controllers;

use App\listHeader;
use App\Lists;
use Illuminate\Http\Request;
use Alert;

class ListsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $headers=listHeader::all();
        return view('list.lists',compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count=$request->counter +0;

        $header=new listHeader();
       $header->header=$request->header;
       $header->date=date('Y-m-d',strtotime($request->date));
       $header->save();
        $items=array();

       for ($i=0;$i<$count;$i++)
       {
           $items[]=array('item'=>$request->input('item'.$i) ,'header_id'=>$header->id,);


       }


       Lists::insert($items);
        Alert::success('list Added successful', 'success');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_head=listHeader::find($id);

        return view('list.show',compact('list_head'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header=listHeader::find($id);
        return view('list.edit',compact('header','lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $count=$request->counter +0;

        $header =listHeader::find($id);

        $header->header = $request->header;

        $header->save();



        for ($i=0;$i<$count;$i++)
        {
            Lists::where('header_id', $id)
                ->where('id',$request->input('item_id'.$i))
                ->update(['item' => $request->input('item_value'.$i)]);

        }

        Alert::success('list updated successful', 'success');

        return back();


    }



/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $head=listHeader::find($id);
        $head->delete();
        Lists::where('header_id',$id)->delete();
        Alert::success('list deleted successful', 'success');

        return back();

    }


    public function deleteItem($header,$id)
    {
        Lists::where('header_id', $header)
            ->where('id',$id)
            ->delete();
        Alert::success('item deleted successful', 'success');

        return back();

    }
    public function addItem(Request $request,$header)
    {
        $count=$request->counter+0;


        $items=array();

        for ($i=0;$i<$count;$i++)
        {
            $items[]=array('item'=>$request->input('item'.$i) ,'header_id'=>$header,);


        }
        Lists::insert($items);

        Alert::success('item deleted successful', 'success');

        return back();

    }

    public function editItem(Request $request ,$header,$id)
    {
        Lists::where('header_id', $header)
            ->where('id',$id)
            ->update(['item' => $request->input('item_value')]);
        return response()->json(['success'=>true],200);


    }



}
