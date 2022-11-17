<?php

namespace App\Http\Controllers\Auth;

use App\Models\Users;
use App\Models\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \stdClass;
use App\Http\Controllers\LifeXcessController;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
    */
    protected $redirectTo = RouteServiceProvider::HOME;

    private 
            $_sessionEmail,
            $_sessionName,
            $_sessionThumbnail,
            $_sessionTelephone;

    /**
     * Create a new controller instance.
     *
     * @return void
    */

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function getLogin(Request $request){
        $email = $request->session()->get('email');
        if(!$email)
        {
            return view('login');
        }
        else
        {
            return redirect('home');
        }	
    }  

    public function login(Request $request){ 

        $username    = $request->get('username'); 
        $password    = $request->get('password'); 

        $adServer = "128.247.95.91";

        $ldap = ldap_connect($adServer); 

        $ldaprdn = 'SMEBANK' . "\\" . $username;

        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

        $bind = @ldap_bind($ldap, $ldaprdn, $password);
        
        if(empty($bind) === false){

            $filter="(sAMAccountName=$username)";
            $result = ldap_search($ldap,"dc=smebank,dc=net",$filter);
            @ldap_sort($ldap,$result,"sn");
            $info = ldap_get_entries($ldap, $result);
            for ($i=0; $i<$info["count"]; $i++)
            {
                if($info['count'] > 1)
                    break;
                else
                {	
                    $staff_name         = isset($info[$i]["cn"]) ? $info[$i]["cn"][0] : null;  
                    $useremail          = isset($info[$i]["mail"]) ? $info[$i]["mail"][0] : null;  

                    // $staff_name         = "Ezran";  
                    // $useremail          = "ezran@cedar.my";  
                     
                    $user_thumbnail     = isset($info[$i]["thumbnailphoto"]) ? $info[$i]["thumbnailphoto"][0] : null;  
                    $telephone          = isset($info[$i]["telephonenumber"]) ? $info[$i]["telephonenumber"][0] : null;  

                    $this->_sessionEmail 		= $useremail;
                    $this->_sessionName 	    = $staff_name;
				    $this->_sessionThumbnail 	= $user_thumbnail;
				    $this->_sessionTelephone    = $telephone;

                    $email      = $this->_sessionEmail; 
                    $staff_name = $this->_sessionName; 

                    // Checking users table
                        $users = Users::where('email_address','=', $email )  
                            ->where('active','=', 'Y' )  
                            ->get();
                            //->toArray(); 
                        if(count($users) > 0)
                        {  
                            foreach($users as $user){
                                $user_id            = $user->user_id;
                                $level_access       = $user->level_access;
                                $module_access      = $user->module_access;
                                $approver_access    = $user->approver_access;
                            }

                            // From AD Server
                                $request->session()->put('email',      $this->_sessionEmail);  
                                $request->session()->put('staff_name', $this->_sessionName);  
                                $request->session()->put('telephone',  $this->_sessionTelephone); 

                                $userThumb  = $this->_sessionThumbnail; 
                                $request->session()->put('dp', $userThumb);
                            // From AD Server

                            // Check Enrollment Period
                                $setting_value = "";
                                $settings = Settings::get();
                                   // ->toArray();
                                if(count($settings) > 0){
                                    foreach($settings as $setting){
                                        $setting_value = $setting->setting_value;
                                    }
                                } 
                            // Check Enrollment Period
                             
                            // LifeXcess : Find staff head (yes / no)
                                $hrms_users = LifeXcessController::bemail($email);
                                if(count($hrms_users) > 0){
                                    $request->session()->put('head', 'YES');
                                } else {
                                    $request->session()->put('head', 'NO');
                                }
                            // LifeXcess : Find staff head (yes / no)
                
                            $request->session()->put('level',  $level_access);
                            $request->session()->put('module', $module_access);
                            $request->session()->put('approver', $approver_access);
                            $request->session()->put('enrol',  $setting_value); 
                            $ext_no  = $this->_sessionTelephone; // From AD 

                            Users::where('user_id',$user_id)
                                                    ->update(
                                                                [
                                                                    'last_login'    => Carbon::Now(),
                                                                    'ext_no'        => $ext_no
                                                                ]
                                                            );  
                            
                        } else {  

                            // From AD Server
                                $request->session()->put('email',      $this->_sessionEmail);  
                                $request->session()->put('staff_name', $this->_sessionName);  
                                $request->session()->put('telephone',  $this->_sessionTelephone); 

                                $userThumb  = $this->_sessionThumbnail; 
                                $request->session()->put('dp', $userThumb);
                            // From AD Server

                            // Check Enrollment Period
                                $setting_value = "";
                                $settings = Settings::get();
                                   // ->toArray();
                                if(count($settings) > 0){
                                    foreach($settings as $setting){
                                        $setting_value = $setting->setting_value;
                                    }
                                } 
                            // Check Enrollment Period
                            
                            // LifeXcess : Find staff head (yes / no)
                                $hrms_users = LifeXcessController::bemail($email);
                                if(count($hrms_users) > 0){
                                    $request->session()->put('head', 'YES');
                                } else {
                                    $request->session()->put('head', 'NO');
                                }
                            // LifeXcess : Find staff head (yes / no)

                            $request->session()->put('level',  'USER');
                            $request->session()->put('module', 'NONE');
                            $request->session()->put('approver', 'NONE');
                            $request->session()->put('enrol',  $setting_value);   
                
                        }
            
                        return redirect('/home'); 
                        return true; 
                    // Checking users table
                }
            }

            //@ldap_close($ldap);
             
        } else { 

            return back()->with('msg_failed', 'Kindly check your username & password. It might be locked due to login failed more than 3 times. go to https://adxcess.smebank.com.my to unlock/reset account.');

        }
         
    }

    public function logout(Request $request){
        
        $email_address                  = htmlentities($request->session()->get('email'));
        
       Users::where('email_address',$email_address)
                                ->update(
                                            [
                                                'last_logout'=>  Carbon::Now()
                                            ]
                                        );
                               
        $request->session()->forget('email'); 
        $request->session()->flush();

        $request->session()->regenerate(true); 

        
        return redirect('/login');
    }
}
