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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::get('home', function (){
   return redirect('/') ;
});


/*------------Admin Panel-------------*/

Route::name('admin.')->namespace('Admin')->middleware('auth')->group(function (){

    Route::get('dashboard','DashboardController@dashboard')->name('dashboard');

    Route::get('dashboard_home',function (){
       return redirect('dashboard');
    });

Route::middleware('is_admin')->group(function (){

    Route::get('app-configuration','AppConfigurationController@appConfigurationView')->name('app-configuration');

    Route::post('app-configuration/add','AppConfigurationController@appConfigurationAdd')->name('app-configuration.add');

    Route::match(['get','post'],'app-configuration/list','AppConfigurationController@appConfigurationList')->name('app-configuration.list');



    Route::get('app-configuration/edit/{id}', 'AppConfigurationController@appConfigurationEditView')->name('app-configuration.edit.view');
    Route::post('app-configuration/edit/{id}', 'AppConfigurationController@appConfigurationEdit')->name('app-configuration.edit');

    Route::get('app-configuration/delete/{id}','AppConfigurationController@appConfigurationDelete')->name('app-configuration.delete');

    Route::get('category','CategoryController@categoryView')->name('category.view');
    Route::post('category/add','CategoryController@categoryAdd')->name('category.add');

    Route::get('category/list', 'CategoryController@categoryList')->name('category.list');

    Route::get('category/edit/{id}','CategoryController@categoryEditView')->name('category.edit.view');
    Route::post('category/edit/{id}','CategoryController@categoryEdit')->name('category.edit');

    Route::get('category/delete/{id}','CategoryController@categoryDelete')->name('category.delete');

    Route::get('service','ServiceController@serviceView')->name('service.view');

    Route::post('service/add','ServiceController@serviceAdd')->name('service.add');

    Route::get('service/list', 'ServiceController@serviceList')->name('service.list');

    Route::get('service/edit/{id}', 'ServiceController@serviceEditView')->name('service.edit.view');
    Route::post('service/edit/{id}', 'ServiceController@serviceEdit')->name('service.edit');

    Route::get('service/delete/{id}', 'ServiceController@serviceDelete')->name('service.delete');

    Route::get('enquiry/list','EnquiryController@enquiryList')->name('enquiry.list');
    Route::get('export/enquiry/list','EnquiryController@export')->name('export.enquiry.list');
    Route::post('file/att','EnquiryController@fileAtt')->name('file.att');

    Route::get('setting','SettingController@settingView')->name('setting.view');

    Route::post('setting/add','SettingController@settingAdd')->name('setting.add');

    Route::get('setting/list','SettingController@settingList')->name('setting.list');

    Route::get('setting/edit/{id}','SettingController@settingEditView')->name('setting.edit.view');
    Route::post('setting/edit/{id}','SettingController@settingEdit')->name('setting.edit');

    Route::get('setting/delete/{id}','SettingController@settingDelete')->name('setting.delete');

    Route::get('testimonial','TestimonialController@testimonialView')->name('testimonial.view');

    Route::post('testimonial/add','TestimonialController@testimonialAdd')->name('testimonial.add');

    Route::get('testimonial/list','TestimonialController@testimonialList')->name('testimonial.list');

    Route::get('testimonial/edit/{id}','TestimonialController@testimonialEditView')->name('testimonial.edit.view');
    Route::post('testimonial/edit/{id}','TestimonialController@testimonialEdit')->name('testimonial.edit');

    Route::get('testimonial/delete/{id}','TestimonialController@testimonialDelete')->name('testimonial.delete');

    Route::get('team','TeamController@teamView')->name('team.view');

    Route::post('team/add','TeamController@teamAdd')->name('team.add');

    Route::match(['get','post'],'team/list','TeamController@teamList')->name('team.list');

    Route::get('team/export/','TeamController@downloadExport')->name('team.export');

    Route::post('team/list/import','TeamController@listImport')->name('list.import');

    Route::get('team/edit/{id}','TeamController@teamEditView')->name('team.edit.view');
    Route::post('team/edit/{id}','TeamController@teamEdit')->name('team.edit');

    Route::get('team/delete/{id}','TeamController@teamDelete')->name('team.delete');

    Route::get('slider','SliderController@sliderView')->name('slider.view');

    Route::post('slider/add','SliderController@sliderAdd')->name('slider.add');

    Route::get('slider/list','SliderController@sliderList')->name('slider.list');

    Route::get('slider/edit/{id}','SliderController@sliderEditView')->name('slider.edit.view');
    Route::post('slider/edit/{id}','SliderController@sliderEdit')->name('slider.edit');

    Route::get('slider/delete/{id}','SliderController@sliderDelete')->name('slider.delete');





});
    Route::get('post','PostController@postView')->name('post.view');

    Route::post('post/add','PostController@postAdd')->name('post.add');

    Route::match(['get','post'],'post/list','PostController@postlist')->name('post.list');
    Route::post('pdf','PostController@pdf')->name('export.pdf.post.list');

    Route::post('import','UserController@importUser')->name('import.user');

    Route::get('post/edit/{id}','PostController@postEditView')->name('post.edit.view');
    Route::post('post/edit/{id}','PostController@postEdit')->name('post.edit');

    Route::get('post/delete/{id}','PostController@blogDetailView')->name('post.delete');

    Route::prefix('user')->name('user.')->group(function (){

    Route::get('edit','UserController@editProfileView')->name('edit.view');
    Route::post('edit','UserController@editProfile')->name('edit');

    Route::post('password','UserController@editPassword')->name('edit.password');

   });

});





/*For FRONT END */

Route::namespace('FrontEnd')->group(function () {
    Route::get('/','HomeController@homeView')->name('home');
    Route::get('about','AboutUsController@aboutUs')->name('about');
    Route::get('services','ServiceController@service')->name('services');
    Route::get('categories','CategoryController@category')->name('categories');
   Route::get('contact','ContactController@contactView')->name('contact.view');
   Route::post('contact','ContactController@contact')->name('contact');
   Route::get('blog','BlogController@blogView')->name('blog.view');
   Route::get('blog/{id}','BlogController@blogDetailView')->name('blog');
   Route::post('comment/{post_id}','BlogController@commentAdd')->name('comment');

});



