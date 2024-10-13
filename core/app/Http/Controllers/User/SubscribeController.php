<?php

namespace App\Http\Controllers\User;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class SubscribeController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activeTheme = active_theme();
    }

    /**
     * Display the page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
{
    $plan = request()->user()->plan();
    $start_date = $expiry_date = $planlastdate = '-';

    $user = User::where('id', request()->user()->id)->firstOrFail();

    // Start date ve expiry date'i doğru formatta al
    $start_date = date_formating($user->plan_start_date);
    $expiry_date = date_formating($user->plan_end_date);

    // Gün farkını hesapla
    if ($user->plan_start_date && $user->plan_end_date) {
     // Carbon kütüphanesini kullanarak tarihler arasındaki gün farkını hesapla
     $startDate = \Carbon\Carbon::parse($user->plan_start_date);
     $endDate = \Carbon\Carbon::parse($user->plan_end_date);
 
     // Kalan gün sayısını hesapla
     $planlastdate = Carbon::now()->diffInDays($endDate, false); // İkinci argüman negatif gün sayısına izin verir
 }
 

    return view($this->activeTheme . '.user.subscription', 
        compact('plan', 'start_date', 'expiry_date', 'planlastdate'));
}


    /**
     * Cancel recurring subscription
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function cancelSubscription()
    {

        try {
            request()->user()->cancelRecurringSubscription();
        } catch (\Exception $e) {

            Log::info($e->getMessage());
            quick_alert_error($e->getMessage());
            return back();
        }

        quick_alert_success(___('Cancelled Successfully'));
        return back();
    }
}
