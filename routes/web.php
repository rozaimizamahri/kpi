<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

// Task
    use App\Http\Controllers\Task\TaskController;
// Task

// List
    use App\Http\Controllers\Listing\ApproverListingController;
    use App\Http\Controllers\Listing\AssignListingController; 
    use App\Http\Controllers\Listing\ListingController;
    use App\Http\Controllers\Listing\SubmitListingController;
    use App\Http\Controllers\Listing\AssessmentListingController;
    use App\Http\Controllers\Listing\ReviewListingController;
    use App\Http\Controllers\Listing\CheckerListingController;
    use App\Http\Controllers\Listing\EndorseListingController;
    use App\Http\Controllers\Listing\ReviewerListingController;
    use App\Http\Controllers\Listing\ViewListingController;
    use App\Http\Controllers\Listing\DashboardController;
    use App\Http\Controllers\Listing\HistoryListingController;
// List

// Maintenance
    use App\Http\Controllers\Maintenance\AllTaskListController;
use App\Http\Controllers\Maintenance\ReminderController;
use App\Http\Controllers\Maintenance\GroupListController;
    use App\Http\Controllers\Maintenance\PerspectiveListController;
    use App\Http\Controllers\Maintenance\IndicatorListController;
    use App\Http\Controllers\Maintenance\ReportController;
    use App\Http\Controllers\Maintenance\SettingController;
use App\Http\Controllers\Maintenance\TableController;
use App\Http\Controllers\Maintenance\YearController;
// Maintenance

// User
    use App\Http\Controllers\User\SuperAdministratorController;
    use App\Http\Controllers\User\OBPController;
    use App\Http\Controllers\User\CKPIController;
// User

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

// Login
    Route::get('/login',       [LoginController::class, 'getlogin']);
    Route::post('/login/post', [LoginController::class, 'login']);
// Login

