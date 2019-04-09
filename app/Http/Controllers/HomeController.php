<?php

namespace App\Http\Controllers;

use App\Users;
use App\Directory;
use App\Business;
use App\Category;
use App\Contact;
use App\Event;
use App\BusinessCategory;
use App\Hour;
use App\BusinessHour;
use App\BusinessBookmark;
use App\Setting;
use App\Advertise;
use App\BusinessImages;
use App\BusinessRate;

use DB;
use Session;
use Response;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Goutte;



class HomeController extends BaseController
{
    /**
     * Function for getting list customer page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $directories = Directory::where('level', 1)->get();        
        $ads = Advertise::all();
        return view('user.home')
        ->with('directories',$directories)
        ->with('images',$ads)
        ->with('meta_description','bluesprucedirectory');
        
    }

    public function home()
    {
        $directories = Directory::where('level', 1)->get();        
        $ads = Advertise::all();

        return view('user.home')
        ->with('directories',$directories)
        ->with('images',$ads)
        ->with('meta_description','bluesprucedirectory');
        
    }

    public function businessDirectory(Directory $directory)
    {
        $id = $directory->id;
        if($id != 0){                        
            session(['directory_id' => $id]);           
        }else{
            $id = Session::get('directory_id');
        }

        $sql = "SELECT business_categories.category_id FROM `business_categories` RIGHT JOIN (SELECT b.id as bid FROM business as b LEFT JOIN directory as d  ON b.business_id = d.id WHERE d.id = '".$id."' ) as n on business_categories.business_id = n.bid";
        $dir = DB::select($sql);
        $resultArray = json_decode(json_encode($dir), true);  
        $categories = DB::table('category')->whereIn('id', $resultArray)->orderBy('name')->get();
        //$categories = DB::table('category')->whereIn('id', $resultArray)->get();

        if(count($resultArray) > 0){
            
            $categoryId = $resultArray[0]['category_id'];
            $sql = "SELECT business_categories.business_id FROM business_categories LEFT JOIN directory ON business_categories.business_id = directory.id WHERE business_categories.category_id = '".$resultArray[0]['category_id']."'";        
            $data = DB::select($sql);
            $resultArray = json_decode(json_encode($data), true);
            $business = DB::table('business')->where('business_id', $id)->whereIn('id', $resultArray)->get();

            foreach($business as $bus){
                // initialize the category object with real name
                $lists = explode (':', $bus->category_id);
                $cat = Category::whereIn('id', $lists)->get();
                $bus->category_id = $cat;

                // initialize the hour object
                $hourIds = explode(':', $bus->hour_id);
                $hour = Hour::whereIn('id', $hourIds)->get();
                $bus->hour_id= $hour;
            }
        }else{
            $business = [];
            $categoryId = 0;
        }        

        return view('user.business-directory', compact('directory'))            
            ->with('categoryId', $categoryId)
            ->with('categories', $categories)
            ->with('business', $business)
            ->with('meta_description','bluesprucedirectory');
    }



    public function businessCatLists($categoryId){
        $directoryId = Session::get('directory_id');
        //return $directoryId;        

        $sql = "SELECT business_categories.category_id FROM `business_categories` RIGHT JOIN (SELECT b.id as bid FROM business as b LEFT JOIN directory as d  ON b.business_id = d.id WHERE d.id = '".$directoryId."' ) as n on business_categories.business_id = n.bid";

        $dir = DB::select($sql);
        $resultArray = json_decode(json_encode($dir), true);  
        //$categories = DB::table('category')->whereIn('id', $resultArray)->get();
        $categories = DB::table('category')->whereIn('id', $resultArray)->orderBy('name')->get();

        $sql = "SELECT business_categories.business_id FROM business_categories LEFT JOIN directory ON business_categories.business_id = directory.id WHERE business_categories.category_id = '".$categoryId."'";        
        $data = DB::select($sql);
        $resultArray = json_decode(json_encode($data), true);
        $business = DB::table('business')->where('business_id', $directoryId)->whereIn('id', $resultArray)->get();
                
        foreach($business as $bus){
            // initialize the category object with real name
            $lists = explode (':', $bus->category_id);
            $cat = Category::whereIn('id', $lists)->get();
            $bus->category_id = $cat;

            // initialize the hour object
            $hourIds = explode(':', $bus->hour_id);
            $hour = Hour::whereIn('id', $hourIds)->get();
            $bus->hour_id= $hour;
        }
        
        
        return view('user.business-directory')            
            ->with('categoryId', $categoryId)
            ->with('categories', $categories)
            ->with('business', $business);
    }


    public function businessCatNameLists($name1, $name2 = 'xYv'){

        $directoryId = Session::get('directory_id');
       //return $directoryId;        
        $sql = "SELECT business_categories.category_id FROM business_categories LEFT JOIN directory ON business_categories.business_id = directory.id WHERE directory.id = '".$directoryId."' group by category_id";
        $dir = DB::select($sql);
        $resultArray = json_decode(json_encode($dir), true);  
        //$categories = DB::table('category')->whereIn('id', $resultArray)->get();
        $categories = DB::table('category')->whereIn('id', $resultArray)->orderBy('name')->get();

        $category1 = Category::where('name', 'like', '%'.$name1.'%')->get();
        $category2 = Category::where('name', 'like', '%'.$name2.'%')->get();

        $where = "WHERE 1 ";
        if($category1->first()){
            $where = $where."and business_categories.category_id = '".$category1->first()->id."'";
        }
        if($category2->first()){
            $where = $where." or business_categories.category_id = '".$category2->first()->id."'";
        }
        if($where == "WHERE 1 "){
            $where = "WHERE 0";
        }
        $sql = "SELECT business_categories.business_id FROM business_categories LEFT JOIN directory ON business_categories.business_id = directory.id  ".$where."";
        $data = DB::select($sql);
        $resultArray = json_decode(json_encode($data), true);
        $business = DB::table('business')->whereIn('id', $resultArray)->get();                    
        foreach($business as $bus){
            $lists = explode (':', $bus->category_id);
            $cat = Category::whereIn('id', $lists)->get();
            $bus->category_id = $cat;

             // initialize the hour object
             $hourIds = explode(':', $bus->hour_id);
             $hour = Hour::whereIn('id', $hourIds)->get();
             $bus->hour_id= $hour;
        }



        if($category1->first()){
            return view('user.business-directory')            
            ->with('categoryId', $category1->first()->id)
            ->with('categories', $categories)
            ->with('business', $business);
        }else{
            return view('user.business-directory')            
            ->with('categoryId', 0)
            ->with('categories', $categories)
            ->with('business', $business);
        }
        
    }

    

    public function searchBusiness(Request $request){
        
        $keyword = $request->input('keyword');               
        $business = Business::where('title', 'like','%'.$keyword.'%')->get();
        foreach($business as $bus){
            $lists = explode (':', $bus->category_id);
            $cat = Category::whereIn('id', $lists)->get();
            $bus->category_id = $cat;
        }
        return view('user.business-list')->with('business', $business);
    }

    public function sendMsg(Request $request){
        $name = $request->input('name');  
        $email = $request->input('email');  
        $msg = $request->input('msg');  
        
        $contact = new Contact();
        $contact->name = $name;
        $contact->email = $email;
        $contact->msg = $msg;
        $contact->save();
        return view('user.contact')->with('success', 1);
    }

    public function businessDirectoryOverview(Business $business)
    {
        $bid = $business->id;
        
        
        $business = Business::where('id', $bid)->get(); 
        $bus = $business->first();

        if($business->first()){                
            // get all categories .  initialize categories
            $lists = explode (':', $bus->category_id);
            $cat = Category::whereIn('id', $lists)->get();
            $bus->category_id = $cat;
            
            // initizlize hours
            $hourIds = explode(':', $bus->hour_id);
            $hour = Hour::whereIn('id', $hourIds)->get();
            $bus->hour_id= $hour;

            // get business id fro categoy lists.
            $businessData = BusinessCategory::whereIn('category_id', $lists)->get();
            $businessIds = [];        
            foreach($businessData as $c){
                $businessIds[] = $c->business_id;             
            }

            $user_id = Session::get('user_id');
            if($user_id != null && $user_id != ""){
                $bookark = BusinessBookmark::where('business_id', $bid)->where('user_id', $user_id)->get();
                if($bookark->first()){
                    $bus->bookmark = "1";
                }else{
                    $bus->bookmark = "0";
                }
            }

            //echo count($businessIds[0]);
            $trending = Business::whereIn('id', $businessIds)->get();
            $business_images = BusinessImages::where('id', $bid)->get();


            return view('user.business-directory-overview')
                ->with('business', $bus)
                ->with('business_images', $business_images)                
                ->with('trending', $trending);                
        }        
    }


    public function loadEvent(Request $request){        
        //$id = $request->input('id');
        //DB::delete('delete from events where id = ?',[$id]);        
        $events = Event::all();
        $a = array('results'=>200, 'events'=>$events);
        return Response::json($a);
    }


    public function contactUs()
    {
        $setting = Setting::where('id', 1)->get()->first();
        return view('user.contact')
        ->with('success',0)
        ->with('setting', $setting)
        ;
    }

    public function event()
    {
        return view('user.event.event');
    }

    public function addEvent(Request $request){
        if($request->has('name')){   

            $book_id = Session::get('directory_id');
            $name = $request->input('name');
            $desc = $request->input('desc');
            $event_date = $request->input('event_date');
            $venue_details = $request->input('venue_details');
            $website = $request->input('website');
            $ticket_cost = $request->input('ticket_cost');
            
            // get image 
            $file = $request->file('image');               
            $fileName =  $file->getClientOriginalName();            
            $extension = $file->getClientOriginalExtension();
            $realPath = $file->getRealPath();        
            $fileSize = $file->getSize();
            $fileMimeType = $file->getMimeType();                        
            $destinationPath = 'uploads/book';
            $file->move($destinationPath,$file->getClientOriginalName());
                        
            $check = Event::where('name', $name)->get();
            if(!$check->first()){      
                $user = new Event();
                //On left field name in DB and on right field name in Form/view
                $user->name = $name;
                $user->desc = $desc;
                $user->event_date = $event_date;
                $user->venue_details = $venue_details;
                $user->website = $website;
                $user->ticket_cost = $ticket_cost;
                $user->image = 'uploads/book/'.$fileName;
                $user->book_id = $book_id;
                $user->save();              
            }

            $users = Event::all();
            $books = Directory::all();
            return view('user.event.event')->with('users', $users);
        }else{
            $books = Directory::all();
            return view('user.event.addEvent')->with('books', $books);
        }        
    }
    
    
    public function aboutUs()
    {
        $ads = Advertise::all();        
        return view('user.about')
        ->with('images',$ads)
        ->with('meta_description','bluesprucedirectory');
    }
   
    public function logout(Request $request ){
        session(['user_id' => null]);
        //$request->session()->flush();
        //$request->session()->regenerate();        
        return redirect()->back();
    }

    public function register($bid = 0 , Request $request)
    { 
        if($request->has('name')){
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');            
            $role = 3;
            $businessId = $request->input('businessId'); 

            $check = Users::where('email', $email)->get();
            if(!$check->first()){      
                $user = new Users();
                //On left field name in DB and on right field name in Form/view
                $user->name = $name;
                $user->email = $email;
                $user->password = $password;
                $user->role = $role;
                $user->save();  
                                
                session(['user_id' => $user->id]);
                session(['name'=>$user->name]);
                session(['role'=>$user->role]);
                return $this->businessDirectoryOverview($businessId);

            }else{
                return view('user.register')->with('businessId', $businessId);
            }                       
        }else{
            return view('user.register')->with('businessId', $bid);
        }
        
    }

    public function loginCheck(Request $request)
    {
        
        $email = $request->input('email');
        $password = $request->input('password');
        $role = "";
        $check = Users::where('email', $email)->where('password', $password)->get();
        if($check->first()){
            session(['user_id' => $check->first()->id]);
            session(['name'=>$check->first()->name]);
            session(['role'=>$check->first()->role]);
            
            $role = $check->first()->role;
            //return view('admin.usermanagement.users')->with('user', $check->first());            
            $users = Users::all();
            if($role == "1"){
                return view('admin.usermanagement.users')->with('users', $users);
            }else{                
                return redirect()->back();
            }            
        }                
        if($role == "1"){
            return view('admin.login');        
        }else{
            return redirect()->back();
        }        
    }



    public function getBusinessByCat(Request $request){        

        $categoryId = $request->input('id');            
        $directoryId = Session::get('directory_id');
        //return $directoryId;        

        // $sql = "SELECT business_categories.category_id FROM `business_categories` RIGHT JOIN (SELECT b.id as bid FROM business as b LEFT JOIN directory as d  ON b.business_id = d.id WHERE d.id = '".$directoryId."' ) as n on business_categories.business_id = n.bid";
        // $dir = DB::select($sql);
        // $resultArray = json_decode(json_encode($dir), true);  
        // $categories = DB::table('category')->whereIn('id', $resultArray)->get();



        $sql = "SELECT business_categories.business_id FROM business_categories LEFT JOIN directory ON business_categories.business_id = directory.id WHERE business_categories.category_id = '".$categoryId."'";        
        $data = DB::select($sql);
        $resultArray = json_decode(json_encode($data), true);
        $business = DB::table('business')->where('business_id', $directoryId)->whereIn('id', $resultArray)->get();
                
        foreach($business as $bus){
            // initialize the category object with real name
            $lists = explode (':', $bus->category_id);
            $cat = Category::whereIn('id', $lists)->get();
            $bus->category_id = $cat;

            // initialize the hour object
            $hourIds = explode(':', $bus->hour_id);
            $hour = Hour::whereIn('id', $hourIds)->get();
            $bus->hour_id= $hour;

        }        
        // return view('user.business-directory')            
        //     ->with('categoryId', $categoryId)
        //     ->with('categories', $categories)
        //     ->with('business', $business);

        $a = array('results'=>200, 'business'=>$business);
        return Response::json($a);
    }


    public function bookmark(Request $request){

        $userId = $request->input('userId');      
        $bid = $request->input('bid');
        $bookmark = $request->input('bookmark');

        if($bookmark == 0){
            $bookmark = new BusinessBookmark();
            $bookmark->business_id = $bid;
            $bookmark->user_id = $userId;        
            $bookmark->save();
            $a = array('results'=>200);
            return Response::json($a);

        }else{

            DB::table('business_bookmarks')
            ->where('user_id', $userId)
            ->where('business_id', $bid)->delete();
            $a = array('results'=>300);
            return Response::json($a);
            
        }                       
    }

    public function rate(Request $request){

        $bid = $request->input('bid');
        $rate_name = $request->input('rate_name');
        $rate_email = $request->input('rate_email');
        $rate_comment = $request->input('rate_comment');
        $star = $request->input('star');

        $rate = new BusinessRate();
        $rate->business_id = $bid;
        $rate->name = $rate_name;
        $rate->email = $rate_email;
        $rate->comment = $rate_comment;            
        $rate->rate = $star;
        $rate->save();

        return redirect()->back();
    }

    public function registration()
    {
        return view('user.registration');
    }


    public function scrap(){
        $crawler = Goutte::request('GET', 'https://twitter.com/');
        $result = "";
        $crawler->filter('.stream-item-header .account-group')->each(function ($node) {
          //dump($node->text());
          dump(1);
          //$result = $node->text();
        });

        $a = array('results'=>$result);
            return Response::json($a);

    }

}



