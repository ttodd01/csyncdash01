@foreach($categories as $cat)
    <div id="gear-{{$cat->id}}" class="panel panel-body">
        <h5 class="text-center">{{$cat->name}} - <a onclick="deleteCategory('{{$cat->id}}')" style="cursor: pointer;"><i class="fa fa-trash"></i> Delete</a> </h5>
    </div>
@endforeach