@extends('layouts.app_dashboard')


@section('content')

<div class="row">
    <div class="col-md-3">

        <div class="panel panel-body">
            <h4 class="text-amethyst-dark text-center">Create category</h4>
            <div class="form-group">
                <input class="form-control" name="category_name" id="category_name" placeholder="Insert name">
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" onclick="addNewCategory()"><i class="fa fa-plus"></i> Add Category</button>
            </div>
        </div>


        <div class="panel panel-body bg-amethyst-dark-op">
            <h3 class="text-center text-white">
                Current Categories
            </h3>
        </div>

        <div id="categories_holder">
        {!! view('partials.admin.gear-cat', ['categories' => $categories]) !!}
        </div>


    </div>
    <div class="col-md-3">

        <div class="panel panel-body">
            <h4 class="text-amethyst-dark text-center">Edit Gear Item</h4>
            {!! Form::open() !!}
            {!! Form::hidden('select_gear_item', 1) !!}
            <div class="form-group">
                <select class="form-control" name="gear_item_select">
                    @foreach(\App\Models\Gear::all() as $gear)
                        <option value="{{$gear->id}}">{{$gear->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit"><i class="fa fa-cogs"></i> Edit</button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
    <div class="col-md-6">

        @if(Session::has('edit_gear_item'))


            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="list-inline list-unstyled">
                        <li>

                            Edit Gear Item
                        </li>
                        <li>
                            {!! Form::open() !!}
                            {!! Form::hidden('delete_product', session('gear_item')->id) !!}
                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i> Delete Product</button>
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </div>
                {!! Form::open() !!}
                {!! Form::hidden('edit_gear_item', session('gear_item')->id) !!}
                <div class="panel-body">
                    <div class="form-group">
                        <label>Category?</label>
                        <select class="form-control" id="category_id" name="category_id">


                            <option value="{{\App\Models\GearCategories::find(session('gear_item')->category_id)->id}}">{{\App\Models\GearCategories::find(session('gear_item')->category_id)->name}}</option>
                            @foreach(\App\Models\GearCategories::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gear Title</label>
                        <input class="form-control" name="title" value="{{session('gear_item')->title}}">
                    </div>
                    <div class="form-group">
                        <label>Picture URL</label>
                        <input class="form-control" name="picture" type="text" value="{{session('gear_item')->picture}}">
                    </div>
                    <div class="form-group">
                        <label>Amazon Product URL</label>
                        <input class="form-control" name="link" type="text" value="{{session('gear_item')->link}}">
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea id="js-ckeditor" name="description">{{session('gear_item')->description}}</textarea>
                    </div>
                </div>
                <div class="panel-footer clearfix">
                    <button class="btn btn-info pull-right" type="submit"><i class="fa fa-save"></i> Save Editing</button>
                </div>
                {!! Form::close() !!}
            </div>

        @else
        <div class="panel panel-default">
            <div class="panel-heading">
                Add Gear Item
            </div>
            {!! Form::open() !!}
            {!! Form::hidden('create_gear_item', 1) !!}
            <div class="panel-body">
                <div class="form-group">
                    <label>Category?</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <div id="category_values">
                            @foreach(\App\Models\GearCategories::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </div>
                    </select>
                </div>
                <div class="form-group">
                    <label>Gear Title</label>
                    <input class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label>Picture URL</label>
                    <input class="form-control" name="picture" type="text">
                </div>
                <div class="form-group">
                    <label>Amazon Product URL</label>
                    <input class="form-control" name="link" type="text">
                </div>
                <div class="form-group">
                    <label>Product Description</label>
                    <textarea id="js-ckeditor" name="description"></textarea>
                </div>
            </div>
            <div class="panel-footer clearfix">
                <button class="btn btn-info pull-right" type="submit"><i class="fa fa-edit"></i> Add Product</button>
            </div>
            {!! Form::close() !!}
        </div>
        @endif

    </div>
</div>



@endsection

@section('js')

    <script src="{{ asset('assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>

        jQuery(function() {
            // Init page helpers (Summernote + CKEditor plugins)
            App.initHelpers(['ckeditor']);
        });
        function deleteCategory(id)
        {
            $.ajax({
                url : '/admin/manage_gear',
                method : 'POST',
                data : {
                    category_id : id
                },
                success: function(results) {
                    showNotification(results, 'success');
                    $('#gear-'+id).remove();
                }
            });

        }

        function addNewCategory()
        {
            var cat = $('#category_name');
            $.ajax({
                url : '/admin/manage_gear',
                method : 'POST',
                data : {
                    add_category : true,
                    category_text : cat.val()
                },
                success: function(results) {
                    showNotification(results, 'success');
                    cat.val("");
                    refreshCategories();
                }
            });

        }
        function refreshCategories()
        {
            $.ajax({
                url : '/admin/manage_gear',
                method : 'GET',
                data : {
                    get_categories : true
                },
                success: function(results) {
                    $('#categories_holder').html(results);
                }
            });

        }

    </script>

@endsection