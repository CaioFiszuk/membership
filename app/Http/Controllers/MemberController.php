<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use DateTime;
use PDOException;
use App\Classes\HideId;

class MemberController extends Controller
{
    /**
     * Loads the home page
     * @return void
     */
    public function index()
    {
        $members = Member::paginate(10);
        return view('home', compact('members'));
    }

    /**
     * Creates data in database
     * @param Request $request
     * @return void
     */
    public function createMember(Request $request)
    {
       
        $request->validate([
            'name'=>['required', 'max:40', 'min:2'],
            'birthdate'=>['required', 'date']
        ]);

        $members = new Member();

        try
        {
            $members->name = $request->input('name');
            $new_date = $request->input('birthdate');
            $new_age = $this->getAge($new_date);
            $members->age = $new_age;
            $members->save();

            return redirect()->back();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Loads the update page
     * @return void
     * @param int $id
     */
    public function updatePage($id)
    {
      $revealed = HideId::reveal($id);
      $member = Member::find($revealed);
      return view('update', compact('member'));
    }

    /**
     * Updates data in database
     * @param Request $request
     * @return void
     */
    public function updateMember(Request $request)
    {
        $id = $request->input('the_id');

        $member = Member::find($id);

        try
        {
            $member->name = $request->input('name');
            $new_date = $request->input('birthdate');
            $new_age = $this->getAge($new_date);
            $member->age = $new_age;
            $member->save();

            return redirect()->route('index');
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Deletes data from database
     * @return void
     * @param int $id
     */
    public function deleteMember($id)
    {
        $revealed = HideId::reveal($id);
        Member::destroy($revealed);
        return redirect()->back();
    }

    /**
     * Calculates the member's age based on his birthdate
     * @param string $birthdate
     * @return string
     */
    private function getAge($birtdate)
    {
        $then = new DateTime($birtdate);
        $now = new DateTime();
        $interval = $then->diff($now);

        return $interval->y;
    }

    /**
     * Increments the column frequency
     * @param string $id
     * @return void
     */
    public function plus(string $id)
    {
        try
        {
            $revealed = HideId::reveal($id);
            $membros = Member::find($revealed);
            
            $membros->frequency++;
            $membros->save();
            return redirect()->back();
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }

    }

    /**
     * Search field of database
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
      $q = $request->input('q');
 
      $members = Member::where('name', 'like', "%$q%")->orWhere('age', 'like', "%$q%")->get();
 
      return view('home', compact('members'));
    }
}
