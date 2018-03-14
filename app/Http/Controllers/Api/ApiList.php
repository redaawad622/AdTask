<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\listHeader;
use App\Lists;
class ApiList extends Controller
{
    public function getAllList()
    {
        $headers=listHeader::with('lists')->get();

        return response(apiRet(['header'=>$headers]),200);
    }
    public function getListById($id)
    {
        $list_head=listHeader::with('lists')->where('id',$id)->get();
        return response(apiRet(['list_head'=>$list_head]),200);


    }
    public function deleteList($id)
    {
        $head=listHeader::find($id);
        $head->delete();
        Lists::where('header_id',$id)->delete();
        return response()->json([
            'success'=>true,

        ],200);



    }
    public function addList()
    {

        $head=request('head');
        $date=date('Y-m-d',strtotime(request('date')));
        $items=request('items');


        $header=new listHeader();
        $header->header=$head;
        $header->date=date('Y-m-d',strtotime($date));
        $header->save();
        $store=array();
        for ($i=0;$i<count($items);$i++)
        {
            $store[]=array('item'=>$items[$i] ,'header_id'=>$header->id,);


        }

        Lists::insert($store);

        return response()->json([
            'success'=>true,

        ],200);

    }
    public function addItem($listId)
    {
        $content=request('content');

        $items=array();

        for ($i=0;$i<count($content);$i++)
        {
            $items[]=array('item'=>$content[$i] ,'header_id'=>$listId,);


        }
        Lists::insert($items);

        return response()->json([
            'success'=>true,

        ],200);


    }
    public function editItem($listId,$itemId)
    {
        $content=request('content');
        Lists::where('header_id', $listId)
            ->where('id',$itemId)
            ->update(['item' => $content]);
        return response()->json(['success'=>true],200);


    }
    public function deleteItem($listId,$itemId)
    {
        Lists::where('header_id', $listId)
            ->where('id',$itemId)
            ->delete();
        return response()->json(['success'=>true],200);


    }
}
