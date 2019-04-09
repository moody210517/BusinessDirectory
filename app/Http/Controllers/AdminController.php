<?php

namespace App\Http\Controllers;

use App\Users;
use App\Directory;
use App\Business;
use App\Category;
use App\Contact;
use App\Event;
use App\BusinessCategory;
use App\BusinessImages;
use App\BusinessRate;
use App\Advertise;

use Session;
use App\Hour;
use App\BusinessHour;
use App\Setting;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\CommonHelper;
use App\Models\CommonWorker;
use App\Models\AdminWorker;
use Response;
use DB;
use Illuminate\Routing\UrlGenerator;


class AdminController extends BaseController
{    
    /**
     * Function for getting admin dashboard page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    protected $url;
    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    public function getWeekofday($index){

        switch($index){
            case 1:            
            return "Monday";
            case 2:
            return "Tuesday";
            case 3:
            return "Wendesday";
            case 4:
            return "Thursday";
            case 5:
            return "Friday";
            case 6:
            return "Saturday";
            case 7:
            return "Sunday";
        }        
    }

    public function test(){
        $myurl =  $this->url->to('/')."uploads/book/Eventi Concept PDF_v2.pdf";
        echo json_encode($myurl);
        $image = new Imagick($myurl);
        $image->setResolution( 300, 300 );
        $image->setImageFormat( "png" );
        $image->writeImage('newfilename.png');
    }

    public function dashboard()
    {
        return view('admin.usermanagement.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }
    public function register(){        
        return view('admin.register');
    }
    
    
    // ---------------------------------------------- user management ------------------------------------
    public function users(){        
        $users = Users::all();
        return view('admin.usermanagement.users')->with('users', $users);
    }

    
    public function deleteUser(Request $request){        
        $id = $request->input('id');
        DB::delete('delete from users where id = ?',[$id]);        
        $a = array('results'=>200);
        return Response::json($a);
    }

    public function editUser($userId = '', Request $request){
        $id = $request->input('id');
        if($request->has('name')){           
            $name = $request->input('name');
            $password = $request->input('password');
            $email = $request->input('email');    
            $role = $request->input('role');
             DB::table('users')
            ->where('id', $id)
            ->update(['name' => $name, 'password'=>$password, 'email'=>$email, 'role'=>$role ]);            
            $user = Users::where('id', $id)->get();
            return view('admin.usermanagement.editUser')->with('user', $user->first());         
        }else{            
            $user = Users::where('id', $userId)->get();
            return view('admin.usermanagement.editUser')->with('user', $user->first());
        }      
    }
    
    public function addUser(Request $request){

        if($request->has('name')){   
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $confirmPassword = $request->input('confirmPassword');
            $role = $request->input('role');
            
            $check = Users::where('email', $email)->get();
            if(!$check->first()){      
                $user = new Users();
                //On left field name in DB and on right field name in Form/view
                $user->name = $name;
                $user->email = $email;
                $user->password = $password;
                $user->role = $role;
                $user->save();              
            }

            $users = Users::all();
            return view('admin.usermanagement.users')->with('users', $users);
        }else{
            return view('admin.usermanagement.addUser');
        }        
    }


    // ---------------------------------------------- category management ------------------------------------
    public function categoryLists(){        
        $users = DB::table('category')->orderBy('name')->get();
        return view('admin.category.categoryLists')->with('users', $users);
    }

    public function deleteCategory(Request $request){        
        $id = $request->input('id');
        DB::delete('delete from category where id = ?',[$id]);        
        $a = array('results'=>200);
        return Response::json($a);
    }

    public function editCategory($userId = '', Request $request){
        $id = $request->input('id');
        if($request->has('name')){   

            $name = $request->input('name');
            $desc = $request->input('desc');        

             DB::table('category')
            ->where('id', $id)
            ->update(['name' => $name, 'desc'=>$desc]);            
            
            $user = Category::where('id', $id)->get();
            return view('admin.category.editCategory')->with('user', $user->first());         
        }else{            
            $user = Category::where('id', $userId)->get();
            return view('admin.category.editCategory')->with('user', $user->first());
        }      
    }
        
    public function addCategory(Request $request){

        if($request->has('name')){   
            $name = $request->input('name');
            $desc = $request->input('desc');
                        
            $check = Category::where('name', $name)->get();
            if(!$check->first()){      
                $user = new Category();
                //On left field name in DB and on right field name in Form/view
                $user->name = $name;
                $user->desc = $desc;                
                $user->save();              
            }
            //$users = Category::all();
            $users = DB::table('category')->orderBy('name')->get();
            return view('admin.category.categoryLists')->with('users', $users);
        }else{
            return view('admin.category.addCategory');
        }        
    }

    // ---------------------------------------------- business management ------------------------------------
    public function directoryLists($pid){
                
        if($pid == 0){
            $directories = Directory::where('pid', $pid)->get();
            $parent = Directory::where('id', $pid)->get();       
            return view('admin.business.directoryLists')
                    ->with('directories', $directories)
                    ->with('parent', $parent->first());  
        }else{
            $directories = Business::where('business_id', $pid)->get();
            $parent = Directory::where('id', $pid)->get();       
            return view('admin.business.businessLists')
                    ->with('directories', $directories)
                    ->with('parent', $parent->first());  
        }                     
    }
    public function businessLists($pid){
        $directories = Business::where('business_id', $pid)->get();
            $parent = Directory::where('id', $pid)->get();       
            return view('admin.business.businessLists')
                    ->with('directories', $directories)
                    ->with('parent', $parent->first());  
    }

    public function deleteDirectory(Request $request){        
        $id = $request->input('id');
        DB::delete('delete from directory where id = ?',[$id]);        
        $a = array('results'=>200);
        return Response::json($a);
    }
    public function deleteBusiness(Request $request){        
        $id = $request->input('id');
        DB::delete('delete from business where id = ?',[$id]);        
        $a = array('results'=>200);
        return Response::json($a);
    }

    public function editDirectory($dirId = '', Request $request){
        
        $id = $request->input('id');
        if($request->has('title')){
            // get image 
            $file = $request->file('img');  
            $title = $request->input('title');
            $desc = $request->input('desc');    

            if($file){
                $fileName =  $file->getClientOriginalName();            
                $extension = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();        
                $fileSize = $file->getSize();
                $fileMimeType = $file->getMimeType();                        
                $destinationPath = 'uploads/book';
                $file->move($destinationPath,$file->getClientOriginalName());                               
                DB::table('directory')
                ->where('id', $id)
                ->update(['title' => $title, 'desc'=>$desc, 'pid'=> 0 , 'img'=>'uploads/book/'.$fileName]);
            }else{
                DB::table('directory')
                ->where('id', $id)
                ->update(['title' => $title, 'desc'=>$desc, 'pid'=> 0 ]);
            }
            
            
            $user = Directory::where('id', $id)->get();
            return view('admin.business.editDirectory')->with('directory', $user->first());         
        }else{            
            $user = Directory::where('id', $dirId)->get();        
            return view('admin.business.editDirectory')
                    ->with('directory', $user->first());    
        }      
    }

    public function editBusiness($dirId = '', Request $request){
        
        $id = $request->input('id');
        if($request->has('title')){ 

            // get multiple images
            $files = $request->file('img');
            $images = [];
            if($request->hasFile('img'))
            {
                foreach ($files as $file) {
                    //$file->store('users/' . $this->user->id . '/messages');
                    $fileName =  $file->getClientOriginalName();            
                    $extension = $file->getClientOriginalExtension();
                    $realPath = $file->getRealPath();        
                    $fileSize = $file->getSize();
                    $fileMimeType = $file->getMimeType();                        
                    $destinationPath = 'uploads/business';
                    $file->move($destinationPath,$file->getClientOriginalName());
                    $img = 'uploads/business/'.$fileName;//->input('img');
                    $images[] = $img;
                }
            }
                                 
            // ad image
            $file2 = $request->file('ad_img');     
            if($file2){
                $fileName2 =  $file2->getClientOriginalName();   
                $destinationPath = 'uploads/business';   
                $file2->move($destinationPath,$file2->getClientOriginalName());
                $ad_img = 'uploads/business/'.$fileName2;//->input('img');
            }            

            $title = $request->input('title');
            $desc = $request->input('desc');    
            $address = $request->input('address');            
            $phone = $request->input('phone');
            $email = $request->input('email');  
            $fax = $request->input('fax');
            $url = $request->input('url');
            $video = $request->input('video');
            $lat = $request->input('lat');
            $lng = $request->input('lng');
            $time = $request->input('time');
            $facebook = $request->input('facebook');
            $twitter = $request->input('twitter');
            $instagram = $request->input('instagram');

            $category_id = "";
            foreach ($request->input('category_id') as $cId)
                 $category_id = $category_id.":".$cId;
            $hour_id = "";
            foreach($request->input('hour_id') as $hId){
                $hour_id= $hour_id.":".$hId;
            }

            if(count($images) > 0){
                DB::table('business')
                ->where('id', $id)
                ->update(['facebook' => $facebook,'twitter' => $twitter,'instagram' => $instagram,'time' => $time,'lat' => $lat,'lng' => $lng,'url' => $url,'video' => $video,'title' => $title, 'description'=>$desc, 'address'=> $address, 'img'=>$img, 'phone' => $phone,'email'=>$email, 'fax'=>$fax, 'category_id'=>$category_id, 'hour_id'=>$hour_id]);
            }else{
                DB::table('business')
                ->where('id', $id)
                ->update(['facebook' => $facebook,'twitter' => $twitter,'instagram' => $instagram,'time' => $time,'lat' => $lat,'lng' => $lng,'url' => $url,'video' => $video,'title' => $title, 'description'=>$desc, 'address'=> $address,  'phone' => $phone,'email'=>$email, 'fax'=>$fax, 'category_id'=>$category_id, 'hour_id'=>$hour_id]);
            }

            if($file2){
                DB::table('business')
                ->where('id', $id)
                ->update([ 'ad_img'=>$ad_img]);
            }            

            if(count($images) > 0){
                DB::delete('delete from business_images where business_id = ?',[$id]);    
                foreach($images  as $img){
                    $bImage = new BusinessImages();
                    $bImage->business_id = $id;
                    $bImage->image = $img;
                    $bImage->save();
                }        
            }

            // initialize business category table and add new values
            DB::delete('delete from business_categories where business_id = ?',[$id]);            
            foreach ($request->input('category_id') as $cId){
                $data = new BusinessCategory();
                $data->business_id = $id;
                $data->category_id = $cId;
                $data->save();
            }
            DB::delete('delete from business_hours where business_id = ?',[$id]);            
            foreach ($request->input('hour_id') as $cId){
                $data = new BusinessHour();
                $data->business_id = $id;
                $data->hour_id = $cId;
                $data->save();
            }


            $user = Business::where('id', $id)->get();
            $categories = Category::all();
            $myCats = BusinessCategory::where('business_id', $id)->get();

            $hours = Hour::all();
            $myHour = BusinessHour::where('business_id', $id)->get();

            foreach($hours as $hour){
                $hour->week_of_day = $this->getWeekofday($hour->week_of_day);
            }
            foreach($myHour as $hour){
                $hour->week_of_day = $this->getWeekofday($hour->week_of_day);
            }
            
            return view('admin.business.editBusiness')
                    ->with('hours' , $hours)
                    ->with('myHour' , $myHour)
                    ->with('categories' , $categories)
                    ->with('myCats' , $myCats)
                    ->with('directory', $user->first());

        }else{            
            $user = Business::where('id', $dirId)->get();        
            $categories = DB::table('category')->orderBy('name')->get();
            $myCats = BusinessCategory::where('business_id', $dirId)->get();    

            $hours = Hour::all();
            $myHour = BusinessHour::where('business_id', $dirId)->get();

            foreach($hours as $hour){
                $hour->week_of_day = $this->getWeekofday($hour->week_of_day);
            }
            foreach($myHour as $hour){
                $hour->week_of_day = $this->getWeekofday($hour->week_of_day);
            }

            return view('admin.business.editBusiness')
                    ->with('hours' , $hours)
                    ->with('myHour' , $myHour)
                    ->with('categories' , $categories)
                    ->with('myCats' , $myCats)
                    ->with('directory', $user->first());    
        }      
    }

  
    
    public function addDirectory($pid, Request $request){

        if($request->has('title')){                           
            $dir = DB::select('SELECT *  FROM `directory` order by id desc LIMIT 1');
            $id = 1;
            if(count($dir) > 0){
                $id = $dir[0]->id + 1;
            }

            // get image 
            $file = $request->file('img');               
            $fileName =  $file->getClientOriginalName();            
            $extension = $file->getClientOriginalExtension();
            $realPath = $file->getRealPath();            
            $fileSize = $file->getSize();
            $fileMimeType = $file->getMimeType();                        
            $destinationPath = 'uploads/book';
            $file->move($destinationPath,$file->getClientOriginalName());

            if (strpos($fileName, 'pdf') !== false) {
                $myurl = base_url()."uploads/book/".$fileName;
                $image = new Imagick($myurl);
                $image->setResolution( 300, 300 );
                $image->setImageFormat( "png" );
                $image->writeImage('newfilename.png');
            }          
            
            $title = $request->input('title');
            $desc = $request->input('desc');
            $image = $request->input('image');
            $level = $request->input('level');
            $pid = $request->input('pid');            
            $img = $request->input('img');            
            $dirData = Directory::where('id', $pid)->get();
            $dirkey = "";  
                      
            if($dirData->first()){
               $dirkey =  $dirData->first()->dirkey;
               $level = $dirData->first()->level + 1;
            }

            $check = Directory::where('title', $title)->get();
            if(!$check->first()){
                $directory = new Directory();
                //On left field name in DB and on right field name in Form/view
                $directory->id = $id;
                $directory->title = $title;
                $directory->desc = $desc;
                $directory->level = $level;
                $directory->pid = $pid;
                $directory->dirkey = $dirkey.substr( "00000".$id, -6);
                $directory->img = 'uploads/book/'.$fileName;
                $directory->save();              
            }

            $directories = Directory::where('level', $level)->get();

            $parent = Directory::where('id', $pid)->get();  
            return view('admin.business.directoryLists')
                ->with('directories', $directories)
                ->with('parent', $parent->first());
               
        }else{

            $directories = Directory::where('pid', $pid)->get();            
            $parent = Directory::where('id', $pid)->get();  
            return view('admin.business.addDirectory')
                    ->with('pid',$pid)
                    ->with('parent' , $parent->first());

        }        
    }


    public function initSlug(){
                
        $business = Business::all();
        foreach($business as $bus){

            $id = $bus->id;
            $title = $bus->title;
            $slug = str_slug($title, '-');
            DB::table('business')
                ->where('id', $id)
                ->update(['slug'=>$slug]);
        }

    }

    public function addBusiness($pid, Request $request){

        if($request->has('title')){                           
           
            $title = $request->input('title');
            $desc = $request->input('desc');            
            $phone = $request->input('phone');
            $email = $request->input('email');  
            $fax = $request->input('fax');
            $url = $request->input('url');
            $pid = $request->input('pid');        
            $video = $request->input('video');   
            $lat = $request->input('lat');   
            $lng = $request->input('lng');
            $facebook = $request->input('facebook');
            $twitter = $request->input('twitter');
            $instagram = $request->input('instagram');
            $time = $request->input('time');

            $slug = str_slug($title, '-');



            // file part
            $files = $request->file('img');
            $images = [];
            $fileName  = "";
            if($request->hasFile('img'))
            {
                foreach ($files as $file) {
                    //$file->store('users/' . $this->user->id . '/messages');
                    $fileName =  $file->getClientOriginalName();            
                    $extension = $file->getClientOriginalExtension();
                    $realPath = $file->getRealPath();        
                    $fileSize = $file->getSize();
                    $fileMimeType = $file->getMimeType();                        
                    $destinationPath = 'uploads/business';
                    $file->move($destinationPath,$file->getClientOriginalName());
                    $img = 'uploads/business/'.$fileName;//->input('img');
                    $images[] = $img;
                }
            }
                
            $file2 = $request->file('ad_img');            
            $fileName2 = $file2->getClientOriginalName();                                                            
            $destinationPath = 'uploads/business';            
            $file2->move($destinationPath,$file2->getClientOriginalName());

            $category_id = "";
            foreach($request->input('category_id') as $cId){                
                $category_id = $category_id.":".$cId;                
            }
            $hour_id = "";
            foreach($request->input('hour_id') as $hId){
                $hour_id= $hour_id.":".$hId;
            }

            $check = Business::where('title', $title)->get();
            if(!$check->first()){
                $business = new Business();
                //On left field name in DB and on right field name in Form/view                
                $business->title = $title;
                $business->description = $desc;
                $business->img = 'uploads/business/'.$fileName;  
                $business->ad_img = 'uploads/business/'.$fileName2;  
                $business->address = $request->input('address');  
                $business->phone = $phone;  
                $business->email = $email;  
                $business->fax = $fax;  
                $business->url = $url;
                $business->business_id = $pid;
                $business->category_id = $category_id;
                $business->hour_id = $hour_id;
                $business->video  = $video;
                $business->lat  = $lat;
                $business->lng  = $lng;
                $business->facebook  = $facebook;
                $business->twitter  = $twitter;
                $business->instagram  = $instagram;
                $business->time  = $time;
                $business->slug  = $slug;
                $business->save();     
                
                // input business images                
                foreach ($images as $img){
                    $data = new BusinessImages();
                    $data->business_id =  $business->id;
                    $data->image = $img;
                    $data->save();
                }


                // input business category infos.
                foreach ($request->input('category_id') as $cId){
                    $data = new BusinessCategory();
                    $data->business_id =  $business->id;
                    $data->category_id = $cId;
                    $data->save();
                }

                // input hours of business
                foreach ($request->input('hour_id') as $hId){
                    $data = new BusinessHour();
                    $data->business_id =  $business->id;
                    $data->hour_id = $hId;
                    $data->save();
                }

            }

            
            $directories = Business::where('business_id', $pid)->get();
            $parent = Directory::where('id', $pid)->get();
            return view('admin.business.businessLists')
                ->with('directories', $directories)
                ->with('parent', $parent->first());
               
        }else{

            $directories = Business::where('business_id', $pid)->get();            
            $parent = Directory::where('id', $pid)->get();  
            //$categories =  Category::all();
            $categories = DB::table('category')->orderBy('name')->get();
            $hours = Hour::all();

            foreach($hours as $hour){
                $hour->week_of_day = $this->getWeekofday($hour->week_of_day);
            }
            

            return view('admin.business.addBusiness')                    
                    ->with('parent' , $parent->first())
                    ->with('hours' , $hours)
                    ->with('categories', $categories);

        }        
    }


    // --------------------------------------------  login part -----------------------------------------------
    public function loginCheck(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $check = Users::where('email', $email)->where('password', $password)->get();
        if($check->first()){
            session(['user_id' => $check->first()->id]);
            session(['name'=>$check->first()->name]);
            //return view('admin.usermanagement.users')->with('user', $check->first());            
            $users = Users::all();
            return view('admin.usermanagement.users')->with('users', $users);
        }     
        return view('admin.login');        
    }
    public function logout(Request $request ){
        //$request->session()->flush();
        $request->session()->regenerate();        
        return view('admin.login');
    }


    // --------------------------------------  contact managent ---------------------------
    
    public function contactLists(){        
        $users = Contact::all();
        return view('admin.contact.contactLists')->with('contacts', $users);
    }
    
    public function rateLists(){   
        $users = BusinessRate::all();
        return view('admin.contact.rateLists')->with('rates', $users);
    }



    
    // ---------------------------------------------- category management ------------------------------------
    public function eventLists(){        
        $users = Event::all();
        return view('admin.event.eventLists')->with('users', $users);
    }

    public function deleteEvent(Request $request){        
        $id = $request->input('id');
        DB::delete('delete from events where id = ?',[$id]);        
        $a = array('results'=>200);
        return Response::json($a);
    }


    public function editEvent($userId = '', Request $request){

        $id = $request->input('id');
        
        if($request->has('name')){
            $name = $request->input('name');
            $desc = $request->input('desc');     
            $event_date = $request->input('event_date');
            $venue_details = $request->input('venue_details');
            $website = $request->input('website');
            $ticket_cost = $request->input('ticket_cost');
            $book_id = $request->input('book_id');
        
            if($request->has('image')){

                // get image 
                $file = $request->file('image');               
                $fileName =  $file->getClientOriginalName();            
                $extension = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();        
                $fileSize = $file->getSize();
                $fileMimeType = $file->getMimeType();                        
                $destinationPath = 'uploads/book';
                $file->move($destinationPath,$file->getClientOriginalName());
                
                 DB::table('events')
                ->where('id', $id)
                ->update(['book_id' => $book_id,'event_date' => $event_date,'venue_details' => $venue_details,'website' => $website,'ticket_cost' => $ticket_cost,'image' =>'uploads/book/'.$fileName,'name' => $name, 'desc'=>$desc]);
            }else{
                DB::table('events')
                ->where('id', $id)
                ->update(['book_id' => $book_id,'event_date' => $event_date,'venue_details' => $venue_details,'website' => $website,'ticket_cost' => $ticket_cost,'name' => $name, 'desc'=>$desc]);
            }

            $user = Event::where('id', $id)->get();
            $books = Directory::all();
            return view('admin.event.editEvent')->with('user', $user->first())->with('books', $books);
        }else{            
            $user = Event::where('id', $userId)->get();
            $books = Directory::all();
            return view('admin.event.editEvent')->with('user', $user->first())->with('books', $books);
        }      
    }
        
    public function addEvent(Request $request){
        if($request->has('name')){   
            $book_id = $request->input('book_id');
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
            return view('admin.event.eventLists')->with('users', $users);
        }else{
            $books = Directory::all();
            return view('admin.event.addEvent')->with('books', $books);
        }        
    }

    // ------------------------------------------ ad management -------------------------------------------


    public function adLists(){        
        $users = Advertise::all();
        return view('admin.event.adLists')->with('users', $users);
    }

    public function deleteAd(Request $request){        
        $id = $request->input('id');
        DB::delete('delete from advertise where id = ?',[$id]);        
        $a = array('results'=>200);
        return Response::json($a);
    }


    public function editAd($userId = '', Request $request){

        $id = $request->input('id');
        
        if($request->has('name')){
            $name = $request->input('name');
            $desc = $request->input('desc');     
                
            if($request->has('image')){

                // get image 
                $file = $request->file('image');               
                $fileName =  $file->getClientOriginalName();            
                $extension = $file->getClientOriginalExtension();
                $realPath = $file->getRealPath();        
                $fileSize = $file->getSize();
                $fileMimeType = $file->getMimeType();                        
                $destinationPath = 'uploads/book';
                $file->move($destinationPath,$file->getClientOriginalName());
                
                 DB::table('advertise')
                ->where('id', $id)
                ->update(['image' =>'uploads/book/'.$fileName,'name' => $name, 'desc'=>$desc]);
            }else{
                DB::table('advertise')
                ->where('id', $id)
                ->update(['name' => $name, 'desc'=>$desc]);
            }

            $user = Advertise::where('id', $id)->get();            
            return view('admin.event.editAd')->with('user', $user->first());
        }else{            
            $user = Advertise::where('id', $userId)->get();            
            return view('admin.event.editAd')->with('user', $user->first());
        }      
    }
        
    public function addAd(Request $request){
        if($request->has('name')){   
            
            $name = $request->input('name');
            $desc = $request->input('desc');
                        
            // get image 
            $file = $request->file('image');               
            $fileName =  $file->getClientOriginalName();            
            $extension = $file->getClientOriginalExtension();
            $realPath = $file->getRealPath();        
            $fileSize = $file->getSize();
            $fileMimeType = $file->getMimeType();                        
            $destinationPath = 'uploads/book';
            $file->move($destinationPath,$file->getClientOriginalName());
                        
            $check = Advertise::where('name', $name)->get();
            if(!$check->first()){      
                $user = new Advertise();
                //On left field name in DB and on right field name in Form/view
                $user->name = $name;
                $user->desc = $desc;                
                $user->image = 'uploads/book/'.$fileName;                
                $user->save();              
            }

            $users = Advertise::all();            
            return view('admin.event.adLists')->with('users', $users);
        }else{            
            return view('admin.event.addAd');
        }        
    }



    // ---------------------------------------------- time management ------------------------------------
    public function timeLists(){        
        $users = Hour::all();
        return view('admin.time.timeLists')->with('users', $users);
    }

    public function deleteTime(Request $request){        
        $id = $request->input('id');    
        DB::delete('delete from hours where id = ?',[$id]);        
        $a = array('results'=>200);
        return Response::json($a);
    }


    public function editTime($userId = '', Request $request){

        $id = $request->input('id');
        if($request->has('start_time')){

            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');  
            $week_of_day = $request->input('week_of_day');  

             DB::table('hours')
            ->where('id', $id)
            ->update(['start_time' => $start_time, 'end_time'=>$end_time, 'week_of_day'=>$week_of_day]);            
            
            $user = Hour::where('id', $id)->get();
            return view('admin.time.editTime')->with('user', $user->first());         
        }else{            
            $user = Hour::where('id', $userId)->get();
            return view('admin.time.editTime')->with('user', $user->first());
        }      
    }
        
    public function addTime(Request $request){

        if($request->has('start_time')){

            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');  
            $week_of_day = $request->input('week_of_day');

            $check = Hour::where('start_time', $start_time)->where('end_time', $end_time)->where('week_of_day', $week_of_day)->get();
            if(!$check->first()){    
                $user = new Hour();
                //On left field name in DB and on right field name in Form/view
                $user->start_time = $start_time;
                $user->end_time = $end_time;       
                $user->week_of_day = $week_of_day;       
                $user->save();    
            }              
            $users = Hour::all();
            return view('admin.time.timeLists')->with('users', $users);
        }else{
            return view('admin.time.addTime');
        }        
    }



    public function settings(Request $request){
        if($request->has('phone')){

            $phone = $request->input('phone');
            $email1 = $request->input('email1');
            $email2 = $request->input('email2');

            // $setting = new Setting();
            // $setting->phone = $phone;
            // $setting->email1 = $email1;
            // $setting->email2 = $email2;
            // $setting->save();

            DB::table('settings')
            ->where('id', 1)
            ->update(['phone' => $phone, 'email1'=>$email1, 'email2'=>$email2]);      


            $setting = Setting::where('id', 1)->get()->first();
            return view('admin.business.settings')->with('setting', $setting);
        }else{
            $setting = Setting::where('id', 1)->get()->first();
            return view('admin.business.settings')->with('setting', $setting);
        }
    }


    

}
