<?php
$auth = app('auth');

$app->post('/register', ['as' => 'register', 'uses' => 'AuthStuff@register']);
$app->get('/login', ['as' => 'login', 'uses' => 'AuthStuff@login']);
$app->post('/login', ['as' => 'authenticate', 'uses' => 'AuthStuff@authenticate']);
$app->get('/logout', ['as' => 'logout', 'uses' => 'AuthStuff@logout']);

$app->group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers'], function() use($app) {

    $app->get('/', ['as' => 'profile', 'uses' => 'UserController@profile']);

    $app->group(['prefix' => 'users'], function() use($app) {

        $app->post('/{user_id}/wishlist', ['as' => 'user.wishlist.store', 'uses' => 'WishlistController@store']);

    });

    $app->group(['prefix' => 'wishlist', 'namespace' => 'App\Http\Controllers'], function() use($app) {

        $app->get('/{wishlist_id}/items/{item_id}', [
            'as' => 'wishlist.item.show',
            'uses' => 'WishlistItemController@show'
        ]);
        $app->get('/{wishlist_id}/items/{item_id}/edit', [
            'as' => 'wishlist.item.edit',
            'uses' => 'WishlistItemController@edit'
        ]);

        $app->put('/{wishlist_id}/items/{item_id}', [
            'as' => 'wishlist.item.update',
            'uses' => 'WishlistItemController@update'
        ]);



    });


    $app->group(['prefix' => 'api'], function() use($app) {

        $app->group(['prefix' => 'users'], function() use($app) {

            $app->post('wishlist', [
                'as' => 'api.users.wishlist.store',
                function(Request $request) {
                    try {
                        $item = new Wishlist($request->only(['title', 'link', 'cost']));
                        app('auth')->user()->save($item);
                        return response()->json('Item saved');
                    } catch (\Exception $e) {
                        return response()->json($e->getMessage(), 500);
                    }
                }
            ]);
        });

    });
});



