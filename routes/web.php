<?php

//use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\OptionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\ActivitiesController;
use App\Http\Controllers\Dashboard\AdditionalActivitieController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ServicesController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    SendAdsNotification(21, 'test new', "<a href='/'>new Ads</a>", 'ads notification');

    return view('dashboard.dashboard1');
})->middleware('LanguageSwitcher', 'auth', 'is_verified')->name('dashboard');
Route::post('store-file', [FileController::class, 'store']);

Route::group(['prefix' => 'auth', 'middleware' => ['is_login', 'LanguageSwitcher']], function () {

    Route::post('check', [AuthController::class, 'checkMobileUser'])->name('check');

    Route::get('login', [AuthController::class, '_getLogin'])->name('login');

    Route::post('postLogin', [AuthController::class, '_postLogin'])->name('post.login');
});
Route::group(['prefix' => 'auth'], function () {
    Route::get('register', [AuthController::class, '_getRegister'])->name('get.register');
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('logout', [AuthController::class, '_getLogout'])->name('get.logout');
});
Route::get('/profile', [DashboardController::class, '_getProfile'])->name('profile');
Route::group(['prefix' => 'users', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('/all', [UserController::class, 'index'])->name('users.all');
});
Route::group(['prefix' => 'dashboard', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('dashboard1', function () {
        return view('dashboard.dashboard1');
    });
    Route::get('dashboard2', function () {
        return view('dashboard.dashboard2');
    });
    Route::get('dashboard3', function () {
        return view('dashboard.dashboard3');
    });
    Route::get('dashboard4', function () {
        return view('dashboard.dashboard4');
    });
    Route::get('dashboard5', function () {
        return view('dashboard.dashboard5');
    });
    Route::get('dashboard-social', function () {
        return view('dashboard.dashboard-social');
    });
});

Route::post('delete-item', 'App\Http\Controllers\Controller@_deleteItem')->name('delete-item');
Route::post('add-item', 'App\Http\Controllers\Controller@_addItem')->name('add-item');
Route::post('get-item', 'App\Http\Controllers\Controller@_getItem')->name('get-item');
Route::post('update-item', 'App\Http\Controllers\Controller@_updateItem')->name('update-item');
Route::get('Item/{model}', 'App\Http\Controllers\Controller@indexItem')->name('Item')->middleware('LanguageSwitcher');
// Route::get('/showcustomer/{id}','admin\SupplierController@showcustomer')->name('showcustomer');

//File Manger route
Route::group(['prefix' => 'FileManger', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('/', 'App\Http\Controllers\Dashboard\FileMangerController@index')->name('FileManger');
    Route::post('store-file', 'App\Http\Controllers\Dashboard\FileMangerController@store')->name('store-file');
    Route::get('delete-file/{id}', 'App\Http\Controllers\Dashboard\FileMangerController@destroy')->name('delete-file');
});
//Quotes route
Route::group(['prefix' => 'Quotes', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('/', 'App\Http\Controllers\Dashboard\QuotesController@index')->name('Quotes');
});
//eBills route
Route::group(['prefix' => 'eBills', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('/', 'App\Http\Controllers\Dashboard\eBillsController@index')->name('eBills');
});
// Options route
Route::get('settings', [OptionController::class, '_getSetting'])->name('settings')->middleware("LanguageSwitcher");

Route::post('settings', [OptionController::class, '_saveSetting'])->name('save-settings');

Route::post('save-quick-settings', [OptionController::class, '_saveQuickSetting'])->name('save-quick-settings');

Route::post('set-featured-image', [OptionController::class, '_setFeaturedImage'])->name('set-featured-image');

Route::post('delete-featured-image', [OptionController::class, '_deleteFeaturedImage'])->name('delete-featured-image');

Route::post('get-list-item', [OptionController::class, '_getListItem'])->name('get-list-item');

