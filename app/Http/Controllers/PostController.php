<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App;
use App\Kid;
use App\Room;
use App\Post;
use Illuminate\Support\Facades\DB;
use Validator;

class PostController extends Controller
{
    function upload (Request $request) {

      // validate the request itself.
      $validator = $this->validatePost($request->all());

      if ($validator->fails()){
        if ($request->is('home/teacher/*')) return redirect('home/teacher/post')->withErrors($validator);
        if ($request->is('home/school/*')) return redirect('home/school/post')->withErrors($validator);
      }

      if ($request->is('home/teacher/*')){

        // validate that the user can tag those kids
        if($this->validateKidsInRooms($request)){

          $this->createPost($request);
          return redirect('home/teacher/feed')->with('status', 'Mensaje enviado');

        }else{ // ¿flash the post? should see the post when is redirected there...
          return redirect('home/teacher/feed')->withErrors(['errorStatus', 'No ha sido posible enviar el mensaje']);
        }
      }

      if ($request->is('home/school/*')){

        // validate that the school can tag those kids.
        if($this->validateKidsInSchool($request)){

          $this->createPost($request);
          return redirect('home/school/feed')->with('status', 'Mensaje enviado');

        }else{ // ¿flash the post? should see the post when is redirected there...
          return redirect('home/school/feed')->withErrors(['errorStatus', 'No ha sido posible enviar el mensaje']);
        }

      }

      return redirect('error'); // god only knows how is here...

    }

    private function validatePost ($data) {

      return Validator::make($data, [ // finish validator
          'contentText' => 'required|max:255',
          'posttype' => 'required',
          'kids_id' => 'required', // validate
          'room_id' => 'required',
      ]);
    }

    private function validateKidsInSchool (Request $request){
        return true;
    }

    private function validateKidsInRooms (Request $request){
        return true;
        /*
        $kidsIds = $request->user()->teacherInRooms()
                        ->join('kid_room', 'kid_room.room_id', '=', 'rooms.id')
                        ->join(Kid::getTableName(), 'kids.id', '=', 'kid_room.kid_id')
                        ->select('kids.id as kidId')
                        ->get();
        */
    }

    private function createPost(Request $request)
    {
        $post = Post::create([
            'contentText' => $request->input('contentText'),
            'room_id' =>  $request->input('room_id'),
            'posttype_id' => $request->input('posttype'),
            'school_id' => Room::find($request->input('room_id'))->school()->get()->first()->id,
            'user_id' => $request->user()->id,
        ]);

        $ids = explode(',', $request->input('kids_id'));
        $this->createRelations($ids, $post->id);


    }

    private function createRelations (array $ids, $postId){ // should try and catch ¿?

        $data = [];

        foreach ($ids as $id){
          $data[] = array(
                        'kid_id' => $id,
                        'post_id' => $postId,
                        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                      );
        }

         DB::table('post_kid')->insert($data);
    }
}
