@extends('Layout.pages')
@section('nav')
    <a class="btn btn-1" href="/lists/create"><i class="fas fa-plus-square"></i> Create A New List</a>

    <div class="row">

    @foreach($headers as $head)
    <div class="col-md-4 col-sm-6">
        <div class="list">
            <h3>{{$head->header}}</h3>
            <span>{{date('M ,j Y',strtotime($head->date))}}</span>
            <ul>
                @foreach($lists as $list)
                    @if($list->header_id==$head->id)
                        <li>{{$list->item}}</li>

                    @endif
                @endforeach


            </ul>
            <div class="icon">
                <a title="open this list" class="btn-icon btn-1" href="/lists/{{$head->id}}"> <i class="fas fa-eye fa-2x"></i></a>
                <form action="/lists/{{$head->id}}" method="post">
                    {{csrf_field()}}
                    @method('DELETE')
                    <button title="delete this list" class="btn-icon btn-1" type="submit"><i class="fas fa-minus-circle fa-2x"></i></button>

                </form>
                <a title="edit this list" class="btn-icon btn-1" href="/lists/{{$head->id}}/edit"> <i class="fas fa-edit fa-2x"></i></a>

            </div>

        </div>
    </div>
    @endforeach


    </div>


</div>

@endsection

