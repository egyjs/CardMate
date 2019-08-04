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


Route::get('/', 'VisitorController@index')->name('user.index');
Route::get('/about', 'VisitorController@aboutpage')->name('user.about');
Route::get('/blog', 'VisitorController@blogde')->name('blog.in');
Route::get('/blog-details/{id}', 'VisitorController@blogdetails')->name('blog.details');
Route::get('/contact', 'VisitorController@contact')->name('contact');
Route::post('/send-mail', 'VisitorController@sendmail')->name('sendmailfrmuser');
Route::post('/subscript', 'VisitorController@subscribesave')->name('subscript');
Route::post('/switchLocale', 'TranslationController@switchLocale')->name('Slang');

Route::get('/404', function () {
    $pt = "Page Not ound";
    return view('404', compact('pt'));
})->name('404');
Auth::routes();

//verification
Route::get('/verifiaction', 'VisitorController@verification')->name('user.verify');
Route::post('/send-vcode', 'VisitorController@sendVcode')->name('user.send-vcode');
Route::post('/email-verify', 'VisitorController@emailVerify')->name('user.email-verify');
Route::post('/sms-verify', 'VisitorController@smsVerify')->name('user.sms-verify');

//Payment IPN
Route::get('/ipnbtc', 'PaymentController@ipnBchain')->name('ipn.bchain');
Route::get('/ipnblockbtc', 'PaymentController@blockIpnBtc')->name('ipn.block.btc');
Route::get('/ipnblocklite', 'PaymentController@blockIpnLite')->name('ipn.block.lite');
Route::get('/ipnblockdog', 'PaymentController@blockIpnDog')->name('ipn.block.dog');
Route::post('/ipnpaypal', 'PaymentController@ipnpaypal')->name('ipn.paypal');
Route::post('/ipnperfect', 'PaymentController@ipnperfect')->name('ipn.perfect');
Route::post('/ipnstripe', 'PaymentController@ipnstripe')->name('ipn.stripe');
Route::post('/ipnskrill', 'PaymentController@skrillIPN')->name('ipn.skrill');
Route::post('/ipncoinpaybtc', 'PaymentController@ipnCoinPayBtc')->name('ipn.coinPay.btc');
Route::post('/ipncoinpayeth', 'PaymentController@ipnCoinPayEth')->name('ipn.coinPay.eth');
Route::post('/ipncoinpaybch', 'PaymentController@ipnCoinPayBch')->name('ipn.coinPay.bch');
Route::post('/ipncoinpaydash', 'PaymentController@ipnCoinPayDash')->name('ipn.coinPay.dash');
Route::post('/ipncoinpaydoge', 'PaymentController@ipnCoinPayDoge')->name('ipn.coinPay.doge');
Route::post('/ipncoinpayltc', 'PaymentController@ipnCoinPayLtc')->name('ipn.coinPay.ltc');
Route::post('/ipncoin', 'PaymentController@ipnCoin')->name('ipn.coinpay');
Route::post('/ipncoingate', 'PaymentController@ipnCoinGate')->name('ipn.coingate');
//Payment IPN

//Password Reset
Route::get('/password-resetreq', 'VisitorController@resetEmail')->name('password.resetreq');
Route::post('/password-sendemail', 'VisitorController@sendEmail')->name('password.sendemail');
Route::get('/password-reset/{token}', 'VisitorController@resetForm')->name('password.resetform');
Route::post('/reset-password', 'VisitorController@resetPassword')->name('password.resetpassword');


