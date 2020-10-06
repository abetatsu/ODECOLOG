<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RecordRequest;
use JD\Cloudder\Facades\Cloudder;
use App\Record;
use Auth;
use App\Calendar;
use Validator;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $records = Record::where('user_id', Auth::id())->get();
        $cal = new Calendar($records);
        $calendar = $cal->showCalendar($request->year, $request->month);

        return view('records.index', compact('records', 'calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('records.create', ['date' => $request->date]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordRequest $request)
    {
        $record = new Record;

        $validator = Validator::make(
            $request->all(),
            [
                'day' => 'unique:records',
            ],
            [
                'day.unique' => 'すでにこの日付には記録がされています。別の日付で登録してください。',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $record->user_id = Auth::id();
        $record->size = $request->size;
        $record->sleep_time = $request->sleep_time;
        $record->care_item1 = $request->care_item1;
        $record->care_item2 = $request->care_item2;
        $record->care_item3 = $request->care_item3;
        $record->care_item4 = $request->care_item4;
        $record->alcohol = $request->alcohol;
        $record->stress = $request->stress;
        $record->remarks = $request->remarks;
        $record->day = $request->day;

        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width' => 200,
                'height' => 200
            ]);
            $record->image_path = $logoUrl;
            $record->public_id = $publicId;
        }

        $record->save();

        $records = Record::where('user_id', Auth::id())->get();
        $records = Record::all();
        $cal = new Calendar($records);
        $calendar = $cal->showCalendar($request->month, $request->year);

        return redirect()->route('records.index', compact('records', 'calendar'))->with('success_message', '記録が保存されました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Record::find($id);

        if (Auth::id() !== $record->user_id) {
            return abort(403);
        }

        return view('records.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Record::find($id);

        if (Auth::id() !== $record->user_id) {
            return abort(403);
        }

        return view('records.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RecordRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecordRequest $request, $id)
    {
        $record = Record::find($id);

        $record->size = $request->size;
        $record->sleep_time = $request->sleep_time;
        $record->care_item1 = $request->care_item1;
        $record->care_item2 = $request->care_item2;
        $record->care_item3 = $request->care_item3;
        $record->care_item4 = $request->care_item4;
        $record->alcohol = $request->alcohol;
        $record->stress = $request->stress;
        $record->remarks = $request->remarks;
        $record->day = $request->day;

        if ($image = $request->file('image')) {
            if (isset($record->public_id)) {
                Cloudder::destroyImage($record->public_id);
            }
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width' => 200,
                'height' => 200
            ]);
            $record->image_path = $logoUrl;
            $record->public_id = $publicId;
        }

        $record->save();

        return redirect()->route('records.show', compact('record'))->with('success_message', '記録が編集されました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $record = Record::find($id);

        if (Auth::id() !== $record->user_id) {
            return abort(403);
        }

        if (isset($record->public_id)) {
            Cloudder::destroyImage($record->public_id);
        }

        $record->delete();

        $records = Record::where('user_id', Auth::id())->get();
        $cal = new Calendar($records);
        $calendar = $cal->showCalendar($request->month, $request->year);

        return redirect()->route('records.index', compact('records', 'calendar'))->with('success_message', '記録が削除されました');
    }
}
