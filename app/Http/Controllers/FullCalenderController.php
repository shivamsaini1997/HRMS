<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
class FullCalenderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
            //  $data = Event::whereDate('start', '>=', $request->start)
            //            ->whereDate('end',   '<=', $request->end)
            //            ->get(['id', 'title', 'start', 'end','time']);

            $data = Event::whereDate('start', '>=', $request->start)
             ->whereDate('end', '<=', $request->end)
             ->get([
                 'id', 
                 DB::raw("CASE 
                                WHEN time IS NOT NULL THEN CONCAT(title, '-', time) 
                                ELSE title 
                           END AS title"),
                 'start', 
                 'end',
                 'time'
             ]);

  
             return response()->json($data);
        }
  
        return view('admin/calender');
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request): JsonResponse
    {

        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
                  'time' => $request->time,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
                  'time' => $request->time,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
}