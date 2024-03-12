<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\FullCalenderController;

Route::get('/clear-cache', function() {



	$exitCode = Artisan::call('config:clear');

    $exitCode = Artisan::call('cache:clear');

	$exitCode = Artisan::call('view:clear');

	$exitCode = Artisan::call('route:clear');

 

    return '<h1>Cache facade value cleared</h1>';

});



// Route::get('/clear-cache', function() {

//     Artisan::call('cache:clear');

//     return 'Application cache has been cleared';

// });



//Clear route cache:

Route::get('/route-cache', function() {

	Artisan::call('route:cache');

    return 'Routes cache has been cleared';

});



//Clear config cache:

Route::get('/config-cache', function() {

 	Artisan::call('config:cache');

 	return 'Config cache has been cleared';

}); 



// Clear view cache:

Route::get('/view-clear', function() {

    Artisan::call('view:clear');

    return 'View cache has been cleared';

});



Route::get('/admin', [AdminController::class,'index'])->name('admin');

Route::post('/dologin', [AdminController::class,'dologin']); 

Route::get('admin/forgotpassword', [AdminController::class,'forgotpassword']);

Route::post('admin/forgot_password', [AdminController::class,'forgot_password']);

// Route::get('admin/reset_password', [AdminController::class,'reset_password']);

// Route::post('admin/reset_password', [AdminController::class,'updatePassword']);

Route::get('ad_resetpassword/{id}', [AdminController::class,'resetpassword']);
Route::post('reset_password', [AdminController::class,'updatePassword'])->name('reset-paswword');







