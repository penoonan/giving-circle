<?php
$auth = app('auth');

$app->get('/login', ['as' => 'login', 'uses' => 'AuthStuff@login']);
$app->post('/login', ['as' => 'authenticate', 'uses' => 'AuthStuff@authenticate']);
$app->get('/logout', ['as' => 'logout', 'uses' => 'AuthStuff@login']);
$app->post('/register', ['as' => 'register', 'uses' => 'AuthStuff@register']);

$app->group(['middleware' => 'auth'], function() use($app) {

    $app->get('/', ['as' => 'profile', 'uses' => 'UserController@profile']);

    $app->group(['prefix' => 'users'], function() use($app) {

        $app->post('/{user_id}/wishlist', ['as' => 'user.wishlist.store', 'uses' => 'WishlistController@store']);

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