Route::group(['prefix' => 'addItem', 'middleware' => 'LanguageSwitcher', 'namespace' => 'App\Http\Controllers\Dashboard'], function () {


    Route::group(['prefix' => 'emplyee'], function () {
        // Route::get('employment', 'EmploymentTypeController');


    });
    Route::group(['prefix' => 'project'], function () {
        Route::resource('project', 'ProjectTypeController');
    });
    Route::group(['prefix' => 'material'], function () {
        Route::resource('material', 'MaterialTypeController');
    });
});
Route::group(['prefix' => 'Users', 'middleware' => 'LanguageSwitcher', 'namespace' => 'App\Http\Controllers\Dashboard'], function () {


    Route::get('delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});
Route::group(['prefix' => 'apps', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('calendar', function () {
        return view('apps.calendar');
    });
    Route::get('chat', function () {
        return view('apps.chat');
    });
    Route::group(['prefix' => 'companies'], function () {
        Route::get('lists', function () {
            return view('apps.companies.lists');
        });
        Route::get('company-details', function () {
            return view('apps.companies.company-details');
        });
    });
    Route::get('contacts', function () {
        return view('apps.contacts');
    });
    Route::group(['prefix' => 'ecommerce', 'middleware' => 'LanguageSwitcher'], function () {
        Route::get('dashboard', function () {
            return view('apps.ecommerce.dashboard');
        });
        Route::get('products', function () {
            return view('apps.ecommerce.products');
        });
        Route::get('product-details', function () {
            return view('apps.ecommerce.product-details');
        });
        Route::get('add-product', function () {
            return view('apps.ecommerce.add-product');
        });
        Route::get('orders', function () {
            return view('apps.ecommerce.orders');
        });
        Route::get('order-details', function () {
            return view('apps.ecommerce.order-details');
        });
        Route::get('customers', function () {
            return view('apps.ecommerce.customers');
        });
        Route::get('sellers', function () {
            return view('apps.ecommerce.sellers');
        });
        Route::get('cart', function () {
            return view('apps.ecommerce.cart');
        });
        Route::get('checkout', function () {
            return view('apps.ecommerce.checkout');
        });
    });
    Route::group(['prefix' => 'email', 'middleware' => 'LanguageSwitcher'], function () {
        Route::get('inbox', function () {
            return view('apps.email.inbox');
        });
        Route::get('details', function () {
            return view('apps.email.details');
        });
        Route::get('compose', function () {
            return view('apps.email.compose');
        });
    });
    Route::get('file-manager', function () {
        return view('apps.file-manager');
    });
    Route::get('invoice-list', function () {
        return view('apps.invoice-list');
    });
    Route::group(['prefix' => 'notes', 'middleware' => 'LanguageSwitcher'], function () {
        Route::get('list', function () {
            return view('apps.notes.list');
        });
        Route::get('details', function () {
            return view('apps.notes.details');
        });
        Route::get('create', function () {
            return view('apps.notes.create');
        });
    });
    Route::get('social', function () {
        return view('apps.social');
    });
    Route::get('task-list', function () {
        return view('apps.task-list');
    });
    Route::group(['prefix' => 'tickets', 'middleware' => 'LanguageSwitcher'], function () {
        Route::get('list', function () {
            return view('apps.tickets.list');
        });
        Route::get('details', function () {
            return view('apps.tickets.details');
        });
    });
});

Route::group(['prefix' => 'authentications', 'middleware' => 'LanguageSwitcher'], function () {
    Route::group(['prefix' => 'style1'], function () {
        Route::get('login', function () {
            return view('authentications.style1.login');
        });
        Route::get('signup', function () {
            return view('authentications.style1.signup');
        });
        Route::get('locked', function () {
            return view('authentications.style1.locked');
        });
        Route::get('forgot-password', function () {
            return view('authentications.style1.forgot-password');
        });
        Route::get('confirm-email', function () {
            return view('authentications.style1.confirm-email');
        });
    });
    Route::group(['prefix' => 'style2', 'middleware' => 'LanguageSwitcher'], function () {
        Route::get('login', function () {
            return view('authentications.style2.login');
        });
        Route::get('signup', function () {
            return view('authentications.style2.signup');
        });
        Route::get('locked', function () {
            return view('authentications.style2.locked');
        });
        Route::get('forgot-password', function () {
            return view('authentications.style2.forgot-password');
        });
        Route::get('confirm-email', function () {
            return view('authentications.style2.confirm-email');
        });
    });
    Route::group(['prefix' => 'style3', 'middleware' => 'LanguageSwitcher'], function () {
        Route::get('login', function () {
            return view('authentications.style3.login');
        });
        Route::get('signup', function () {
            return view('authentications.style3.signup');
        });
        Route::get('locked', function () {
            return view('authentications.style3.locked');
        });
        Route::get('forgot-password', function () {
            return view('authentications.style3.forgot-password');
        });
        Route::get('confirm-email', function () {
            return view('authentications.style3.confirm-email');
        });
    });
});

Route::group(['prefix' => 'pages', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('coming-soon', function () {
        return view('pages.coming-soon');
    });
    Route::get('coming-soon2', function () {
        return view('pages.coming-soon2');
    });
    Route::get('contact-us', function () {
        return view('pages.contact-us');
    });
    Route::get('contact-us2', function () {
        return view('pages.contact-us2');
    });
    Route::group(['prefix' => 'error', 'middleware' => 'LanguageSwitcher'], function () {
        Route::get('error404', function () {
            return view('pages.error.error404');
        });
        Route::get('error500', function () {
            return view('pages.error.error500');
        });
        Route::get('error503', function () {
            return view('pages.error.error503');
        });
        Route::get('maintenance', function () {
            return view('pages.error.maintenance');
        });
        Route::get('error404-two', function () {
            return view('pages.error.error404-two');
        });
        Route::get('error500-two', function () {
            return view('pages.error.error500-two');
        });
        Route::get('error503-two', function () {
            return view('pages.error.error503-two');
        });
        Route::get('maintenance-two', function () {
            return view('pages.error.maintenance-two');
        });
    });
    Route::get('faq', function () {
        return view('pages.faq');
    });
    Route::get('faq2', function () {
        return view('pages.faq2');
    });
    Route::get('faq3', function () {
        return view('pages.faq3');
    });
    Route::get('helpdesk', function () {
        return view('pages.helpdesk');
    });
    Route::get('notifications', function () {
        return view('pages.notifications');
    });
    Route::get('pricing', function () {
        return view('pages.pricing');
    });
    Route::get('pricing2', function () {
        return view('pages.pricing2');
    });
    Route::get('privacy-policy', function () {
        return view('pages.privacy-policy');
    });
    Route::get('profile', function () {
        return view('pages.profile');
    });
    Route::get('profile-edit', function () {
        return view('pages.profile-edit');
    });
    Route::get('search-result', function () {
        return view('pages.search-result');
    });
    Route::get('search-result2', function () {
        return view('pages.search-result2');
    });
    Route::get('sitemap', function () {
        return view('pages.sitemap');
    });
    Route::get('timeline', function () {
        return view('pages.timeline');
    });
});

Route::group(['prefix' => 'basic-ui', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('accordions', function () {
        return view('basic-ui.accordions');
    });
    Route::get('animation', function () {
        return view('basic-ui.animation');
    });
    Route::get('cards', function () {
        return view('basic-ui.cards');
    });
    Route::get('carousel', function () {
        return view('basic-ui.carousel');
    });
    Route::get('countdown', function () {
        return view('basic-ui.countdown');
    });
    Route::get('counter', function () {
        return view('basic-ui.counter');
    });
    Route::get('dragitems', function () {
        return view('basic-ui.dragitems');
    });
    Route::get('lightbox', function () {
        return view('basic-ui.lightbox');
    });
    Route::get('lightbox-sideopen', function () {
        return view('basic-ui.lightbox-sideopen');
    });
    Route::get('list-groups', function () {
        return view('basic-ui.list-groups');
    });
    Route::get('media-object', function () {
        return view('basic-ui.media-object');
    });
    Route::get('modals', function () {
        return view('basic-ui.modals');
    });
    Route::get('notifications', function () {
        return view('basic-ui.notifications');
    });
    Route::get('scrollspy', function () {
        return view('basic-ui.scrollspy');
    });
    Route::get('session-timeout', function () {
        return view('basic-ui.session-timeout');
    });
    Route::get('sweet-alerts', function () {
        return view('basic-ui.sweet-alerts');
    });
    Route::get('tabs', function () {
        return view('basic-ui.tabs');
    });
    Route::get('tour-tutorial', function () {
        return view('basic-ui.tour-tutorial');
    });
});

Route::group(['prefix' => 'ui-elements', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('alerts', function () {
        return view('ui-elements.alerts');
    });
    Route::get('avatar', function () {
        return view('ui-elements.avatar');
    });
    Route::get('badges', function () {
        return view('ui-elements.badges');
    });
    Route::get('breadcrumbs', function () {
        return view('ui-elements.breadcrumbs');
    });
    Route::get('buttons', function () {
        return view('ui-elements.buttons');
    });
    Route::get('colors', function () {
        return view('ui-elements.colors');
    });
    Route::get('dropdown', function () {
        return view('ui-elements.dropdown');
    });
    Route::get('grid', function () {
        return view('ui-elements.grid');
    });
    Route::get('jumbotron', function () {
        return view('ui-elements.jumbotron');
    });
    Route::get('list-group', function () {
        return view('ui-elements.list-group');
    });
    Route::get('loading-spinners', function () {
        return view('ui-elements.loading-spinners');
    });
    Route::get('paging', function () {
        return view('ui-elements.paging');
    });
    Route::get('popovers', function () {
        return view('ui-elements.popovers');
    });
    Route::get('progress-bar', function () {
        return view('ui-elements.progress-bar');
    });
    Route::get('ribbons', function () {
        return view('ui-elements.ribbons');
    });
    Route::get('tooltips', function () {
        return view('ui-elements.tooltips');
    });
    Route::get('typography', function () {
        return view('ui-elements.typography');
    });
    Route::get('video', function () {
        return view('ui-elements.video');
    });
});

Route::get('widgets', function () {
    return view('widgets');
})->middleware('LanguageSwitcher');

Route::get('tables', function () {
    return view('tables');
})->middleware('LanguageSwitcher');

Route::get('data-tables', function () {
    return view('data-tables');
})->middleware('LanguageSwitcher');

Route::group(['prefix' => 'forms', 'middleware' => 'LanguageSwitcher'], function () {
    Route::group(['prefix' => 'controls'], function () {
        Route::get('base-inputs', function () {
            return view('forms.controls.base-inputs');
        });
        Route::get('input-groups', function () {
            return view('forms.controls.input-groups');
        });
        Route::get('checkbox', function () {
            return view('forms.controls.checkbox');
        });
        Route::get('radio', function () {
            return view('forms.controls.radio');
        });
        Route::get('switch', function () {
            return view('forms.controls.switch');
        });
    });
    Route::group(['prefix' => 'widgets', 'middleware' => 'LanguageSwitcher'], function () {
        Route::get('picker', function () {
            return view('forms.widgets.picker');
        });
        Route::get('tagify', function () {
            return view('forms.widgets.tagify');
        });
        Route::get('touch-spin', function () {
            return view('forms.widgets.touch-spin');
        });
        Route::get('maxlength', function () {
            return view('forms.widgets.maxlength');
        });
        Route::get('switch', function () {
            return view('forms.widgets.switch');
        });
        Route::get('select-splitter', function () {
            return view('forms.widgets.select-splitter');
        });
        Route::get('bootstrap-select', function () {
            return view('forms.widgets.bootstrap-select');
        });
        Route::get('select2', function () {
            return view('forms.widgets.select2');
        });
        Route::get('input-masks', function () {
            return view('forms.widgets.input-masks');
        });
        Route::get('autogrow', function () {
            return view('forms.widgets.autogrow');
        });
        Route::get('range-slider', function () {
            return view('forms.widgets.range-slider');
        });
        Route::get('clipboard', function () {
            return view('forms.widgets.clipboard');
        });
        Route::get('typeahead', function () {
            return view('forms.widgets.typeahead');
        });
        Route::get('captcha', function () {
            return view('forms.widgets.captcha');
        });
    });
    Route::get('validation', function () {
        return view('forms.validation');
    });
    Route::get('layouts', function () {
        return view('forms.layouts');
    });
    Route::get('text-editor', function () {
        return view('forms.text-editor');
    });
    Route::get('file-upload', function () {
        return view('forms.file-upload');
    });
    Route::get('multiple-step', function () {
        return view('forms.multiple-step');
    });
});

Route::group(['prefix' => 'maps', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('leaflet-map', function () {
        return view('maps.leaflet-map');
    });
    Route::get('vector-map', function () {
        return view('maps.vector-map');
    });
});
Route::group(['middleware' => 'LanguageSwitcher', 'namespace' => 'App\Http\Controllers'], function () {


    Route::get('all-notifications/{page?}', [NotificationController::class, '_allNotifications'])->name('all-notifications');
    Route::get('delete-notification/{id}', [NotificationController::class, '_deleteNotification'])->name('delete-notification');
});
Route::group(['prefix' => 'charts', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('apex-chart', function () {
        return view('charts.apex-chart');
    });
    Route::get('chartlist-chart', function () {
        return view('charts.chartlist-chart');
    });
    Route::get('chartjs', function () {
        return view('charts.chartjs');
    });
    Route::get('morris-chart', function () {
        return view('charts.morris-chart');
    });
});

//Activities routes
Route::group(['prefix' => 'Activities', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('/all', [ActivitiesController::class, 'index'])->name('activites.all');
    Route::get('/create', [ActivitiesController::class, 'create'])->name('activites.create');
    Route::post('/store', [ActivitiesController::class, 'store'])->name('activites.store');
    Route::get('/delete/{id}', [ActivitiesController::class, 'destroy'])->name('activites.delete');
    Route::get('/show/{id}', [ActivitiesController::class, 'show'])->name('activites.show');
    Route::get('/edit/{id}', [ActivitiesController::class, 'edit'])->name('activites.edit');
    Route::post('/update/{id}', [ActivitiesController::class, 'update'])->name('activites.update');
});
//AdditionalActivitie routes
Route::group(['prefix' => 'AdditionalActivitie', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('/all', [AdditionalActivitieController::class, 'index'])->name('additionalactivitie.all');
    Route::get('/create', [AdditionalActivitieController::class, 'create'])->name('additionalactivitie.create');
    Route::post('/store', [AdditionalActivitieController::class, 'store'])->name('additionalactivitie.store');
    Route::get('/delete/{id}', [AdditionalActivitieController::class, 'destroy'])->name('additionalactivitie.delete');
    Route::get('/show/{id}', [AdditionalActivitieController::class, 'show'])->name('additionalactivitie.show');
    Route::get('/edit/{id}', [AdditionalActivitieController::class, 'edit'])->name('additionalactivitie.edit');
    Route::post('/update/{id}', [AdditionalActivitieController::class, 'update'])->name('additionalactivitie.update');
});
//ProjectServices routes
Route::group(['prefix' => 'Services', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('/all', [ServicesController::class, 'index'])->name('services.all');
    Route::get('/create', [ServicesController::class, 'create'])->name('services.create');
    Route::post('/store', [ServicesController::class, 'store'])->name('services.store');
    Route::get('/delete/{id}', [ServicesController::class, 'destroy'])->name('services.delete');
    Route::get('/show/{id}', [ServicesController::class, 'show'])->name('services.show');
    Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('services.edit');
    Route::post('/update/{id}', [ServicesController::class, 'update'])->name('services.update');
});

Route::group(['prefix' => 'starter', 'middleware' => 'LanguageSwitcher'], function () {
    Route::get('blank-page', function () {
        return view('starter.blank-page');
    });
    Route::get('breadcrumbs', function () {
        return view('starter.breadcrumbs');
    });
});

// For Clear cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::get('/lan/{lang}', [LanguageController::class, 'change'])->name("LanguageSwitcher");
// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('error-404');
})->where('page', '.*');
