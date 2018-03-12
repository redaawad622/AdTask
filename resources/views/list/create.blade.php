@extends('Layout.pages')
@section('nav')
<div class="list_create">
    <div class="inner">
        <h2>Add A New List</h2>
        <form action="/lists" method="post" id="create_list">
            {{csrf_field()}}
            <input type="hidden" id="counter" name="counter">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="label-icon"><i class="fas fa-heading"></i></label>
                    <input type="text" class="form-control" name="header"  placeholder="list header" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="date"  placeholder="date" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label-icon"><i class="fas fa-list-ul"></i></label>
                <input type="text" class="form-control" name="item0" placeholder="add item" required>
            </div>
            <div class="all_button">


                <button  type="button" id="add_item" class="btn btn-1"><i class="fas fa-plus-square"></i> Add Item</button>
                <button type="submit" class="btn btn-1"><i class="fas fa-save"></i>  Save</button>


            </div>
        </form>
    </div>

</div>
@stop