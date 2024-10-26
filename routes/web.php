<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\BillGenerationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\MarriageController;
use App\Http\Controllers\BirthCertificateController;
use App\Http\Controllers\DeathCertificateController;
use App\Http\Controllers\ComplainsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\TradeLicenseController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\WastageController;
use App\Http\Controllers\WaterTaxController;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [UserController::class, 'showLoginForm'])->name('login.page');
Route::get('/captcha-refresh', [UserController::class, 'refreshCaptcha'])->name('captcha.refresh');

Route::get('custom/password/forgot', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('custom.password.forgot');
Route::post('custom/password/email', [ForgotPasswordController::class, 'sendResetLink'])->name('custom.password.email');
Route::get('custom/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('custom.password.reset');
Route::post('custom/password/reset', [ForgotPasswordController::class, 'resetPassword'])->name('custom.password.update');


Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['check.status', 'auth'])->group(function () {

    Route::get('dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('notification', [NotificationController::class, 'notification'])->name('notification');

    /* User Module */
    Route::get('user-list', [UserController::class, 'userList'])->name('user.list');
    Route::get('user-view/{id}', [UserController::class, 'userView'])->name('user.view');
    Route::post('user-status-change', [UserController::class, 'statusUserChange'])->name('user.status.change');

    /* My properties */
    Route::get('property-list', [PropertyController::class, 'myPropertyList'])->name('my.property.list');
    Route::post('property-status', [PropertyController::class, 'PropertyStatus'])->name('property.status.change');
    Route::get('property-view/{id}', [PropertyController::class, 'Property'])->name('property.view');
    Route::post('upload-property-pay-slip', [PropertyController::class, 'UploadPropertyTaxSlip'])->name('upload.property.pay.slip');
    // Route::get('Pay.Property.tax/{id}', [PropertyController::class, 'PayPropertyTax'])->name('Pay.Property.tax');

    /* My properties permission */
    Route::get('property-permission-list', [PropertyController::class, 'myPropertyPermissionList'])->name('my.property.permission.list');
    Route::post('property-permission-status', [PropertyController::class, 'PropertyPermissionStatus'])->name('property.status.permission.change');
    Route::get('property-permission-view/{id}', [PropertyController::class, 'PropertyPermission'])->name('property.permission.view');
    Route::post('upload-permission-pay-slip', [PropertyController::class, 'UploadPropertyPermissionTaxSlip'])->name('upload.permission.pay.slip');
    /* certificate module */
    // Route::get('marriage-certificate-list', [MarriageController::class, 'marriageCertificateList'])->name('marriage.certificate.list');
    // Route::get('marriage-certificate-view/{id}', [MarriageController::class, 'marriageCertificateView'])->name('marriage.certificate.view');
    // Route::get('marriage-certificate-gernatepdf/{id}', [MarriageController::class, 'marriageCertificatePdf'])->name('marriage.certificate.gernatepdf');
    // Route::post('status-change', [MarriageController::class, 'statusChange'])->name('status.change');

    // Birth Certificate
    Route::get('birth-certificate', [BirthCertificateController::class, 'birthCertificate'])->name('birth.certificate');
    Route::post('birth-certificate-status', [BirthCertificateController::class, 'birthCertificateStatus'])->name('birth.status.change');
    Route::get('list-birth-certificate', [BirthCertificateController::class, 'birthCertificateList'])->name('birth.certificate.list');
    Route::get('view-birth-certificate/{id}', [BirthCertificateController::class, 'birthCertificateView'])->name('birth.certificate.view');
    Route::post('pay-slip_birth_certificate', [BirthCertificateController::class, 'UploadBirthCertificateSlip'])->name('birth.certificate.pay.slip');

    /* certificate module */
    Route::get('marriage-certificate-list', [MarriageController::class, 'marriageCertificateList'])->name('marriage.certificate.list');
    Route::get('marriage-certificate-view/{id}', [MarriageController::class, 'marriageCertificateView'])->name('marriage.certificate.view');
    Route::get('marriage-certificate-gernatepdf/{id}', [MarriageController::class, 'marriageCertificatePdf'])->name('marriage.certificate.gernatepdf');
    Route::post('marriage-status-change', [MarriageController::class, 'statusChange'])->name('marriage.status.change');
    Route::post('pay-slip_marriage-certificate', [MarriageController::class, 'UploadMarriageCertificateSlip'])->name('marriage.certificate.pay.slip');

    // death Certificate
    Route::get('list-death-certificate', [DeathCertificateController::class, 'deathCertificateList'])->name('death.certificate.list');
    Route::get('view-death-certificate/{id}', [DeathCertificateController::class, 'deathCertificateView'])->name('death.certificate.view');
    Route::get('add-death-certificate-gernatepdf/{id}', [DeathCertificateController::class, 'deathCertificatePdf'])->name('death.certificate.pdf');
    Route::post('death-status-change', [DeathCertificateController::class, 'statusDeathChange'])->name('death.status.change');
    Route::post('pay-slip_death_certificate', [DeathCertificateController::class, 'UploadDeathCertificateSlip'])->name('death.certificate.pay.slip');

    // complains
    Route::get('complains', [ComplainsController::class, 'complains'])->name('complains');
    Route::get('complains-view/{id}', [ComplainsController::class, 'complainsView'])->name('complains.view');
    Route::post('complain.status.change', [ComplainsController::class, 'complainsStatus'])->name('complain.status.change');
    Route::get('chat-complains/{id}', [ComplainsController::class, 'Complainschat'])->name('complains.chat');
    Route::post('messages-complains', [ComplainsController::class, 'Complainsmessages'])->name('complains.message');

    /* Trade Lincance */
    Route::get('trade-license-list', [TradeLicenseController::class, 'tradeLicenseList'])->name('trade.license.list');
    Route::get('trade-license-view/{id}', [TradeLicenseController::class, 'tradeLicenseView'])->name('trade.license.view');
    Route::get('trade-license-gernatepdf/{id}', [TradeLicenseController::class, 'tradeLicensePdf'])->name('trade.license.gernatepdf');
    Route::post('trade-status-change', [TradeLicenseController::class, 'statusTradeChange'])->name('trade.status.change');
    Route::get('trade-category-list', [TradeLicenseController::class, 'tradeCategoryList'])->name('trade.category.list');
    Route::get('trade-category-add', [TradeLicenseController::class, 'tradeCategoryAdd'])->name('trade.category.add');
    Route::Post('trade-category-add', [TradeLicenseController::class, 'tradeCategorySave'])->name('trade.category.save');
    Route::delete('trade-category-delete', [TradeLicenseController::class, 'tradeCategoryDelete'])->name('trade.category.delete');
    Route::get('trade-subcategory-list', [TradeLicenseController::class, 'tradeSubCategoryList'])->name('trade.subcategory.list');
    Route::get('trade-subcategory-add', [TradeLicenseController::class, 'tradeSubCategoryAdd'])->name('trade.subcategory.add');
    Route::Post('trade-subcategory-save', [TradeLicenseController::class, 'tradeSubCategorySave'])->name('trade.subcategory.save');
    Route::delete('trade-subcategory-delete/{id}', [TradeLicenseController::class, 'tradeSubCategoryDelete'])->name('trade.subcategory.delete');
    Route::post('upload-pay-slip', [TradeLicenseController::class, 'UploadPropertyTaxSlip'])->name('upload.pay.slip');
    Route::get('trade-listing', [TradeLicenseController::class, 'tradeListing'])->name('trade.tradeListing');
    Route::get('trade-list-edit/{id?}', [TradeLicenseController::class, 'tradeListingEdit'])->name('trade.tradeListingEdit');
    Route::put('trade-list-store/{id?}', [TradeLicenseController::class, 'tradeListingStore'])->name('trade.tradeListingStore');
    Route::get('trade-category-edit/{id?}', [TradeLicenseController::class, 'tradeCategoryEdit'])->name('trade.tradeCategoryEdit');
    Route::put('trade-category-update/{id?}', [TradeLicenseController::class, 'tradeCategoryUpdate'])->name('trade.tradeCategoryUpdate');


    /* User Module */
    Route::get('user-list', [UserController::class, 'userList'])->name('user.list');
    Route::get('user-view/{id}', [UserController::class, 'userView'])->name('user.view');
    Route::post('user-status-change', [UserController::class, 'statusUserChange'])->name('user.status.change');
    Route::get('profile-details', [UserController::class, 'profileDetails'])->name('profile.details');
    Route::post('profile-update', [UserController::class, 'profileUpdate'])->name('profile.update');

    Route::get('wastage-collection', [WastageController::class, 'wastageCollection'])->name('wastage.collection');
    Route::get('wastage-view/{id?}', [WastageController::class, 'WastageView'])->name('WastageView');
    Route::post('wastage-status-change', [WastageController::class, 'wastageStatus'])->name('wastageStatus');

    Route::get('water-tax', [WaterTaxController::class, 'waterTax'])->name('water.tax');
    Route::get('water-view/{id?}', [WaterTaxController::class, 'waterView'])->name('waterView');
    Route::post('status-change', [WaterTaxController::class, 'waterStatus'])->name('waterStatus');

    // Bill Generation
    Route::get('bill-generation', [BillGenerationController::class, 'billGeneration'])->name('admin.billGeneration');
    Route::get('property-tax-bill', [BillGenerationController::class, 'propertyTaxBill'])->name('admin.propertyTaxBill');
    Route::get('property-tax-bill-view/{id?}', [BillGenerationController::class, 'propertyTaxBillView'])->name('admin.propertyTaxBillView');
    Route::get('birth-bill-generation', [BillGenerationController::class, 'birthBill'])->name('admin.birthBill');
    Route::get('birth-bill-view/{id?}', [BillGenerationController::class, 'birthBillView'])->name('admin.birthBillView');
    Route::get('death-bill-generation', [BillGenerationController::class, 'deathBill'])->name('admin.deathBill');
    Route::get('death-bill-view/{id?}', [BillGenerationController::class, 'deathBillView'])->name('admin.deathBillView');
    Route::get('marriage-bill-generation', [BillGenerationController::class, 'marriageBill'])->name('admin.marriageBill');
    Route::get('marriage-bill-view/{id?}', [BillGenerationController::class, 'marriageBillView'])->name('admin.marriageBillView');
    Route::get('trade-license-bill-generation', [BillGenerationController::class, 'tradeLicenseBill'])->name('admin.tradeLicenseBill');
    Route::get('trade-license-bill-view/{id?}', [BillGenerationController::class, 'tradeLicenseBillView'])->name('admin.tradeLicenseBillView');
    Route::get('wastage-bill-generation', [BillGenerationController::class, 'wastageBill'])->name('admin.wastageBill');
    Route::get('wastage-bill-view/{id?}', [BillGenerationController::class, 'wastageBillView'])->name('admin.wastageBillView');
    Route::get('water-bill-generation', [BillGenerationController::class, 'waterBill'])->name('admin.waterBill');
    Route::get('water-bill-view/{id?}', [BillGenerationController::class, 'waterBillView'])->name('admin.waterBillView');
    Route::get('export-property-bill', [BillGenerationController::class, 'exportPropertyBill'])->name('export-exportPropertyBill');
    Route::get('export-property-view-bill/{id?}', [BillGenerationController::class, 'exportPropertyViewBill'])->name('export-exportPropertyViewBill');
    Route::get('export-birth-bill', [BillGenerationController::class, 'exportBirthBill'])->name('export-exportBirthBill');
    Route::get('export-birth-view-bill/{id?}', [BillGenerationController::class, 'exportBirthViewBill'])->name('export-exportBirthViewBill');
    Route::get('export-death-bill', [BillGenerationController::class, 'exportDeathBill'])->name('export-exportDeathBill');
    Route::get('export-death-view-bill/{id?}', [BillGenerationController::class, 'exportDeathViewBill'])->name('export-exportDeathViewBill');
    Route::get('export-marriage-bill', [BillGenerationController::class, 'exportMarriageBill'])->name('export-exportMarriageBill');
    Route::get('export-marriage-view-bill/{id?}', [BillGenerationController::class, 'exportMarriageViewBill'])->name('export-exportMarriageViewBill');
    Route::get('export-wastage-bill', [BillGenerationController::class, 'exportWastageBill'])->name('export-exportWastageBill');
    Route::get('export-wastage-view-bill/{id?}', [BillGenerationController::class, 'exportWastageViewBill'])->name('export-exportWastageViewBill');
    Route::get('export-water-bill', [BillGenerationController::class, 'exportWaterBill'])->name('export-exportWaterBill');
    Route::get('export-water-view-bill/{id?}', [BillGenerationController::class, 'exportWaterViewBill'])->name('export-exportWaterViewBill');
    Route::get('export-trade-bill', [BillGenerationController::class, 'exportTradeBill'])->name('export-exportTradeBill');
    Route::get('export-trade-view-bill/{id?}', [BillGenerationController::class, 'exportTradeViewBill'])->name('export-exportTradeViewBill');

    //advertisement routes
    Route::get('advertisement-home', [AdvertisementController::class, 'homeAdvertisement'])->name('admin.homeAdvertisement');
    Route::get('advertisement-list', [AdvertisementController::class, 'advertisementList'])->name('admin.advertisementList');
    Route::get('add-advertisement', [AdvertisementController::class, 'addAdvertisement'])->name('admin.addAdvertisement');
    Route::post('store-advertisement', [AdvertisementController::class, 'storeAdvertisement'])->name('admin.storeAdvertisement');
    Route::post('toggle-advertisement-status', [AdvertisementController::class, 'toggleAdvertisementStatus'])->name('admin.toggleAdvertisementStatus');
    Route::get('application-list', [AdvertisementController::class, 'applicationList'])->name('admin.applicationList');
    Route::get('application-view/{id?}', [AdvertisementController::class, 'applicationView'])->name('admin.applicationView');
    Route::post('advertisement-approve', [AdvertisementController::class, 'approveAdvertisement'])->name('advertisement.approve');
    Route::post('advertisement-reject', [AdvertisementController::class, 'rejectAdvertisement'])->name('advertisement.reject');
});
