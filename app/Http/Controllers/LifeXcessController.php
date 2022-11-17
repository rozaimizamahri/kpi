<?php

namespace App\Http\Controllers;

use App\Models\Lifexcess;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LifeXcessController extends Controller
{
    // View all data from LifeXcess
        public static function all(){

            $hrms_users = Lifexcess::whereNotIn('JOBCODE',['BOD','SHC'])
                    ->orderBy('STAFFNAME','ASC')  
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function all_new(){

            $hrms_users = Lifexcess::orderBy('STAFFNAME','ASC')  
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function allCurrent(){

            $hrms_users = Lifexcess::whereNotIn('JOBCODE',['BOD','SHC'])
                    ->orderBy('STAFFNAME','ASC')  
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function allNew(){

            $l2s = Lifexcess::select('POSTLVL','STAFFNO','STAFFNAME','SEMAIL')
                    ->orWhereIn('POSTLVL',['L1','L2','L3','L4','LSTAFF'])       
                    ->orderBy('STAFFNAME','ASC')
                    ->get();
                    // ->toArray(); 
                return $l2s;

        }

        public static function alltake20(){

            $hrms_users = Lifexcess::whereNotIn('JOBCODE',['BOD','SHC'])
                    ->orderBy('STAFFNAME','ASC')  
                    ->take(20)
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }
    // View all data from LifeXcess

    // Extract data
        public static function semail($semail){
            
            $hrms_users = Lifexcess::where('SEMAIL','=',$semail)    
                    ->get();
                    // ->toArray();
            return $hrms_users;
        }

        public static function staffno($staffno){

            $hrms_users = Lifexcess::where('STAFFNO','=',$staffno)    
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function bemail($bemail){

            $hrms_users = Lifexcess::where('BEMAIL','=',$bemail)    
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function hod($level3){

            $hrms_users = Lifexcess::select('LEVEL3','POSTLVL','SEMAIL')  
                    ->where('LEVEL3','=',$level3)    
                    ->where('POSTLVL','=','L2')  
                    ->groupBy('LEVEL3','POSTLVL','SEMAIL')  
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function level2($email){

            $hrms_users = Lifexcess::select('LEVEL2','LEVEL2NAME','SEMAIL','POSTLVL')  
                    ->where('SEMAIL','=',$email)   
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function level3($email){

            $hrms_users = Lifexcess::select('LEVEL3','LEVEL3NAME','SEMAIL','POSTLVL')  
                    ->where('SEMAIL','=',$email)   
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function level4($email){

            $hrms_users = Lifexcess::select('LEVEL4','LEVEL4NAME','SEMAIL','POSTLVL')  
                    ->where('SEMAIL','=',$email)   
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function postlvl($email){

            $hrms_users = Lifexcess::select('SEMAIL','POSTLVL')  
                    ->where('SEMAIL','=',$email)   
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function allUnderDivision($level2){

            $hrms_users = Lifexcess::select('SEMAIL','LEVEL2','STATUS')   
                    ->where('LEVEL2',$level2)  
                    ->where('STATUS','=','ACTIVE')  
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function allUnderDepartment($level3){

            $hrms_users = Lifexcess::select('SEMAIL','LEVEL3','STATUS')   
                    ->where('LEVEL3',$level3)  
                    ->where('STATUS','=','ACTIVE')  
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function allUnderSection($level4){

            $hrms_users = Lifexcess::select('SEMAIL','LEVEL4','STATUS')   
                    ->where('LEVEL4',$level4)  
                    ->where('STATUS','=','ACTIVE')  
                    ->get();
                    // ->toArray();
            return $hrms_users;

        }

        public static function endorser($semail){

            $hrms_users = Lifexcess::where('SEMAIL','=',$semail)    
                    ->get();
                    // ->toArray();
            if(count($hrms_users) > 0){

                $level2 = "";

                foreach($hrms_users as $hrms_user){
                    $level2 = $hrms_user->LEVEL2;
                }

                $hrms_users2 = Lifexcess::where('LEVEL2','=',$level2)    
                    ->whereIn('POSTLVL',['L2','L3'])    
                    ->get();
                    // ->toArray();

                return $hrms_users2;

            } else {

            } 
            
        }
    // Extract data

    // Display list 
        public static function division(){
            
            $divisions = Lifexcess::select('LEVEL2','LEVEL2NAME')  
                ->groupBy('LEVEL2','LEVEL2NAME')
                ->get();
                // ->toArray(); 
            return $divisions;

        }

        public static function department(){

            $departments =Lifexcess::select('LEVEL3','LEVEL3NAME')  
                ->groupBy('LEVEL3','LEVEL3NAME')
                ->get();
                // ->toArray(); 
            return $departments;

        }

        public static function section(){

            $sections = Lifexcess::select('LEVEL4','LEVEL4NAME')  
                ->groupBy('LEVEL4','LEVEL4NAME')
                ->get();
                // ->toArray(); 
            return $sections;

        }

        public static function unit(){

            $sections = Lifexcess::select('LEVEL5','LEVEL5NAME')  
                ->groupBy('LEVEL5','LEVEL5NAME')
                ->get();
                // ->toArray(); 
            return $sections;

        }

        // Get POSTLVL (L1, L2, L3)
            public static function L1(){

                $l1s = Lifexcess::select('POSTLVL','STAFFNO','STAFFNAME','SEMAIL')
                    ->where('POSTLVL','=','L1')  
                    ->orderBy('STAFFNAME','ASC') 
                    ->get();
                    // ->toArray(); 
                return $l1s;

            }

            public static function L2(){

                $l2s = Lifexcess::select('POSTLVL','STAFFNO','STAFFNAME','SEMAIL')
                    ->whereIn('POSTLVL',['L2','L2','L3'])       
                    ->orderBy('STAFFNAME','ASC')
                    ->get();
                    // ->toArray(); 
                return $l2s; 

            }

            public static function L2_semua(){

                $l2s = Lifexcess::select('POSTLVL','STAFFNO','STAFFNAME','SEMAIL')
                    ->whereIn('POSTLVL',['L2','L2','L3','L4','LSTAFF'])       
                    ->orderBy('STAFFNAME','ASC')
                    ->get();
                    // ->toArray(); 
                return $l2s; 

            }

            public static function L2_all(){

                $l2as = Lifexcess::select('POSTLVL','STAFFNO','STAFFNAME','SEMAIL')
                    ->whereIn('POSTLVL',['L2','L2','L3','L4'])       
                    ->orderBy('STAFFNAME','ASC')
                    ->get();
                    // ->toArray(); 
                return $l2as; 

            }

            public static function L3(){

                $l3s = Lifexcess::select('POSTLVL','STAFFNO','STAFFNAME','SEMAIL')
                    ->where('POSTLVL','=','L3')  
                    ->orderBy('STAFFNAME','ASC')  
                    ->get();
                    // ->toArray(); 
                return $l3s;

            }
        // Get POSTLVL (L1, L2, L3)
    // Display list 
}