//User Routes
Route::group(['middleware' => ['auth','uverify']], function() {
    Route::group(['prefix' => 'home'], function ()
    {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/change-password', 'HomeController@changePasswordForm')->name('user.change-password');
        Route::post('/change-password', 'HomeController@changePassword')->name('user.change-passwordpost');
        Route::get('/transactions', 'HomeController@transactionLog')->name('user.transactions');
        Route::get('/manage-balance', 'HomeController@balance')->name('user.balance');
        Route::post('/deposit-post', 'HomeController@depositPost')->name('deposit.post');
        Route::post('/withdraw-post', 'HomeController@withdrawPost')->name('withdraw.post');
        Route::post('/withdraw-post', 'HomeController@withdrawPost')->name('withdraw.post');

        //buy card
        Route::get('/select-category', 'userController@buycard')->name('user.buycard');
        Route::get('/buy-card/{id}', 'userController@selectcardbycategory')->name('category.card');
        Route::post('/view-card/{id}', 'userController@cardView')->name('card.view');
        Route::post('/buy-card-store/', 'userController@usercardstore')->name('user.card.store');

        //user's card
        Route::get('/my-card', 'userController@usermycard')->name('user.mycard');
        Route::get('/used-card', 'userController@userUsedCard')->name('user.old.card');

        //user deposit
        Route::get('/deposit', 'userController@userdeposit')->name('user.deposit');
        Route::post('/deposit', 'userController@userdepositdatainsert')->name('deposit.data-insert');
        Route::get('deposit-preview','userController@userdepositpreview')->name('deposit.preview');
        Route::post('deposit-confrim','PaymentController@depositConfirm')->name('user.deposit.confrim');

        //user tansantion
        Route::get('transaction','userController@usertransaction')->name('user.transaction');

        //passwod chnage
        Route::get('password-change','userController@userpasschnage')->name('user.change-password');
        Route::post('password-change','userController@userpasschnagesave')->name('user.password-update');

        //chnage status
        Route::post('chnage-status','userController@changeusershowshats')->name('chnageusercardshowstats');

        Route::get('profile','userController@profileIndex')->name('profile.index');
        Route::post('profile','userController@profileUpdate')->name('update.profile');

    });
});

Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {

        Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

        //General Settings
        Route::get('/general', 'AdminController@general')->name('admin.general');
        Route::post('/general-update', 'AdminController@generalUpdate')->name('admin.gnlupdate');

        //Payment Gateway
        Route::get('/gateway', 'AdminController@gateway')->name('admin.gateway');
        Route::post('/gateway-craete', 'AdminController@gatewayCreate')->name('admin.gatecre');
        Route::put('/gateway-update/{gateway}', 'AdminController@gatewayUpdate')->name('admin.gateup');

        //Logo-Icon
        Route::get('/logo-icon', 'AdminController@logoIcon')->name('admin.logo');
        Route::post('/logo-update', 'AdminController@logoUpdate')->name('admin.logoupdate');

        //Email-SMS
        Route::get('/email-sms', 'AdminController@emailSms')->name('admin.email');
        Route::post('/email-update', 'AdminController@emailUpdate')->name('admin.emailup');

        //User Management
        Route::get('/users', 'AdminController@userIndex')->name('admin.users');
        Route::post('/user-search', 'AdminController@userSearch')->name('admin.search-users');
        Route::get('/user/{user}', 'AdminController@singleUser')->name('admin.user-single');
        Route::get('/user-banned', 'AdminController@bannedUser')->name('admin.user-ban');
        Route::get('/mail/{user}', 'AdminController@email')->name('admin.user-email');
        Route::post('/sendmail', 'AdminController@sendemail')->name('admin.send-email');
        Route::put('/user/pass-change/{user}', 'AdminController@userPasschange')->name('admin.user-pass');
        Route::put('/user/status/{user}', 'AdminController@statupdate')->name('admin.user-status');
        Route::get('/broadcast', 'AdminController@broadcast')->name('admin.broadcast');
        Route::post('/broadcast/email', 'AdminController@broadcastemail')->name('admin.broadcast-email');

        //Password Change
        Route::get('/change-password', 'AdminController@changePassword')->name('admin.change-password');
        Route::post('/password-update', 'AdminController@updatePassword')->name('admin.password-update');

        //Register New Admin
        Route::get('/new-admin', 'AdminController@newAdmin')->name('admin.new-admin');
        Route::get('/list-admin', 'AdminController@listAdmin')->name('admin.list-admin');
        Route::post('/create-admin', 'AdminController@createAdmin')->name('admin.create-admin');

        //Slider Content
        Route::get('/slider-section', 'FrontendController@sliderSection')->name('admin.slidersection');
        Route::post('/slider-store', 'FrontendController@sliderStore')->name('admin.slide-store');
        Route::post('/slide-update', 'FrontendController@sliderUpdate')->name('admin.slide-update');
        Route::put('/slide-delete', 'FrontendController@sliderDestroy')->name('admin.slide-delete');

        //welcome
        Route::get('/welcome-header', 'FrontendController@welcomeheader')->name('admin.welcomeheader');
        Route::get('/video-section', 'FrontendController@welcomedetails')->name('admin.welcomedetails');
        Route::post('/welcome-details', 'FrontendController@welcomedetailssubmit')->name('admin.welcomedetails.submit');

        //our practise
        Route::get('/practise-header', 'FrontendController@practiseheader')->name('admin.practiseheader');
        Route::post('/practise-header', 'FrontendController@practiseheaderstore')->name('admin.practiseheader.submit');
        Route::get('/our-features-section', 'FrontendController@practisedetails')->name('admin.practisedetails');
        Route::post('/our-features-section', 'FrontendController@practisedetailsstore')->name('admin.features.add');
        Route::post('/practise-details-update', 'FrontendController@practisedetailsupdate')->name('admin.pracdetails-update');
        Route::put('/practise-details-delete', 'FrontendController@practisedetailsdelete')->name('admin.features.delete');

        //attorney
        Route::get('/category-header', 'FrontendController@attorneyheader')->name('admin.attorneyheader');
        Route::post('/attorney-header', 'FrontendController@attorneyheadersubmit')->name('admin.cardheader.submit');
        Route::get('/team-member-details', 'FrontendController@attorneydetails')->name('admin.attorneydetails');

        //static
        Route::get('/static', 'FrontendController@static')->name('admin.static');
        Route::put('/static/{id}', 'FrontendController@staticupdate')->name('admin.staticupdate');
        Route::post('/static', 'AdminController@staticHead')->name('admin.static.head');

        //faq
        Route::get('/faq-header', 'FrontendController@faqheader')->name('admin.faqheader');
        Route::post('/faq-header', 'FrontendController@faqheadersave')->name('admin.faq.submit');
        Route::get('/faq-section', 'FrontendController@faqhdetails')->name('admin.faqdetails');
        Route::post('/faq-update', 'FrontendController@faqupdate')->name('admin.faq-update');
        Route::post('/faq-section', 'FrontendController@faqStore')->name('admin.faq-store');
        Route::post('/faq-delete', 'FrontendController@faqDelete')->name('admin.faq.delete');

        //Social Content
        Route::get('/social-section', 'FrontendController@socialSection')->name('admin.socialsection');
        Route::post('/social-store', 'FrontendController@socialStore')->name('admin.social-store');
        Route::post('/social-update/', 'FrontendController@socialUpdate')->name('admin.social-update');
        Route::put('/social-delete', 'FrontendController@socialDestroy')->name('admin.social-delete');

        //About Content
        Route::get('/about-section', 'FrontendController@aboutSection')->name('admin.aboutsection');
        Route::post('/about-update', 'FrontendController@aboutUpdate')->name('admin.about-update');
        Route::get('/about-static', 'FrontendController@aboutstatic')->name('admin.aboutsectionstatic');
        Route::put('/about-static/{id}', 'FrontendController@aboutstaticip')->name('admin.aboutstatucup');

        //Footer Content
        Route::get('/footer-section', 'FrontendController@footerSection')->name('admin.footersection');
        Route::post('/footer-update', 'FrontendController@footerUpdate')->name('admin.footer-update');

        //user add/sub balance
        Route::get('/user-blanace/{id}', 'AdminController@addsubmoneytouser')->name('admin.useraddsubstracmont');
        Route::post('/user-blanace-save/{id}', 'AdminController@addsubmoneytousersave')->name('adminaddmonet');

        //card category
        Route::get('/card-category', 'AdminController@cardcategory')->name('admin.card.category');
        Route::post('/card-category', 'AdminController@cardcategorystore')->name('admin.category.store');
        Route::post('/card-category-edit', 'AdminController@cardcategoryupdate')->name('admin.catagoryupdate');

        //card categorysub
        Route::get('/card-subcategory', 'AdminController@cardsubcategory')->name('admin.card.subcategory');
        Route::post('/card-subcategory', 'AdminController@cardsubcategorystore')->name('admin.subcategory.store');
        Route::post('/card-subcategory-edit/{id}', 'AdminController@cardsubcategoryupdate')->name('admin.subcatagoryupdate');

        //create card
        Route::get('/card-create', 'AdminController@createcard')->name('admin.card.create');
        Route::post('/card-create', 'AdminController@createcardstore')->name('admin.card.store');
        Route::post('/card-edit/{id}', 'AdminController@createcardupdate')->name('admin.cardupdate');
        Route::get('/card-list', 'AdminController@cardListIndex')->name('admin.card.index');
        Route::get('/card-search', 'AdminController@cardSearch')->name('admin.card.search');
        Route::post('/card-delete', 'AdminController@createcarddelete')->name('admin.carddelete');

        //transaction
        Route::get('transaction-log', 'AdminController@admintransaction')->name('admin.transaction');

        //translation
        Route::get('translation','AdminController@translation')->name('admin.translation');
        Route::post('translation','AdminController@translationUpdate')->name('admin.translation.update');

        //subscriber
        Route::get('subscriber','AdminController@subscriber')->name('admin.subscriber');
        Route::post('subscriber','AdminController@subscriberheader')->name('admin.subscrive.submit');

        //blog
        Route::get('blog-header','AdminController@blogheader')->name('admin.blog.header');
        Route::post('blog-header','AdminController@blogheadersave')->name('admin.blog.head.save');
        Route::get('blog','AdminController@blog')->name('admin.blog');
        Route::post('blog','AdminController@blogsave')->name('admin.blog-store');
        Route::post('blog-update','AdminController@blogupdate')->name('admin.blog-update');
        Route::put('blog-delete','AdminController@blogdelete')->name('admin.blog.delete');

        //happy client
        Route::get('happy-client','AdminController@clientimage')->name('admin.happyclient');
        Route::post('happy-client','AdminController@clientimagesave')->name('admin.clientimagesave');
        Route::post('happy-client-update','AdminController@clientimageupdate')->name('admin.clientimageupdate');
        Route::put('happy-client-delete','AdminController@clientimagedelete')->name('admin.clientimagedelte');

        //contact
        Route::get('contact','AdminController@contact')->name('admin.contact');
        Route::post('contact','AdminController@contactupdate')->name('admin.contact.update');

        //mail-subscriber
        Route::get('broadcast-subscriber','AdminController@subsIndex')->name('mail.subscriber');
        Route::post('broadcast-subscriber','AdminController@subscribersend')->name('subcribe.mail');

        //images
        Route::get('banner','AdminController@bannerIndex')->name('admin.banner');
        Route::post('banner','AdminController@bannerUp')->name('admin.banner.updateppp');
        Route::post('breadcrumb','AdminController@breadcrumbUp')->name('admin.bred.update');
        Route::get('breadcrumb','AdminController@breadcrumbIndex')->name('admin.breadcrumb');


    });
});

//Admin Auth
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@showLoginForm')->name('admin.login')->middleware('guest:admin');
    Route::post('/login', 'AdminController@login')->name('admin.loginpost')->middleware('guest:admin');
    Route::get('/register', 'AdminController@showRegistrationForm')->name('admin.register')->middleware('auth:admin');
    Route::post('/register-post', 'AdminController@register')->name('admin.registerpost')->middleware('auth:admin');
    Route::post('/logout', 'AdminController@logout')->name('admin.logout');

});


