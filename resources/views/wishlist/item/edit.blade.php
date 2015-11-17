@extends('app')

@section('content')
<div id="app">
    <h1>{{ $item->name }}</h1>
    <div class="row">
        
        <div class="col-sm-6">
            <div class="panel panel-info" id="app">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Item</h3>
                </div>
                <div class="panel-body">
                    <form class="form" action="{{ route('wishlist.item.update') }}" method="post">
                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            <input id="name" name="name" class="form-control" value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="cost">Cost</label>
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input id="cost" name="cost" type="number" step=".01" class="form-control" value="{{ $item->cost }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="url">Url</label>
                            <input id="url" name="url" class="form-control" value="{{ $item->url }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop