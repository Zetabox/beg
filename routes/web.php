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
function autoSelectLanguage($aLanguages, $sDefault = 'fr') {
  if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $aBrowserLanguages = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
    foreach($aBrowserLanguages as $sBrowserLanguage) {
      $sLang = strtolower(substr($sBrowserLanguage,0,2));
      if(in_array($sLang, $aLanguages)) {
        return $sLang;
      }
    }
  }
  return $sDefault;
}

$lang = Session::get('language');
        if ($lang != null)
        {
             \App::setLocale($lang);
        }
        else
        {
            $lang = autoSelectLanguage(array('fr','en'), 'fr');
            Session::put('language',$lang);
            \App::setLocale($lang);
        }

Route::get('/lang/{locale}', function ($locale)
	{
		//
		$rules = [
        'language' => 'in:en,fr,de' //list of supported languages of your application.
        ];

        $language = $locale; //lang is name of form select field.

        $validator = Validator::make(compact($language),$rules);

        if($validator->passes())
        {
            Session::put('language',$language);
            \App::setLocale($language);
        }
        else
        {/**/ }
		
		return Redirect::back(); 
	});

Route::get('/', function () {
	$lang = Session::get ('language');
        if ($lang != null) App::setLocale($lang);
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});
Route::get('/404', function() {
	return view('404');
});

Route::get('/{locale}/contact', function() {
	return view('contact');
});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
