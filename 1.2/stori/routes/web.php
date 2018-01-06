<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 

route::post('evaluations', 'EvaluationController@store');

route::get('commentaire', 'CommentaireController@index');
route::post('commentaires', 'CommentaireController@store');

Route::get('/supprimerFavori/{id}', 'FavorisController@SupprimerFavoris'); 
Route::get('/categorie/{categorie}', 'ProduitController@ProduitByCategorie'); 

Route::get('/supprimerPanier/{id}', 'PanierController@SupprimerPanier'); 
Route::get('/ajouterQuant/{id}', 'PanierController@AjouterQuant'); 
Route::get('/sousQuant/{id}', 'PanierController@SousQuant'); 

Route::get('/monpanier',['middleware' => 'auth:user', 'uses' => 'PanierController@MonPanier']); 
Route::get('/index','ProduitController@produits');
Route::post('/chercher','ProduitController@ChercherProduit');
Route::get('/ajoutprod', function () {
    return view('ajouterProduit');
});
Route::get('/details/{id}', 'ProduitController@details');
Route::get('/favoris/{id}', 'FavorisController@AjouterFavoris');
Route::get('/mesfavoris', 'FavorisController@MesFavoris');
Route::get('/ajouterPanier/{id}','PanierController@AjouterPaniers');

Route::post('/ajouterPanier','PanierController@AjouterPanier');

Route::get('/loginu', function () {
    return view('login');
});
Route::post('/ajouter', 'VendeurController@ajouterProd');
Route::get('/mesproduits', 'VendeurController@getProductVendeur');

Route::get('/supprimerProduit/{id}', 'VendeurController@supprimerProduit');
Route::get('articles/{id}/edit', 'VendeurController@edit');
Route::put('articles/{id}', 'VendeurController@update');


Route::group(['prefix' => 'user'], function () {
  Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');
 Route::get('/monpanier','PanierController@MonPanier'); 

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'UserAuth\RegisterController@register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'vendeur'], function () {
  Route::get('/login', 'VendeurAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'VendeurAuth\LoginController@login');
  Route::post('/logout', 'VendeurAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'VendeurAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'VendeurAuth\RegisterController@register');

  Route::post('/password/email', 'VendeurAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'VendeurAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'VendeurAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'VendeurAuth\ResetPasswordController@showResetForm');
});
