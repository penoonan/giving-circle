@extends('app')

@section('content')
    <div id="app">
        <h1>Hello {{ $user->name }}</h1>
        <div class="col-sm-6">
            <h2>My Wishlists</h2>
            @foreach ($user->wishlists as $list)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $list->givingCircle->name }}</h3>
                </div>
                <div class="panel-body">
                    @if ($list->items->count() > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Cost</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list->items as $item)
                        <tr>
                            <td>
                                @if ($item->url)
                                <a target="_blank" href="{{ $item->url }}">{{ $item->name }}</a>
                                @else
                                <span>{{ $item->name }}</span>
                                @endif
                            </td>
                            <td>${{ $item->cost }}</td>
                            <td><a href="{{ route('wishlist.item.edit', ['wishlist_id' => $list->id, 'item_id' => $item->id ]) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop

