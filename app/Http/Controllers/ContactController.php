<?php

namespace App\Http\Controllers;
/*
importing the Contact Model
importing the user Model
(usedb) this is used when you what to use raw sql query no Eloquent
*/

use Illuminate\Http\Request;

use App\Models\Contact;

use App\Models\User;


use DB;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        //$total_contacts = Contact::where('user_id', auth()->user()->id)->count();
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       

        /*  

            displayes all contact which are related to the logged in user
            or the one the logged user added

        */
        $title = 'Contacts';
        $user_id = auth()->user()->id;    
        $user_contacts = Contact::where('user_id', $user_id)->paginate(9);       
        return view('pages.contact', compact('title','user_contacts'));
        
      
    }

    /**
     * Show the form for creating a new resource.
     *  loads the page with creation form or adding form
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $data = array(
            'title'=> 'Add Contact',
        );
        return view('contacts.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *inserts into database
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating the data sent from form
           $this->validate($request, [
            'firstname' => 'required|max:20|min:3',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'cover_image'=>'image|nullable|max:1999'
         
         
        ]);
           // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        
        // make thumbnails
       /* $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            $thumb = Image::make($request->file('cover_image')->getRealPath());
            $thumb->resize(80, 80);
            $thumb->save('storage/cover_images/'.$thumbStore);*/
        
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        
        $contact  = new Contact();
        $contact->contact_fname = $request->input('firstname');
        $contact->contact_lname = $request->input('lastname');
        $contact->job = $request->input('job');
        $contact->contact_email = $request->input('email');
        $contact->contact_phone = $request->input('phone');
        $contact->cover_image = $fileNameToStore;
        $contact->user_id = auth()->user()->id;
        //$post->cover_image = $fileNameToStore;
        $contact->save();
        return redirect('/contact')->with('success','Contact Created');


  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $contact = Contact::find($id);
        if (auth()->user()->id !== $contact->user_id){

            return redirect('pages.notfound');

    
        }
        $data = array(
                'title' => 'Contact Detail',
                'contact' => Contact::find($id),

        );
        
        return view('contacts.contactinfo')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        if (auth()->user()->id !== $contact->user_id){
            return redirect('pages.notfound');
            //->with('error','Page Not found');
        }
         $data = array(
                'title' => 'Update Contact',
                'contact' => Contact::find($id),

        );
    
        return view('contacts.contactedit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
         
         
        ]);
        
        $contact  = Contact::find($id);
        $contact->contact_fname = $request->input('firstname');
        $contact->contact_lname = $request->input('lastname');
        $contact->contact_email = $request->input('email');
        $contact->contact_phone = $request->input('phone');
        //$post->user_id = auth()->user()->id;
        //$post->cover_image = $fileNameToStore;
        $contact->save();
       // return redirect('/contact')->with('success','Contact Updated');
        return redirect()->back()->with('success', "Contact Updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check for correct user/Owner of the tweet
        $contact = Contact::find($id);
        if (auth()->user()->id !== $contact->user_id){
            return redirect('pages.notfound');
            //->with('error','Page Not foundpp');
        }
      
        $contact->delete();
        return redirect('/contact')->with('success', "Contact Deleted");
    }

    public function search_contact(Request $request){
    

       $search = $request->input('search');
        $data = array(
            'title' => 'Searched Data',
             'user_contacts' => Contact::query()
                        ->where('user_id', auth()->user()->id)
                        ->where('contact_fname', 'LIKE', '%'.$search.'%')
                        ->orWhere('contact_lname', 'LIKE', '%'.$search.'%')
                        ->paginate(9),



             // 'title' => 'Searched Data',
            //  'contact' => Contact::query()
            //             ->where('user_id', auth()->user()->id)
            //             ->where('contact_fname', 'LIKE', "%{$search}%")
            //             ->orWhere('contact_lname', 'LIKE', "%{$search}%")
            //             ->get(),
             

    );
    //return view('contacts.searched')->with($data)
    return view('pages.contact')->with($data);
    }
}
