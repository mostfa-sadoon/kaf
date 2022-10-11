<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribtion;
use App\Models\SubscribtionKind;
use Illuminate\Http\Request;

class SubscribtionsController extends Controller
{


    public function index(Request $request)
    {
        $data['subscribtion_kind_id'] = '';
        $data['user_type'] = '';
        $data['status'] = '-1';
        $data['start_date'] = '';
        $data['end_date'] = '';
        
        $request->subscribtion_kind_id ? $data['subscribtion_kind_id'] = $request->subscribtion_kind_id : '';
        $request->user_type ?  $data['user_type'] = $request->user_type : '';
        $request->start_date ?  $data['start_date'] = $request->start_date : '';
        $request->end_date ?  $data['end_date'] = $request->end_date : '';
        $request->status ?  $data['status'] = $request->status : '-1';


        $data['subscribtions_kinds'] = SubscribtionKind::all();

        $q = Subscribtion::where('id', '>', 0);
        $query = $q->when($request->subscribtion_kind_id, function () use ($request, $q) {
            return $q->where('subscribtion_kind_id', $request->subscribtion_kind_id);
        })->when($request->user_type, function () use ($request, $q) {
            return $q->where('user_type', $request->user_type);
        })->when($request->start_date, function () use ($request, $q) {
            return $q->whereDate('start_date', $request->start_date);
        })->when($request->end_date, function () use ($request, $q) {
            return $q->whereDate('end_date', $request->end_date);
        })->when($request->status, function () use ($request, $q) {
            return $q->where('status', $request->status);
        });

        $data['subscribtions'] = $query->latest()->paginate(PAGINATION_COUNT);
        // return $data;

        return view('Admin.subscribtions.index')->with($data);
    }
}
