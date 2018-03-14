@extends('Layout.pages')
@section('nav')
    <div class="show_list">
        <div class="inner_list">
            <h2>{{$list_head->header}}</h2>
            <span>{{date('M ,j Y',strtotime($list_head->date))}}</span>


           <div class="amazing_list">
               <div class="row">
                   @foreach($list_head->lists as $list_item)
                       <div  class="col-sm-6 {{$list_item->id}} ">
                           <p>{{$list_item->item}}</p>


                       </div>
                       <div class="col-sm-3">
                           <a  title="delete this item" class="btn-icon btn-1" href="/lists/{{$list_item->header_id}}/{{$list_item->id}}"><i class="fas fa-minus-square"></i></a>

                       </div>
                       <div class="col-sm-3">
                           <a title="edit this item" class="btn-icon btn-1 general" id="{{$list_item->id}}" href="#"><i id="{{$list_item->header_id}}" class="far fa-edit"></i></a>

                       </div>
                   @endforeach
               </div>

           </div>



            <form action="/lists/addItem/{{$list_head->id}}" method="post" id="create_list">
            {{csrf_field()}}
            <input type="hidden" id="count" name="counter">


            <div class="all_button">

                <button title="Add New item" type="button" id="add_new_item" class="btn btn-1"><i class="fas fa-plus-square"></i> Add Item</button>
                <button type="submit" id="submit_new_item" class="btn btn-1"><i class="fas fa-save"></i>  Save </button>

            </div>
            </form>


        </div>
    </div>
@stop
