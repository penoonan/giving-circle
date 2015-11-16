@extends('app')

@section('content')

    <div id="app">
        <h1 v-cloak>Hello ${ name }</h1>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">My Wishlist</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li v-for="item in wishlist" class="list-group-item">
                        <a v-if="item.url && item.url.length" href="${ item.url }">${ item.name }</a>
                        <span v-else>${ item.name }</span>
                    </li>
                </ul>
            </div>
            <table class="table" v-if="wishlist && wishlist.length > 0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in wishlist">
                        <td>
                            <a v-if="item.url && item.url.length" href="${ item.url }">${ item.name }</a>
                            <span v-else>${ item.name }</span>
                        </td>
                        <td>$${ item.cost.toFixed(2) }</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>




@stop

@section('scripts')
    @parent

    <script>
        new Vue({
            el: '#app',
            data: {
                name: gc.user.first_name + ' ' + gc.user.last_name,
                wishlist: gc.user.wishlist
            }
        })
    </script>

@endsection