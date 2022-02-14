<?php

namespace App\Http\Controllers;

use App\Classes\HideId;
use App\Models\Member;
use DateTime;
use Illuminate\Http\Request;

class Main extends Controller
{
    //Loads the main page
    public function index()
    {
      $members = Member::all();

      return view('home', ['members'=>$members]);
    }

    //Loads the create-member page
    public function add_member_page()
    {
      return view('new_member');
    }

    //Registers a new member in the database
    public function submit_member(Request $re)
    {   

      $re->validate([
         'name'=>['required', 'max:40', 'min:2'],
         'birthdate'=>['required', 'date']
      ]);

      $members = new Member();
      $members->name = $re->input('text_name');
      $new_date = $re->input('birthdate');
      $new_age = $this->getAge($new_date);
      $members->age = $new_age;
      $members->save();

      return redirect()->route('index');
    }

    //Calculates the member's age based on his birthdate
    private function getAge(string $birtdate):string
    {
       $then = new DateTime($birtdate);
       $now = new DateTime();
       $interval = $then->diff($now);

       return $interval->y;
    }

    //=============================================
    //Deletes a member from the database. This function receives an id encrypted, it is decrypted and a row with that id is selected.
    public function delete_member(string $id)
    {
      $revealed = HideId::reveal($id);
      Member::destroy($revealed);

      return redirect()->route('index');
    }

   //Leads to the update page. This function receives an id encrypted, it is decrypted and a row with that id is selected from the database.
   public function update_page(string $id)
   {
      $revealed = HideId::reveal($id);
      $members = Member::find($revealed);

      return view('update_member', ['members'=>$members]);
   }

   //This function modifies the data from database and return to the main page. It receives an id encrypted, it is decrypted and a row with that id is selected from the database.
   public function update_member(Request $re)
   {
     $the_id = $re->input('the_id');

     $members = Member::find($the_id);
     $members->name = $re->input('text_name');
     $members->save();

     return redirect()->route('index');
   }

   //It increments the column 'how_often'.
   public function plus(string $id)
   {
      $revealed = HideId::reveal($id);
      $membros = Member::find($revealed);
      
      $membros->how_often++;
      $membros->save();
      return redirect()->route('index');
   }

  //Search field from home page. It searchs from name or age in the database.
  public function search(Request $request)
   {
     $q = $request->input('q');

     $members = Member::where('name', 'like', "%$q%")->orWhere('age', 'like', "%$q%")->get();

     return view('home', ['members'=>$members]);
   }

}
