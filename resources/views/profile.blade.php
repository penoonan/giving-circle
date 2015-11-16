@extends('app')

@section('content')

    <div id="app">
        <h1 v-cloak>Hello ${ name }</h1>
        <div class="col-sm-6">
            <h2>My Wishlists</h2>
            <div v-for="list in wishlists" class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">${ list.giving_circle.name }</h3>
                </div>
                <div class="panel-body">
                    <table class="table" v-if="list.items && list.items.length > 0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in list.items">
                            <td>
                                <a v-if="item.url && item.url.length" target="_blank" href="${ item.url }">${ item.name }</a>
                                <span v-else>${ item.name }</span>
                            </td>
                            <td>$${ item.cost }</td>
                        </tr>
                        </tbody>

                    </table>
                </div>

            </div>
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
                wishlists: gc.wishlists
            }
        })
    </script>

@endsection