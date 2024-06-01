<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\ReservationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('services')-> get();

        return view('site.reservations.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        // Create a reservation
        $reservation = Reservation::create([
            'user_id' => Auth::id(),
        ]);
        // Collect Services Ids
        $data = $request->all();
        $serviceIds = [];
        foreach ($data as $key => $value) {
            if (strpos($key, 'service_id') !== false) {
                $serviceIds[$key] = $value;
            }
        }
        
        foreach ($serviceIds as $key => $value) {
            $id = preg_replace("/[^0-9]/", '', $key);
            ReservationService::create([
                'reservation_id' => $reservation->id,
                'service_id' => $request["service_id$id"],
                'name' => $request["name$id"],
                'address' => $request["address$id"],
                'age' => $request["age$id"],
                'gender' => $request["gender$id"],
                'note' => $request["note$id"],
            ]);
        }

        $reservation->total_price = $reservation->totalPrice();
        $reservation->save();

        // Redirect back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $categories = Category::all();

        return view('site.reservations.edit', compact('reservation', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        // Collect Services Ids
        $data = $request->all();
        $serviceIds = [];
        foreach ($data as $key => $value) {
            if (strpos($key, 'service_id') !== false) {
                $serviceIds[$key] = $value;
            }
        }
        if (empty($serviceIds)) {
            return redirect()->back()->with('alert', 'are you sure cancel reservation?!');
        }

        ReservationService::where('reservation_id', $reservation->id)->delete();

        foreach ($serviceIds as $key => $value) {
            $id = preg_replace("/[^0-9]/", '', $key);
            ReservationService::create([
                'reservation_id' => $reservation->id,
                'service_id' => $request["service_id$id"],
                'name' => $request["name$id"],
                'address' => $request["address$id"],
                'age' => $request["age$id"],
                'gender' => $request["gender$id"],
                'note' => $request["note$id"],
            ]);
        }

        $reservation->total_price = $reservation->totalPrice();
        $reservation->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->back();
    }

    public function destroyApi(Reservation $reservation)
    {
        $reservation->delete();

        return response()->json([
            $reservation,
        ]);
    }
}
