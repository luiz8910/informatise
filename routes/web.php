<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('index');

Route::get('admin', function (){
    return view('admin.index');
});

Route::group(['middleware' => 'auth'], function (){

    //Usuários

    Route::get('/usuario/', 'PersonController@index')->name('person.index');

    Route::get('/criar_usuario', 'PersonController@create')->name('person.create');

    Route::get('/editar_usuario/{id}', 'PersonController@edit')->name('person.edit');

    Route::post('/usuario', 'PersonController@store')->name('person.store');

    Route::put('/usuario/{id}', 'PersonController@update')->name('person.update');

    Route::delete('/usuario/{id}', 'PersonController@delete');

    Route::get('/usuarios_excluidos', "PersonController@deleted")->name('person.deleted');

    Route::get('/activate_user/{id}', 'PersonController@activate');

//----------------------------------------------------------------------------------------------------------------------

    //About - Quem Somos

    Route::get('/quem_somos', 'AboutController@edit')->name('about.edit');

    Route::post('/quem_somos/', 'AboutController@update')->name('about.update');

//----------------------------------------------------------------------------------------------------------------------

    //FAQ

    Route::get('/faq', 'FAQController@index')->name('faq.index');

    Route::get('/criar_faq', 'FAQController@create')->name('faq.create');

    Route::get('/faq/{id}', 'FAQController@edit')->name('faq.edit');

    Route::post('/faq/{redirect?}', 'FAQController@store')->name('faq.store');

    Route::put('/faq/{id}', 'FAQController@update')->name('faq.update');

    Route::delete('/faq/{id}', 'FAQController@delete');

//----------------------------------------------------------------------------------------------------------------------

    //Contact Form

    Route::get('/contatos', 'ContactController@index')->name('contact.index');

    Route::post('/contact', 'ContactController@store')->name('contact.store');

//----------------------------------------------------------------------------------------------------------------------

    //Newsletter Form and list

    Route::get('/newsletter', 'ContactController@newsletters')->name('newsletter.index');

    Route::post('/newsletter', 'ContactController@newsletter_store');

//----------------------------------------------------------------------------------------------------------------------

    //Dados da Empresa

    Route::get("/informacoes", 'ContactController@company_data')->name('company.data');

    Route::post("/informacoes", 'ContactController@company_data_update')->name('company.data.update');

//----------------------------------------------------------------------------------------------------------------------

    //Banners

    Route::get('/banners', 'BannerController@index')->name('banner.index');

    Route::get('/criar_banner', 'BannerController@create')->name('banner.create');

    Route::get('/banner/{id}', 'BannerController@edit')->name('banner.edit');

    Route::post('/banner/{redirect?}', 'BannerController@store')->name('banner.store');

    Route::put('/banner/{id}', 'BannerController@update')->name('banner.update');

    Route::delete('/banner/{id}', 'BannerController@delete');

//----------------------------------------------------------------------------------------------------------------------

    //Video

    Route::get('editar_video', 'VideoController@edit')->name('video.edit');

    Route::put('editar_video', 'VideoController@update')->name('video.update');

//----------------------------------------------------------------------------------------------------------------------

    //Serviços

    Route::get('/servicos/{filter?}', 'ServiceController@index')->name('services.index');

    Route::get('/criar_servico', 'ServiceController@create')->name('services.create');

    Route::get('/servico/{id}', 'ServiceController@edit')->name('services.edit');

    Route::post('/servico', 'ServiceController@store')->name('services.store');

    Route::put('/servico/{id}', 'ServiceController@update')->name('services.update');

    Route::delete('/servico/{id}', 'ServiceController@delete');

//----------------------------------------------------------------------------------------------------------------------

    //Categorias

    Route::get('/categorias/{filter?}', 'CategoryController@index')->name('categories.index');

    Route::get('/criar_categoria', 'CategoryController@create')->name('categories.create');

    Route::get('/categoria/{id}', 'CategoryController@edit')->name('categories.edit');

    Route::post('/categoria', 'CategoryController@store')->name('categories.store');

    Route::put('/categoria/{id}', 'CategoryController@update')->name('categories.update');

    Route::delete('/categoria/{id}', 'CategoryController@delete');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/recuperar_senha', function (){
    return view('auth.passwords.forgot');
})->name('password.forgot');

Route::get("/send_link/{email}", 'Auth\LoginController@send_link_reset_pass');

Route::get('/nova_senha/{token}', 'Auth\LoginController@new_password_view')->name('new.password.view');

Route::post('/nova_senha/{token}', 'Auth\LoginController@new_password')->name('new.password');

Route::get('teste_email', function (){
    return new App\Mail\Contact();
});