Route::group(['middleware' => ['checklogin']], function () {

Route::get('admin/dashboard', [AdminController::class,'home']);

Route::get('admin/change_password', [AdminController::class,'changepassword']);

Route::post('admin/change_password', [AdminController::class,'change_password']);

Route::get('admin/logout', [AdminController::class,'logout']);


Route::get('admin/employees', [AdminController::class,'Employees']);
Route::get('/get-emp-details', [AdminController::class,'EmployeesDetails']);
Route::post('/emp-update-pass', [AdminController::class,'EmployeesUpdatePass']);
Route::post('/del-em', [AdminController::class,'EmployeesDelete']);
Route::get('admin/employees/profile/{id}', [AdminController::class,'EmployeesProfile']);

Route::post('/update-salary-emp', [AdminController::class,'UpdateSalaryEmployee']);
Route::post('/update-office-location', [AdminController::class,'UpdateEmployeeOfficeLocation']);

Route::get('admin/leaves', [AdminController::class,'Leaves']);
Route::post('/update-employee-leave', [AdminController::class,'UpdateEmployeeLeave']);
Route::post('/del-leave', [AdminController::class,'LeavesDelete']);
Route::get('admin/leave-settings', [AdminController::class,'LeaveSetting']);
Route::get('admin/holidays', [AdminController::class,'holidays']);
Route::get('admin/attendance', [AdminController::class,'attendance']);
Route::post('/update-attendance', [AdminController::class,'UpdateAttendance']);
//Route::get('admin/calender', [AdminController::class,'calender']);

Route::get('admin/salary', [AdminController::class,'salary']);
Route::post('/salary-payroll', [AdminController::class,'SalaryPayroll']);
Route::get('admin/salary/{empid}/{salid}', [AdminController::class,'GenerateSalary']);
Route::get('admin/emp-salary/generate-pdf', [AdminController::class,'EmpGeneratePDF']);

Route::get('admin/salary-view', [AdminController::class,'SalaryView']);
Route::get('admin/leave-reports', [AdminController::class,'LeaveReports']);
Route::get('admin/attendance-reports', [AdminController::class,'AttendanceReports']);
Route::get('admin/employee-reports', [AdminController::class,'EmployeeReports']);
Route::get('admin/employee-assets', [AdminController::class,'EmployeeAssets']);
Route::post('/employee-assets', [AdminController::class,'PostEmployeeAssets']);
Route::post('/update-employee-assets', [AdminController::class,'UpdateEmployeeAssets']);

Route::get('admin/performance-appraisal', [AdminController::class,'PerformanceAppraisal']);
Route::get('admin/announcement', [AdminController::class,'Announcement']);
Route::post('/announcement', [AdminController::class,'SubmitAnnouncement']);
Route::get('admin/company-policies', [AdminController::class,'CompanyPolicies']);
Route::get('admin/travelpolicies', [AdminController::class,'TravelPolicies']);
Route::post('/policies', [AdminController::class,'UpdateCompanyPolicies']);
Route::get('admin/reimbursement', [AdminController::class,'Reimbursement']);

Route::get('admin/travel', [AdminController::class,'Travel']);
Route::post('/update-travel-status', [AdminController::class,'UpdateTravelStatus']);

Route::get('admin/assign-role', [AdminController::class,'AssignRole']);
Route::post('/assign-role', [AdminController::class,'UpdateAssignRole']);
Route::post('/delete-assign-role', [AdminController::class,'DeleteAssignRole']);
Route::get('admin/consultant-salary-slip', [AdminController::class,'consultantSalarySlip']);
Route::post('/consultant-salary-payroll', [AdminController::class,'ConsultantSalaryPayroll']);
Route::get('admin/assign-manager-team-lead', [AdminController::class,'AssignManagerTeamlead']);
Route::post('/assign-manager-team-lead', [AdminController::class,'UpdateAssignManagerTeamlead']);
Route::post('/delete-assign-manager-team-lead', [AdminController::class,'DeleteAssignManagerTeamlead']);


Route::post('excel-import', [AdminController::class,'Excelimport'])->name('excel-import');
Route::post('/export-attendance',[AdminController::class,'exportAttendance'] )->name('exportAttendance');


Route::post('/emp-profile-details', [AdminController::class, 'GetProfileDetails']);
Route::post('/emp-profile-info', [AdminController::class, 'EditProfileDetails'])->name('emp-profile-info');
Route::post('/emp-image-profile', [AdminController::class, 'UpdateProfileImage'])->name('uploadProfileImage');
Route::post('/emp_get-emargency-details', [AdminController::class, 'GetEmargencyDetails'])->name('get-emargency-details');
Route::post('/emp_post-emargency-details', [AdminController::class, 'EditEmargencyDetails'])->name('post-emargency-details');

Route::post('/emp_post-bank-details', [AdminController::class, 'EditBankDetails'])->name('post-bank-details');
Route::post('/emp_get-bank-details', [AdminController::class, 'GetBankDetails'])->name('get-bank-details');
Route::get('admin/department-org', [AdminController::class, 'DepartmentOrg'])->name('department-org');
Route::post('/department-org', [AdminController::class, 'SubmitDepartmentOrg']);


/*--------------Office Location---------- */
Route::get('admin/add-location', [AdminController::class,'AddLocation']);
Route::post('/add-location', [AdminController::class,'PostLocation']);
Route::post('/delete-location', [AdminController::class,'DeleteLocation']);



Route::get('admin/consultant-salary', [AdminController::class,'ConsultantSalary']);
Route::get('admin/consultant-salary/{empid}/{salid}', [AdminController::class,'ConsultantSalaryGenerateSalary']);
Route::get('admin/consultant-salary/generate-pdf/{empid}/{salid}', [AdminController::class,'GeneratePDF']);
Route::post('/delete-consultant-salary', [AdminController::class,'DeleteConsultantSalary']);

Route::post('/employee-add', [AdminController::class, 'EmployeeAdd']);

Route::controller(FullCalenderController::class)->group(function(){
    Route::get('admin/calender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});


Route::get('admin/localtravel', [AdminController::class,'localTravel']);
Route::post('/update-localtravel', [AdminController::class,'LocalTravelSubmit']);

Route::get('admin/local-pay-reimbursement', [AdminController::class,'localPayReimbursement']);
Route::post('/update-local-pay-reimbursement', [AdminController::class,'localPayReimbursementSubmit']);

});




/*

|============================|

|====Frontend route==========|

|============================|

*/

// Route::get('/', [HomeController::class, 'pagemaintance']);

Route::get('/', [HomeController::class, 'home']);

Route::get('/login', [HomeController::class, 'login'])->name('login');

Route::post('/login', [HomeController::class, 'dologin']);

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/forget-password', [HomeController::class, 'forget_password'])->name('forget-password');

Route::get('/otp-verification', [HomeController::class, 'otp_verification'])->name('otp-verification');

Route::post('/verify-otp', [HomeController::class, 'verifyOtp']);

Route::get('/reset-password', [HomeController::class, 'email_reset_password'])->name('reset-password');

Route::post('/reset-password-email-check', [HomeController::class, 'ResetPasswordEmailcheck'])->name('reset-password-email-check');

Route::post('/change-password', [HomeController::class, 'ChangePassword']);

Route::get('/signup', [HomeController::class, 'register'])->name('signup');

Route::post('/signup', [HomeController::class, 'postregister']);


//Route::get('/my-profile', [HomeController::class, 'myprofile'])->name('my-profile');

Route::get('/404', [HomeController::class, 'page_not_found'])->name('404-page-not-found');


Route::get('/profile', [HomeController::class, 'MyProfile'])->name('profile');
Route::get('/get-profile-details', [HomeController::class, 'GetProfileDetails'])->name('get-profile-details');
Route::post('/edit-profile-info', [HomeController::class, 'EditProfileDetails'])->name('edit-profile-info');

Route::post('/image-profile', [HomeController::class, 'UpdateProfileImage'])->name('uploadProfileImage');
Route::get('/get-emargency-details', [HomeController::class, 'GetEmargencyDetails'])->name('get-emargency-details');
Route::post('/post-emargency-details', [HomeController::class, 'EditEmargencyDetails'])->name('post-emargency-details');

Route::post('/post-bank-details', [HomeController::class, 'EditBankDetails'])->name('post-bank-details');
Route::get('/get-bank-details', [HomeController::class, 'GetBankDetails'])->name('get-bank-details');

Route::get('admin-dashboard', [HomeController::class, 'adminDashboard'])->name('admin-dashboard');

Route::get('employee-dashboard', [HomeController::class, 'employeeDashboard'])->name('employee-dashboard');
Route::get('employee-salary', [HomeController::class, 'EmployeeSalary'])->name('employee-salary');

//Route::get('salary-view', [HomeController::class, 'SalaryView'])->name('salary-view');
Route::get('employee-salary/salary-view/{salid}', [HomeController::class,'GenerateSalary']);

Route::get('leaves-employee', [HomeController::class, 'LeavesEmployee'])->name('leaves-employee');
Route::post('/leaves-employee', [HomeController::class, 'PostLeavesEmployee']);
Route::get('attendance-reports', [HomeController::class, 'AttendanceReports'])->name('attendance-reports');
Route::get('holidays', [HomeController::class, 'Holidays'])->name('holidays');
Route::get('announcement/{slug}', [HomeController::class, 'Announcement'])->name('announcement');

Route::post('/check-in-out', [HomeController::class, 'CheckInOut'])->name('check-in-out');
Route::get('performance-appraisal', [HomeController::class, 'PerformanceAppraisal'])->name('performance-appraisal');
Route::get('assets', [HomeController::class, 'Assets'])->name('assets');
Route::get('travel', [HomeController::class, 'Travel'])->name('travel');
Route::post('/travel-request-delete', [HomeController::class, 'TravelRequestDelete']);

Route::post('/travel-request', [HomeController::class, 'TravelRequest'])->name('travel-request');
Route::get('company-policies', [HomeController::class,'CompanyPolicies']);
Route::get('travel-policies', [HomeController::class,'TravelPolicies']);
Route::get('reimbursement', [HomeController::class,'Reimbursement']);
Route::post('/reimbursement', [HomeController::class,'UpdateReimbursement']);


Route::get('/check-profile-details', [HomeController::class,'CheckProfileDetails']);
Route::get('/localtravel', [HomeController::class,'localTravel']);
Route::post('/localtravel', [HomeController::class,'LocalTravelSubmit']);

Route::get('/local-pay-reimbursement', [HomeController::class,'localPayReimbursement']);
Route::post('/local-pay-reimbursement', [HomeController::class,'localPayReimbursementSubmit']);





