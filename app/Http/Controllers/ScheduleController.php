<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the schedule.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editableSchedule = null;
        $scheduleQuery = Schedule::query();
        $scheduleQuery->where('name', 'like', '%'.request('q').'%');
        $schedules = $scheduleQuery->paginate(10);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableSchedule = Schedule::find(request('id'));
        }

        return view('admin.schedules.index', compact('schedules', 'editableSchedule'));
    }

    /**
     * Store a newly created schedule in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Schedule);
        $newSchedule = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
            'startDate'   => 'required',
            'endDate'     => 'required',
        ]);
        $newSchedule['creator_id'] = auth()->id();
        $newSchedule['start_date'] = $request->startDate;
        $newSchedule['end_date']   = $request->endDate;
        Schedule::create($newSchedule);

        return redirect()->route('schedules.index');
    }

    /**
     * Update the specified schedule in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Schedule $schedule)
    {
        $this->authorize('update', $schedule);

        $scheduleData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $schedule->update($scheduleData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('schedules.index', $routeParam);
    }

    /**
     * Remove the specified schedule from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Schedule $schedule)
    {
        $this->authorize('delete', $schedule);

        $request->validate(['schedule_id' => 'required']);

        if ($request->get('schedule_id') == $schedule->id && $schedule->delete()) {
            $routeParam = request()->only('page', 'q');

            return redirect()->route('schedules.index', $routeParam);
        }

        return back();
    }
}
