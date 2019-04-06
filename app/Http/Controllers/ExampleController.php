<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getConn() {
      $output = DB::table('output')->orderBy('id', 'desc')->where('deviceId', 'esp1')->first();


      return view('home', ['output' => $output]);
    }

    public function getRecentDeviceData() {
      $piOutput = DB::table('output')->orderBy('id', 'desc')->where('deviceId', 'pi1')->first();
      $esp1Output = DB::table('output')->orderBy('id', 'desc')->where('deviceId', 'esp1')->first();
      $esp2Output = DB::table('output')->orderBy('id', 'desc')->where('deviceId', 'esp2')->first();

      return response()->json(array('pi1'=>$piOutput, 'esp1' => $esp1Output, 'esp2' => $esp2Output));
    }

    public function getThirtyResults($id) {
      $deviceOutput = DB::table('output')->orderBy('id', 'desc')->where('deviceId', $id)->paginate(30);

      return response()->json(array('0'=> $deviceOutput));
    }

    //
}
