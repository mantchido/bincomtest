<?php

//WEBPAGES RESOURCES
Route::get('/', ['as'=>'home', 'uses'=>'PollingController@index']);
Route::get('/result-checker', ['as'=>'poll.result.checker', 'uses'=>'PollingController@getCheckResult']);
Route::get('/result-check', ['as'=>'poll.result.check', 'uses'=>'PollingController@getSearch']);
Route::get('/view-summed-result', ['as'=>'poll.summed.result', 'uses'=>'PollingController@getSummedResultView']);
Route::get('/summed-result', ['as'=>'poll.post.summed.result', 'uses'=>'PollingController@getSummedResult']);

//Agent Login
Route::get('/login', ['as'=>'agent.login', 'uses'=>'PollingController@getAgentLogin']);
Route::post('/login', ['as'=>'agent.post.login', 'uses'=>'PollingController@postAgentLogin']);
Route::get('/logout', ['as'=>'agent.logout', 'uses'=>'PollingController@getAgentLogout']);

Route::get('/poll/add/new/unit', ['as'=>'new.unit', 'uses'=>'PollingController@getAddUnit']);
Route::post('/poll/add/new/unit', ['as'=>'post.new.unit', 'uses'=>'PollingController@postAddUnit']);