// Sessions Exists
    Route::middleware(['sessions'])->group(function () {
        
        // Logout
            Route::post('/logout/post', [LoginController::class, 'logout'], function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
        // Logout

        // Home
            Route::get('/',                                         [HomeController::class,'index'],                            function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
            Route::get('/home',                                     [HomeController::class,'index'],                            function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
        // Home

        // Task (HEAD)
            Route::get('/head/systems',                             [TaskController::class,'systems'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
            Route::get('/head/excels',                              [TaskController::class,'excels'],                           function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
            Route::get('/head/reassigns',                           [TaskController::class,'reassigns'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
            Route::get('/head/reassigns/{taskId}/view',           [TaskController::class,'viewReassign'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER'); 

            Route::post('/head/reassigns/updateReassign1',           [TaskController::class,'updateReassign1'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER'); 
            Route::post('/head/reassigns/updateReassign2',           [TaskController::class,'updateReassign2'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER'); 
            Route::post('/head/reassigns/updateReassign3',           [TaskController::class,'updateReassign3'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER'); 
            Route::post('/head/reassigns/updateReassign4',           [TaskController::class,'updateReassign4'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER'); 
            Route::post('/head/reassigns/updateReassign5',           [TaskController::class,'updateReassign5'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER'); 
            Route::post('/head/reassigns/updateReassign6',           [TaskController::class,'updateReassign6'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER'); 
            Route::post('/head/reassigns/updateReassign7',           [TaskController::class,'updateReassign7'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER'); 
        // Task (HEAD)

        // Task
        // Task

        // Maintenance
            // OBP
                // Task
                    Route::get('/obps/fetchTasks',                       [TaskController::class,'fetchTasks'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
                    Route::get('/obps/fetchUserRemarks',                       [TaskController::class,'fetchUserRemarks'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
                    Route::get('/obps/fetchAssignorRemarks',                       [TaskController::class,'fetchAssignorRemarks'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
                    Route::post('/obps/tasks/edit',                       [TaskController::class,'editTasks'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
                    Route::post('/obps/tasks/concur',                       [TaskController::class,'concurTasks'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
                    Route::post('/obps/tasks/update',                       [TaskController::class,'updateTasks'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');

                    // Systems
                        Route::get('/obps/systems',                 [TaskController::class,'systems'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
                        Route::get('/obps/fetchStaffs',             [TaskController::class,'fetchStaffs'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
                        Route::post('/obps/systems/add',            [TaskController::class,'addsystems'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
                    // Systems

                    Route::get('/obps/excels',                      [TaskController::class,'excels'],                           function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
                    Route::get('/obps/reassigns',                   [TaskController::class,'reassigns'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN|MODERATOR|USER');
                // Task

                // Maintenance
                    // All Task List
                        Route::get('/obps/alltasklists',            [AllTaskListController::class,'alltasklists'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');
                    // All Task List

                    // Setting
                        Route::get('/obps/settings',                [SettingController::class,'settings'],                      function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/obps/fetchSetting',            [SettingController::class,'fetchSetting'],                      function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/obps/settings/edit',          [SettingController::class,'edit'],                      function () {})->middleware('roles:SUPERADMIN|ADMIN');
                    // Setting

                    // Report
                        Route::get('/obps/reports',                 [ReportController::class,'obp_reports'],                    function () {})->middleware('roles:SUPERADMIN|ADMIN');
                    // Report 

                    // User Maintenance
                        Route::get('/obps/users',                   [OBPController::class,'index'],                             function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/obps/fetchUsers',              [OBPController::class,'fetch'],                             function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/obps/fetchEditDelete',         [OBPController::class,'fetchEditDelete'],                   function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/obps/addUser',                [OBPController::class,'add'],                               function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/obps/editUser',               [OBPController::class,'edit'],                              function () {})->middleware('roles:SUPERADMIN|ADMIN'); 
                    // User Maintenance 
                // Maintenance
            // OBP

            // CKPI
                // List 
                    // Index
                        Route::get('/ckpis/lists',                              [ListingController::class,'ckpi_list'],                         function () {})->middleware('roles:SUPERADMIN|ADMIN'); 
                        Route::get('/ckpis/fetch_years',                        [ListingController::class,'ckpi_fetch_year'],                   function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        Route::post('/ckpis/add',                               [ListingController::class,'ckpi_add'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN'); 
                        Route::get('/ckpis/fetch',                              [ListingController::class,'ckpi_fetch'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN');   
                        Route::post('/ckpis/delete',                            [ListingController::class,'ckpi_delete'],                       function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                    // Index

                    // Submit
                        Route::get('/ckpis/submit/{appId}/submit',              [SubmitListingController::class,'submit'],                      function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/ckpis/rework/{appId}/rework',              [SubmitListingController::class,'reworkv'],                      function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/ckpis/endorsers',                          [SubmitListingController::class,'endorser'],                    function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        Route::get('/ckpis/kpiowners',                          [SubmitListingController::class,'kpiowner'],                    function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        Route::get('/ckpis/assignees',                          [SubmitListingController::class,'assignee'],                    function () {})->middleware('roles:SUPERADMIN|ADMIN');   
                        Route::post('/ckpis/add_bank',                          [SubmitListingController::class,'add_bank'],                    function () {})->middleware('roles:SUPERADMIN|ADMIN'); 

                        Route::get('/ckpis/groupLists',                         [SubmitListingController::class,'group'],                       function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        Route::get('/ckpis/quarterLists',                       [SubmitListingController::class,'quarter'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        Route::get('/ckpis/quarterList_quarters',               [SubmitListingController::class,'quarterList_quarters'],        function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        Route::get('/ckpis/perspectiveList_perspectives',       [SubmitListingController::class,'perspectiveList_perspectives'],function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        Route::get('/ckpis/groupList_groups',                   [SubmitListingController::class,'groupList_groups'],            function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        
                        // Perspective
                            Route::get('/ckpis/perspectiveLists',               [SubmitListingController::class,'perspective'],                 function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                            Route::get('/ckpis/perspectiveEditDelete',          [SubmitListingController::class,'perspectiveEditDelete'],       function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                            Route::post('/ckpis/submit/addPerspective',         [SubmitListingController::class,'addPerspective'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                            Route::post('/ckpis/submit/editPerspective',        [SubmitListingController::class,'editPerspective'],             function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                            Route::post('/ckpis/submit/deletePerspective',      [SubmitListingController::class,'deletePerspective'],           function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        // Perspective 
                        
                        // Indicator
                            Route::get('/ckpis/indicatorLists',                 [SubmitListingController::class,'indicator'],                   function () {})->middleware('roles:SUPERADMIN|ADMIN'); 
                            Route::get('/ckpis/indicatorEditDelete',            [SubmitListingController::class,'indicatorEditDelete'],         function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                            Route::post('/ckpis/submit/addIndicator',           [SubmitListingController::class,'addIndicator'],                function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                            Route::post('/ckpis/submit/editIndicator',          [SubmitListingController::class,'editIndicator'],               function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                            Route::post('/ckpis/submit/deleteIndicator',        [SubmitListingController::class,'deleteIndicator'],             function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        // Indicator

                        // Assignee
                            Route::post('/ckpis/submit/updateAssignee',         [SubmitListingController::class,'updateAssignee'],              function () {})->middleware('roles:SUPERADMIN|ADMIN'); 
                        // Assignee

                        // Declare
                            Route::get('/ckpis/submit/endorsers',               [SubmitListingController::class,'endorser'],                    function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                            Route::post('/ckpis/submit/declare',                [SubmitListingController::class,'declare'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                            Route::post('/ckpis/submit/rework',                 [SubmitListingController::class,'rework'],                      function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        // Declare 
                    // Submit

                    // View
                        Route::get('/ckpis/view/{appId}/view',                  [ViewListingController::class,'view'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN');
                    // View

                    // Dashboard
                        Route::get('/ckpis/dashboard/{appId}/dashboard',              [DashboardController::class,'dashboard'],                      function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');
                    // Dashboard

                    // Endorse (Superior)
                        Route::get('/ckpis/endorse/{appId}/endorse',            [EndorseListingController::class,'endorse'],                           function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/endorse/declare',                   [EndorseListingController::class,'declare'],                           function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        Route::post('/ckpis/endorse/rework',                    [EndorseListingController::class,'rework'],                            function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                    // Endorse (Superior)

                    // KPI Owner
                        Route::get('/ckpis/assign/{appId}/{assigneeId}/assign', [AssignListingController::class,'assign'],                      function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');
                        Route::get('/ckpis/assign_history/{appId}/{assigneeId}/assign_history', [AssignListingController::class,'assign_history'],                      function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');
                        Route::get('/ckpis/assign/all',                         [AssignListingController::class,'all'],                    function () {})->middleware('roles:SUPERADMIN|ADMIN|USER'); 
                        Route::post('/ckpis/assign/declare',                    [AssignListingController::class,'declare'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');  
                        Route::post('/ckpis/assign/reassign',                   [AssignListingController::class,'reassign'],                    function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');  
                    // KPI Owner

                    // Assignee
                        Route::get('/ckpis/assessment/{appId}/{assigneeId}/assessment', [AssessmentListingController::class,'assessment'],              function () {})->middleware('roles:SUPERADMIN|ADMIN|USER'); 
                        Route::get('/ckpis/assessment_history/{appId}/{assigneeId}/assessment_history', [AssessmentListingController::class,'assessment_history'],              function () {})->middleware('roles:SUPERADMIN|ADMIN|USER'); 
                        Route::post('/ckpis/assessment/updateAssignee',                 [AssessmentListingController::class,'updateAssignee'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');   
                        Route::get('/ckpis/assessment/fetchFile',                 [AssessmentListingController::class,'fetchFile'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');   
                        Route::post('/ckpis/assessment/declare',                        [AssessmentListingController::class,'declare'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');   
                        Route::post('/ckpis/assessment/fileUpload',                        [AssessmentListingController::class,'fileUpload'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN|USER'); 
                        Route::get('/ckpis/assessment/download/{fileId}/download',                 [AssessmentListingController::class,'downloadFile'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');     
                    // Assignee

                    // KPI Owner Review
                        Route::get('/ckpis/review/{appId}/{assigneeId}/review',     [ReviewListingController::class,'review'],              function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');  
                        Route::get('/ckpis/review_history/{appId}/{assigneeId}/review_history',     [ReviewListingController::class,'review_history'],              function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');  
                        Route::post('/ckpis/review/declare',                    [ReviewListingController::class,'declare'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');   
                        Route::post('/ckpis/review/rework',                    [ReviewListingController::class,'rework'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN|USER');   
                    // KPI Owner Review

                    // Checker (CKPI Admin)
                        Route::get('/ckpis/checker/{appId}/checker',              [CheckerListingController::class,'checker'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');     
                        Route::get('/ckpis/checker/tl_apps',              [CheckerListingController::class,'tl_apps'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');     
                        Route::get('/ckpis/checker/getTLVALUES',              [CheckerListingController::class,'getTLVALUES'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');     
                        Route::post('/ckpis/checker/updateAssignee',              [CheckerListingController::class,'updateAssignee'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');    
                        Route::post('/ckpis/checker/updateCurrentAssignee',              [CheckerListingController::class,'updateCurrentAssignee'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');   
                        Route::post('/ckpis/checker/sendRework',              [CheckerListingController::class,'sendRework'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');   
                        Route::post('/ckpis/checker/declare',                    [CheckerListingController::class,'declare'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN');    
                    // Checker (CKPI Admin)

                    // Reviewer (CKPI Admin)
                        Route::get('/ckpis/reviewer/{appId}/reviewer',              [ReviewerListingController::class,'reviewer'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');          
                        Route::post('/ckpis/reviewer/declare',                    [ReviewerListingController::class,'declare'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN');    
                        Route::post('/ckpis/reviewer/rework',                    [ReviewerListingController::class,'rework'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN');    
                    // Reviewer (CKPI Admin)

                    // Approver (CKPI Admin)
                        Route::get('/ckpis/approver/{appId}/approver',              [ApproverListingController::class,'approver'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');          
                        Route::post('/ckpis/approver/declare',                    [ApproverListingController::class,'declare'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN');    
                        Route::post('/ckpis/approver/rework',                    [ApproverListingController::class,'rework'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN');    
                    // Approver (CKPI Admin)

                    // History
                        Route::get('/ckpis/history/{appId}/history',              [HistoryListingController::class,'history'],              function () {})->middleware('roles:SUPERADMIN|ADMIN');      
                    // History
                // List

                // Maintenance
                    // Group
                        Route::get('/ckpis/groups',                 [GroupListController::class,'index'],                       function () {})->middleware('roles:SUPERADMIN|ADMIN'); 
                        Route::get('/ckpis/gls/fetch',              [GroupListController::class,'fetch'],                       function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/gls/add',               [GroupListController::class,'add'],                         function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/gls/edit',              [GroupListController::class,'edit'],                        function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/gls/delete',            [GroupListController::class,'delete'],                      function () {})->middleware('roles:SUPERADMIN|ADMIN');
                    // Group

                    // Perspective
                        Route::get('/ckpis/perspectives',           [PerspectiveListController::class,'index'],                 function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/ckpis/pls/fetch',              [PerspectiveListController::class,'fetch'],                 function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/pls/add',               [PerspectiveListController::class,'add'],                   function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/pls/edit',              [PerspectiveListController::class,'edit'],                  function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/pls/delete',            [PerspectiveListController::class,'delete'],                function () {})->middleware('roles:SUPERADMIN|ADMIN');
                    // Perspective

                    // Indicator
                        Route::get('/ckpis/indicators',             [IndicatorListController::class,'index'],                   function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/ckpis/ils/fetch',              [IndicatorListController::class,'fetch'],                   function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/ils/add',               [IndicatorListController::class,'add'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/ils/edit',              [IndicatorListController::class,'edit'],                    function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/ils/delete',            [IndicatorListController::class,'delete'],                  function () {})->middleware('roles:SUPERADMIN|ADMIN');
                    // Indicator

                    // Year
                        Route::get('/ckpis/years',                  [YearController::class,'index'],                            function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/ckpis/years/fetch',            [YearController::class,'fetch'],                            function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/years/add',             [YearController::class,'add'],                              function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/years/edit',            [YearController::class,'edit'],                             function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/years/delete',          [YearController::class,'delete'],                           function () {})->middleware('roles:SUPERADMIN|ADMIN');
                    // Year

                    // Table
                        Route::get('/ckpis/tables',                 [TableController::class,'index'],                           function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/ckpis/fetch_groups',           [TableController::class,'fetch_groups'],                    function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/ckpis/tables/fetch',           [TableController::class,'fetch'],                           function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/tables/add',            [TableController::class,'add'],                             function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/tables/edit',           [TableController::class,'edit'],                            function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/tables/delete',         [TableController::class,'delete'],                          function () {})->middleware('roles:SUPERADMIN|ADMIN');

                        // View
                            Route::get('/ckpis/tables/{appId}/tables',[TableController::class,'table'],                function () {})->middleware('roles:SUPERADMIN|ADMIN');
                            Route::post('/ckpis/tables/updateTables', [TableController::class,'updateTables'],                     function () {})->middleware('roles:SUPERADMIN|ADMIN');  
                        // View
                    // Table

                    // Report
                        Route::get('/ckpis/reports',                [ReportController::class,'ckpi_reports'],                   function () {})->middleware('roles:SUPERADMIN|ADMIN');
                    // Report

                    // Email Reminder
                        Route::get('/ckpis/reminders',                [ReminderController::class,'reminders'],                   function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/ckpis/reminders/fetchStaffs',                [ReminderController::class,'fetchStaffs'],                   function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/reminders/add',           [ReminderController::class,'add'],                   function () {})->middleware('roles:SUPERADMIN|ADMIN');
                    // Email Reminder

                    // User Maintenance
                        Route::get('/ckpis/users',                  [CKPIController::class,'index'],                            function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/ckpis/fetchUsers',             [CKPIController::class,'fetch'],                            function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::get('/ckpis/fetchEditDelete',        [CKPIController::class,'fetchEditDelete'],                  function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/addUser',               [CKPIController::class,'add'],                              function () {})->middleware('roles:SUPERADMIN|ADMIN');
                        Route::post('/ckpis/editUser',              [CKPIController::class,'edit'],                             function () {})->middleware('roles:SUPERADMIN|ADMIN'); 
                    // User Maintenance
                // Maintenance
            // CKPI
        // Maintenance


        // Super Administrator
            // User Maintenance
                Route::get('/superadministrators',                  [SuperAdministratorController::class,'index'],              function () {})->middleware('roles:SUPERADMIN');
                Route::get('/superadministrators/fetch',            [SuperAdministratorController::class,'fetch'],              function () {})->middleware('roles:SUPERADMIN');
                Route::get('/superadministrators/fetchEditDelete',  [SuperAdministratorController::class,'fetchEditDelete'],    function () {})->middleware('roles:SUPERADMIN');
                Route::post('/superadministrators/add',             [SuperAdministratorController::class,'add'],                function () {})->middleware('roles:SUPERADMIN');
                Route::post('/superadministrators/edit',            [SuperAdministratorController::class,'edit'],               function () {})->middleware('roles:SUPERADMIN');
                Route::post('/superadministrators/delete',          [SuperAdministratorController::class,'delete'],             function () {})->middleware('roles:SUPERADMIN');
            // User Maintenance
        // Super Administrator
    });
// Sessions Exists
