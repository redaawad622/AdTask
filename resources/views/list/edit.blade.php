@extends('Layout.pages')
@section('nav')
    <div class="list_create">
        <div class="inner">
            <h2>Edit List</h2>
            <form action="/lists/{{$header->id}}" method="post" id="create_list">
                {{csrf_field()}}
                @method('PUT')
                <input type="hidden"  name="counter" value="{{count($lists)}}">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="label-icon"><i class="fas fa-heading"></i></label>
                        <input type="text" class="form-control" name="header" value="{{$header->header}}"  placeholder="list header" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="date" class="form-control" name="date" value="{{$header->date}}"  placeholder="date" required>
                    </div>
                </div>
                @foreach($lists as $key=>$list)
                <div class="form-group">
                    <label class="label-icon"><i class="fas fa-list-ul"></i></label>
                    <input type="text" value="{{$list->item}}" class="form-control" name="item_value{{$key}}" placeholder="add item" required>
                </div>
                    <input type="hidden" name="item_id{{$key}}" value="{{$list->id}}">
                @endforeach
                <div class="all_button">

                    <button type="submit" class="btn btn-1"><i class="fas fa-save"></i>  Update</button>

                </div>
            </form>
        </div>

    </div>
@stop