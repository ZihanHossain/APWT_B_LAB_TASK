<?php

namespace App\Http\Controllers;

use App\Models\Ecommerce_channel;
use App\Models\Physical_store_channel;
use App\Models\Product;
use App\Models\Social_media_channel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Handler\Proxy;

class SalesController extends Controller
{
    public $Ecommerce_today = [];
    public $Ecommerce_seven_days = [];
    public $Physical_today = [];
    public $Physical_seven_days = [];
    public $Social_today = [];
    public $Social_seven_days = [];
    function index(Request $req)
    {
        $this->Ecommerce_today = Ecommerce_channel::where('date_sold', today())
            ->get();
        
        $date = Carbon::now()->subDays(7);
        $this->Ecommerce_seven_days = Ecommerce_channel::where('date_sold', $date)
        ->get();

        $this->Physical_today = Physical_store_channel::where('date_sold', today())
            ->get();
        
        $date = Carbon::now()->subDays(7);
        $this->Physical_seven_days = Physical_store_channel::where('date_sold', $date)
        ->get();
// 
        $this->Social_today = Social_media_channel::where('date_sold', today())
            ->get();
        
        $date = Carbon::now()->subDays(7);
        $this->Social_seven_days = Social_media_channel::where('date_sold', $date)
        ->get();
// 
        $ecommercetodaycount = count($this->Ecommerce_today);
        $physicaltodaycount = count($this->Physical_today);
        $ecommercesevencount = count($this->Ecommerce_today);
        $physicalsevencount = count($this->Physical_seven_days);
        $socialtodaycount = count($this->Social_today);
        $socialsevencount = count($this->Social_seven_days);
        return view('sales')->with('ecommerce_today', $ecommercetodaycount)
        ->with('ecommerce_seven_days', $ecommercesevencount)
        ->with('physicaltodaycount', $physicaltodaycount)
        ->with('physicalsevencount', $physicalsevencount)
        ->with('socialtodaycount', $socialtodaycount)
        ->with('socialsevencount', $socialsevencount);
    }

    function physical_store(Request $req)
    {
        $Product = Product::all();

        $this->Physical_today = Physical_store_channel::where('date_sold', today())
            ->get();

        $date = Carbon::now()->subDays(7);
        $this->Physical_seven_days = Physical_store_channel::where('date_sold', $date)
        ->get();

        $physicaltodaycount = count($this->Physical_today);
        $physicalsevencount = count($this->Physical_seven_days);
        return view('phycial_store')->with('products', $Product)
        ->with('msg', $req->msg)
        ->with('physicaltodaycount', $physicaltodaycount)
        ->with('physicalsevencount', $physicalsevencount);
    }

    function sell_request(Request $req)
    {
        $validated = $req->validate([
            'customer_name' => 'required|alpha|min:3|max:30',
            'address' => 'required|alpha_dash|min:3|max:50',
            'quantity' => 'required|max:20|min:1',
        ]);

        $Product = Product::where('product_name', $req->product_name)
        ->get();

        echo $Product;

        // $Product = DB::table('products')->where('product_name', $req->product_name);

        $Physical_store_channel = new Physical_store_channel();

        $Physical_store_channel->customer_name = $req->customer_name;
        $Physical_store_channel->address = $req->address;
        $Physical_store_channel->phone = $req->phone;
        $Physical_store_channel->product_id = $Product[0]->product_id;
        $Physical_store_channel->product_name = $Product[0]->product_name;
        $Physical_store_channel->unit_price = $Product[0]->unit_price;
        $Physical_store_channel->quantity = $req->quantity;
        $Physical_store_channel->total_price = ($req->quantity*$Product[0]->unit_price);

        $Physical_store_channel->save();

        return redirect()->action(
            [SalesController::class, 'physical_store'], ['msg' => "Added"]
        );
    }

    function social_media()
    {
        return view('social_media');
    }

    function ecommerce()
    {
        $todaycount = count($this->Ecommerce_today);
        $sevencount = count($this->Ecommerce_today);

        return view('ecommerce_web_app')->with('ecommerce_today', $todaycount)
        ->with('ecommerce_seven_days', $sevencount);
    }
}
