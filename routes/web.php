<?php

use App\Http\Controllers\AttenceStudent;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\GiftHistoryController;
use App\Http\Controllers\MentorCheckedTaskController;
// MentorCheckedTaskController
use App\Http\Controllers\MentorMenuController;
use App\Http\Controllers\MentorCantroller;
use App\Http\Controllers\NotificateCantroller;
use App\Http\Controllers\PaymentCantroller;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\Prisescontroller;
use App\Http\Controllers\SearchCantroller;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\Student\AnswerTask;
use App\Http\Controllers\Student\myTasksController;
// student
use App\Http\Controllers\Student\StudentGroups;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentHelperController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamHelperController;
use App\Http\Controllers\TemaController;
use App\Models\course;
use App\Models\mentor;
use Illuminate\Http\Request;

use App\Http\Controllers\MentorGroupController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentDataController;
use App\Http\Controllers\StudentKursMapController;
use App\Http\Controllers\StudentResultController;
use App\Http\Controllers\StudentReytingController;
use App\Http\Controllers\WarningController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session as FacadesSession;

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
    $course = course::all();
    $mentors = mentor::all();
    return view('welcome' , compact('course' , 'mentors'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//mentor page Dashboard
Route::get('/mentor/dashboard' ,[App\Http\Controllers\HomeController::class, 'mentor_page'])->name('mentor.dashboard');
// mentor router
Route::resource('mentor',MentorCantroller::class)->names('mentor');
Route::get('mentor/search' , [SearchCantroller::class , 'mentor_search'])->name('mentor.search');
//student
Route::resource('student',StudentController::class)->names('student');
//
Route::post('already/studentstore', [StudentHelperController::class, 'doubleStore'])->name('create.group.student');
// course router
Route::resource('course',CourseController::class)->names('course');
// team router
Route::resource('team',TeamController::class)->names('team');
Route::get('/team/active/{id}',[TeamHelperController::class,'active'])->name('team.active');
// prises
Route::resource('prise',Prisescontroller::class)->names('prise');
/// Tema Route
Route::resource('tema' , TemaController::class)->names('tema');
//Taks Route
Route::resource('task' , TasksController::class)->names('task');
// coin
Route::get('coin/index', [CoinController::class, 'index'])->name('coin.index');
Route::patch('/coin/update', [CoinController::class, 'updateCoin'])->name('coin.update');
// warnings
Route::resource('warning', WarningController::class)->names('warning');
//sovgalar route
Route::resource('gift' , GiftController::class)->names('gift');
Route::get('/shopping', [ShoppingController::class, 'index'])->name('shopping');
Route::get('shopping/product/{id}', [ShoppingController::class, 'productShow'])->name('shopping.product');
Route::get('gift/history/index', [GiftHistoryController::class, 'index'])->name('gift.history.index');
Route::get('/gift/history/show/{id}', [GiftHistoryController::class, 'giftHistoryShow'])->name('gift.history.show');
Route::get('/gift/submitted/{id}', [GiftHistoryController::class, 'submitted'])->name('gift.submitted');
//pay tolov route
Route::get('/payment' , [PaymentCantroller::class,'index'])->name('payment.index');
Route::get('/payment/students/{id}',[PaymentCantroller::class,'student'])->name('payment.students');
Route::post('/payment/filling/{id}',[PaymentCantroller::class,'studentPayment'])->name('student.payment');
// Route::post('/payment/filling/{id}',[PaymentCantroller::class,'fillingEnd'])->name('payment.filling');
Route::get('student/payment/history/{id}', [PaymentCantroller::class, 'studentPaymentHistory'])->name('student.payment.history');
// Payment History
Route::get('payment/residual' , [PaymentHistoryController::class , 'Paymentresidual'])->name('payment.residual');
Route::get('residual/students/{id}' , [PaymentHistoryController::class , 'residualStudents'])->name('residual.students');
// quiz
Route::get('quiz/index', [QuizController::class, 'index'])->name('quiz.index');
Route::get('quiz/show/question/{id}', [QuizController::class, 'showQuestion'])->name('quiz.show');


// noitficate
Route::get('notificate',[NotificateCantroller::class,'next_month'])->name('notificate');

// calendar
Route::get('calendar',function(){
    return view('mentorpages.calendar');
});









///mentor pages routes All Mentor
Route::get('/mentor/group/index/{id}' , [MentorGroupController::class , 'index'])->name('mentor.group.index');
Route::post('/mentor/group/attendance' , [MentorGroupController::class , 'attendance'])->name('mentor.group.attendance');
Route::get('/attendanceshow', [MentorGroupController::class, 'mentorGroupSHow'])->name('attendanceseshow');
Route::get('/student/pas/lesson/{id}', [MentorGroupController::class, 'passLessonStudent'])->name('student.past.lesson');
Route::get('/groups/mentor',[MentorMenuController::class,'mentor_group'])->name('mentorgroup');
Route::get('mentor/groups/show/{id}' , [MentorMenuController::class , 'mentor_group_show'])->name('mentor.groups.show');
Route::get('/group/show/{id}' , [MentorMenuController::class , 'groups_show_student'])->name('group.show');
Route::get('mentor/group/tema/{id}' , [MentorMenuController::class , 'mentor_group_tema'])->name('mentor.group.tema');
Route::get('tema/tasks/{id}' , [MentorMenuController::class , 'tematasks'])->name('tema_tasks');
// task checked
Route::get('mentor/checked/task',[MentorCheckedTaskController::class,'index'])->name('mentor.checked.tasks');
Route::get('answer/task/{id}', [MentorCheckedTaskController::class, 'answerTask'])->name('answer.task');
Route::get('tema/task/{id}', [MentorCheckedTaskController::class, 'temaTasks'])->name('answer.task.mentor');
Route::get('answer/see/{id}', [MentorCheckedTaskController::class, 'taskAnswerSee'])->name('task.answer.see');
Route::post('/answer/task/check{id}', [MentorCheckedTaskController::class, 'answerCheck'])->name('task.answer.check');
Route::resource('/points', PointsController::class)->names('point');
// end mentor pages rourtes





// student Pages
Route::get('studentsgroup', [StudentGroups::class, 'index'])->name('studentGroups');

Route::get('/students/mygroups', [myTasksController::class, 'index'])->name('student.mygroups');
Route::get('/students/mytemas/{id}', [myTasksController::class, 'temaShow'])->name('student.mytemas.show');
Route::get('/students/mytasks/{id}', [myTasksController::class, 'taskShow'])->name('student.mytasks.show');

Route::get('answers/tasks/{id}',[AnswerTask::class, 'index'])->name('answer.mytasks');
Route::post('answers/tasks/{id}',[AnswerTask::class, 'store'])->name('answer.mytasks');
Route::get('group/students/{id}', [StudentGroups::class, 'group_students'])->name('team.students');

// results
Route::get('studentpages/result', [StudentResultController::class, 'index'])->name('student.results');
Route::get('studentanswer/result/{id}', [StudentResultController::class, 'show'])->name('studentanswer.results');
Route::get('group/reyting', [StudentReytingController::class,'index'])->name('group.reyting');
Route::get('student/reyting/show/{id}', [StudentReytingController::class,'show'])->name('student.reyting.show');


// kursmap
Route::get('course/map/index', [StudentKursMapController::class, 'index'])->name('student.course.map');
Route::get('course/map/show/{id}', [StudentKursMapController::class, 'show'])->name('student.course.show');

// user data
Route::get('user/data', [StudentDataController::class, 'index'])->name('user.data');
// attendance
Route::get('students/attendance', [AttenceStudent::class, 'index'])->name('student.attendance');



