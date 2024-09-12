<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UnSplashController; 
use App\Http\Controllers\User\OrderController; 
use App\Http\Controllers\User\StaffFeedBackController;
use App\Http\Controllers\FeedBackController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Clear Cache */
Route::get('/clear-cache', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    quick_alert_success('Cache cleared.');
    return back();
});



/* Routs With Laravel Localization */
if (!config('settings.include_language_code')) {
    $middlewares = [
        'middleware' => ['installed', 'checkUserIsBanned', 'quickcms.localize'],
    ];
} else {
    $middlewares = [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['installed', 'checkUserIsBanned', 'localize', 'localizationRedirect', 'localeSessionRedirect'],
    ];
}

Route::group($middlewares, function () {

    /* AUTH ROUTES */
    require __DIR__.'/auth.php';

    /* FRONTEND ROUTES */
    Route::controller('HomeController')->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('faq', 'faqs')->name('faqs');
        Route::get('testimonials', 'testimonials')->name('testimonials');
        Route::get('contact', 'contact')->name('contact');
        Route::get('privacyPolicy', 'privacyPolicy')->name('privacyPolicy');
        Route::get('cookiePolicy', 'cookiePolicy')->name('cookiePolicy');
Route::get('blank','blankpage')->name('blankpage');


Route::get('test','testpage')->name('unsplash.search');
Route::get('load-images', [UnSplashController::class, 'loadImages'])->name('unsplash.loadImages');
Route::post('/save-image', [UnSplashController::class, 'saveImage'])->name('unsplash.saveImage');

        
        Route::post('contact', 'contactSend')->name('contact');
        Route::get('feedback', 'feedback')->name('feedback');
        Route::post('feedback', 'feedbackSend')->name('feedback');
        Route::get('pricing', 'pricing')->name('pricing');
        Route::get('page/{slug}', 'page')->name('page');
        Route::post('newsletter', 'newsletter')->name('newsletter');

        if (!config('settings.include_language_code')) {
            Route::get('lang/{lang}', 'localize')->where('lang', '^[a-z]{2}$')->name('localize');
        }
    });
    Route::post('/upload-image', [UnSplashController::class, 'uploadImage'])->name('upload_image');

    Route::controller('BlogController')->group(function () {
        Route::get('/blog', 'index')->name('blog.index');
        Route::get('blog/category/{slug}', 'category')->name('blog.category');
        Route::get('blog/tags/{slug}', 'tag')->name('blog.tag');
        Route::get('blog/{id}/{slug?}', 'single')->name('blog.single');
        Route::post('blog/{id}/{slug?}', 'comment')->name('blog.comment');
    });
 


    /* FRONTEND LOGIN REQUIRED */
    Route::group(['namespace' => 'User', 'middleware' => ['auth']], function () {

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        Route::resource('restaurants', 'PostController');
        Route::controller('PostController')->group(function () {
          Route::get('restaurants/{restaurant}/updatefake','updateFakeTablesUrl')->name('updatefake');
          Route::get('restaurants/get-orders/{tableId}', 'getOrderByTablenumber');
            Route::get('restaurants/{restaurant}/tableviewer', 'qrBuilder')->name('restaurants.qrbuilder');
            Route::post('restaurants/{restaurant}/tableviewer', 'qrBuilderSave');

            Route::get('restaurants/{restaurant}/menu', 'menu')->name('restaurants.menu');
             Route::post('updateTableStatus/{tableId}/{status}', 'PostController@updateTableStatus')->name('table.update');


            Route::post('restaurants/{restaurant}/tablestatusupgrader', 'tablestatusupgrader')->name('restaurants.tablestatusupgrader');

            Route::post('restaurants/{restaurant}/add-category', 'addCategory')->name('restaurants.addCategory');
            Route::post('restaurants/{restaurant}/update-category', 'updateCategory')->name('restaurants.updateCategory');
            Route::post('restaurants/{restaurant}/delete-category', 'deleteCategory')->name('restaurants.deleteCategory');
            Route::post('restaurants/{restaurant}/reorder-category', 'reorderCategory')->name('restaurants.reorderCategory');

            Route::post('restaurants/{restaurant}/add-sub-category', 'addSubCategory')->name('restaurants.addSubCategory');
            Route::post('restaurants/{restaurant}/update-sub-category', 'updateSubCategory')->name('restaurants.updateSubCategory');

            Route::post('restaurants/{restaurant}/add-menu-item', 'addMenuItem')->name('restaurants.addMenuItem');
            Route::post('restaurants/{restaurant}/update-menu-item', 'updateMenuItem')->name('restaurants.updateMenuItem');
            Route::post('restaurants/{restaurant}/delete-menu-item', 'deleteMenuItem')->name('restaurants.deleteMenuItem');
            Route::post('restaurants/{restaurant}/reorder-menu-item', 'reorderMenuItem')->name('restaurants.reorderMenuItem');

            Route::get('restaurants/{restaurant}/menu/{menu}/extras', 'menuItemExtras')->name('restaurants.menuItemExtras');

            Route::post('restaurants/{restaurant}/menu/{menu}/extras/add-variant-option', 'menuAddVariantOption')->name('restaurants.menuAddVariantOption');
            Route::post('restaurants/{restaurant}/menu/{menu}/extras/update-variant-option', 'menuUpdateVariantOption')->name('restaurants.menuUpdateVariantOption');
            Route::post('restaurants/{restaurant}/menu/{menu}/extras/delete-variant-option', 'menuDeleteVariantOption')->name('restaurants.menuDeleteVariantOption');
            Route::post('restaurants/{restaurant}/menu/{menu}/extras/reorder-variant-option', 'menuReorderVariantOption')->name('restaurants.menuReorderVariantOption');

            Route::post('restaurants/{restaurant}/menu/{menu}/extras/add-variant', 'menuAddVariant')->name('restaurants.menuAddVariant');
            Route::post('restaurants/{restaurant}/menu/{menu}/extras/update-variant', 'menuUpdateVariant')->name('restaurants.menuUpdateVariant');
            Route::post('restaurants/{restaurant}/menu/{menu}/extras/delete-variant', 'menuDeleteVariant')->name('restaurants.menuDeleteVariant');
            Route::post('restaurants/{restaurant}/menu/{menu}/extras/reorder-variant', 'menuReorderVariant')->name('restaurants.menuReorderVariant');

            Route::post('restaurants/{restaurant}/menu/{menu}/extras/add-extra', 'menuAddExtra')->name('restaurants.menuAddExtra');
            Route::post('restaurants/{restaurant}/menu/{menu}/extras/update-extra', 'menuUpdateExtra')->name('restaurants.menuUpdateExtra');
            Route::post('restaurants/{restaurant}/menu/{menu}/extras/delete-extra', 'menuDeleteExtra')->name('restaurants.menuDeleteExtra');
            Route::post('restaurants/{restaurant}/menu/{menu}/extras/reorder-extra', 'menuReorderExtra')->name('restaurants.menuReorderExtra');

            Route::post('restaurants/{restaurant}/add-image-menu-item', 'addImageMenuItem')->name('restaurants.addImageMenuItem');
            Route::post('restaurants/{restaurant}/update-image-menu-item', 'updateImageMenuItem')->name('restaurants.updateImageMenuItem');
            Route::post('restaurants/{restaurant}/delete-image-menu-item', 'deleteImageMenuItem')->name('restaurants.deleteImageMenuItem');
            Route::post('restaurants/{restaurant}/reorder-image-menu-item', 'reorderImageMenuItem')->name('restaurants.reorderImageMenuItem');
           

            
            Route::get('orders/{restaurant?}', 'orders')->name('restaurants.orders');
            Route::post('order/{order}/complete', 'completeOrder')->name('restaurants.completeOrder');
            Route::post('order/{order}/delete', 'deleteOrder')->name('restaurants.deleteOrder');

            Route::get('heartbeat', 'heartbeat')->name('restaurants.heartbeat');
      
       //**** New Routes By Kadir
       Route::get('restaurants/{restaurant}/tablemanage', 'tableManager')->name('restaurants.tablemanage');
       Route::get('restaurants/{restaurant}/table/{tableId}/details' , 'getTableDetail')->name('gettabledetail');
       Route::get('/load-images',  'loadImagesFromUnsplash')->name('loadImages');
   
          });
          Route::controller(OrderController::class)->group(function(){
               Route::get('orders/{restaurant}/table/{tableId}/add', 'addOrder')
                    ->name("orders.addOrder");
           });

    Route::controller('StaffController')->group(function(){
     Route::get('staffs', 'index')->name('staffs');
     Route::get('staffs/create', 'create')->name('staffs_create');
     Route::post('staffs/staffs.store','store')->name('save_staff');
    });
           

    Route::controller('FeedBackController')->group(function(){
   
     Route::get('user/feedbacks', 'index')->name('feedbacks');
     Route::post('user/feedbacks/sendUserFeedBack', 'sendUserFeedBack')->name('feedback.sendUserFeedBack');


     Route::post('feedbacks/staffs.store','store')->name('save_feedback');
    });

        Route::controller('SettingsController')->group(function () {
            Route::get('settings', 'index')->name('settings');
            Route::post('settings/edit-profile', 'editProfile')->name('settings.editProfile')->middleware('demo');
            Route::post('settings/edit-billing', 'editBilling')->name('settings.editBilling');
        });


        Route::get('transactions', 'TransactionController@index')->name('transactions');
        Route::get('invoice/{transaction}', 'TransactionController@invoice')->name('invoice');

        Route::get('subscription', 'SubscribeController@index')->name('subscription');
        Route::post('subscription/cancel', 'SubscribeController@cancelSubscription')->name('subscription.cancel');

        Route::controller('CheckoutController')->group(function () {
            Route::get('checkout', 'index')->name('checkout.index');
            Route::post('checkout', 'index');
        });

    });

    /* RESTAURANT PUBLIC ROUTES */
    Route::post('{restaurant}/call-waiter', 'User\PostController@callTheWaiter')->name('restaurant.callTheWaiter');
    Route::post('{restaurant}/send-order', 'User\PostController@sendOrder')->name('restaurant.sendOrder');
    Route::get('payment/{transaction}', 'User\PaymentController@index')->name('payment.index');
    Route::post('payment/{transaction}/pay', 'User\PaymentController@pay')->name('payment.pay');

    /* PAYMENT ROUTES */
    Route::any('ipn/{gateway}', 'User\PaymentMethods\PaymentController@ipn')->name('ipn');
    Route::post('webhook/{gateway}', 'User\PaymentMethods\PaymentController@webhook')->name('webhook');

    /* ADMIN ROUTES */
    Route::name('admin.')->prefix(admin_url())->namespace('Admin')->middleware(['admin', 'demo'])->group(function () {

        Route::redirect('/', 'admin/dashboard');

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('/posts', 'PostController@index')->name('posts.index');
        Route::post('posts.delete', 'PostController@delete')->name('posts.delete');

        Route::resource('allergies', 'AllergyController');
        Route::post('allergies.delete', 'AllergyController@delete')->name('allergies.delete');
        Route::post('allergies.reorder', 'AllergyController@reorder')->name('allergies.reorder');

        Route::controller('NotificationController')->group(function () {
            Route::get('/notifications', 'index')->name('notifications.index');
            Route::get('notifications/view/{id}', 'view')->name('notifications.view');
            Route::get('notifications/markasread', 'markAsRead')->name('notifications.markasread');
            Route::delete('notifications/deleteallread', 'deleteAllRead')->name('notifications.deleteallread');
        });

        Route::controller('UserController')->group(function () {
            Route::post('users/delete', 'delete')->name('users.delete');
            Route::delete('users/{user}/edit/delete/avatar', 'deleteAvatar')->name('users.deleteAvatar');
            Route::post('users/{user}/edit/sentmail', 'sendMail')->name('users.sendmail');
            Route::get('users/{user}/edit/password', 'password')->name('users.password');
            Route::post('users/{user}/edit/password', 'updatePassword')->name('users.password');
            Route::post('users/{user}/edit/updateplan', 'updatePlan')->name('users.plan');
            Route::post('users/{user}/login', 'loginAsUser')->name('users.login');
         
       
          });
        Route::resource('users', 'UserController');

        Route::controller('TemplateController')->group(function () {
            Route::get('/templates', 'index')->name('templates.index');
            Route::post('/templates', 'templatesActive')->name('templates.active');
        });

        Route::resource('taxes', 'TaxController');
        Route::post('taxes.delete', 'TaxController@delete')->name('taxes.delete');

        Route::resource('transactions', 'TransactionController');
        Route::post('transactions.delete', 'TransactionController@delete')->name('transactions.delete');

        Route::resource('plans', 'PlanController');
        Route::post('plans.delete', 'PlanController@delete')->name('plans.delete');
        Route::post('plans.reorder', 'PlanController@reorder')->name('plans.reorder');

        Route::resource('planoption', 'PlanOptionController');
        Route::post('planoption.delete', 'PlanOptionController@delete')->name('planoption.delete');
        Route::post('planoption.reorder', 'PlanOptionController@reorder')->name('planoption.reorder');

        Route::resource('coupons', 'CouponController');
        Route::post('coupons.delete', 'CouponController@delete')->name('coupons.delete');

        Route::resource('testimonials', 'TestimonialController');
        Route::post('testimonials.delete', 'TestimonialController@delete')->name('testimonials.delete');

        Route::resource('advertisements', 'AdsController');

        Route::resource('pages', 'PageController');

        Route::resource('faqs', 'FaqController');

        Route::controller('PaymentGatewayController')->group(function () {
            Route::get('/payment-gateways', 'index')->name('gateways.index');
            Route::get('payment-gateways/{gateway}/edit', 'edit')->name('gateways.edit');
            Route::post('payment-gateways/{gateway}', 'update')->name('gateways.update');
        });

        Route::controller('EmailTemplateController')->group(function () {
            Route::get('/email-templates', 'index')->name('mailtemplates.index');
            Route::post('email-templates/update', 'update')->name('mailtemplates.update');
        });

        Route::resource('subscriber', 'SubscriberController');

        Route::controller('LanguageController')->group(function () {
            Route::post('languages/reorder', 'reorder')->name('languages.reorder');
            Route::get('languages/translate/{code}', 'translate')->name('languages.translates');
            Route::post('languages/{language}/translate', 'translateUpdate')->name('languages.translates.update');
        });
        Route::resource('languages', 'LanguageController');

        Route::get('settings', 'SettingsController@index')->name('settings.index');
        Route::post('settings', 'SettingsController@update')->name('settings.update');

        Route::resource('blogs', 'BlogController');
        Route::post('blog/delete', 'BlogController@delete')->name('blogs.delete');

        Route::resource('blog/categories', 'BlogCategoryController')->names('blog.category');
        Route::post('blog/categories/reorder', 'BlogCategoryController@reorder')->name('blog.category.reorder');
        Route::post('blog/categories/delete', 'BlogCategoryController@delete')->name('blog.category.delete');

        Route::get('blog/comments', 'BlogCommentController@index')->name('blog.comments.index');
        Route::post('blog/comments/delete', 'BlogCommentController@delete')->name('blog.comments.delete');
        Route::post('blog/comments/{id}/approve', 'BlogCommentController@approve')->name('blog.comments.approve');

        Route::resource('plugins', 'PluginsController');
        Route::post('plugin/{id}/enable', 'PluginsController@enable')->name('plugins.enable');
        Route::post('plugin/{id}/disable', 'PluginsController@disable')->name('plugins.disable');
    });
});

/* POST PAGE VIEW */
Route::get('{slug}', 'User\PostController@publicView')->name('publicView');






Route::get('/pusherconfig', function () {
     return response()->json([
         'key' => config('broadcasting.connections.pusher.key'),
         'cluster' => config('broadcasting.connections.pusher.options.cluster'),
     ]);
 });
 