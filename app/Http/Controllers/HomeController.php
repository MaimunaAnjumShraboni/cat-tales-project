<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Cat;

use App\Models\Adoption;

use App\Models\Order;

use App\Models\Book;
use App\Models\GalleryImage;
use App\Models\Review;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{ 
    public function my_home(Request $request)
    {
        $query = Cat::query();
        if ($request->filled('breed')) {
            $query->where('breed', 'like', '%'.$request->get('breed').'%');
        }
        if ($request->filled('sex')) {
            $query->where('sex', $request->get('sex'));
        }
        $data = $query->get();
        $galleryImages = GalleryImage::latest()->get();
        $reviews = Review::latest()->take(6)->get();
        return view('home.index', compact('data','galleryImages','reviews'));
    }
    public function index()
    {
        if (Auth::id())
        {
            $userstatus = Auth::user()->{"user status"};
            if ($userstatus == 'user')
            {
                $query = Cat::query();
                if (request()->filled('breed')) {
                    $query->where('breed', 'like', '%'.request('breed').'%');
                }
                if (request()->filled('sex')) {
                    $query->where('sex', request('sex'));
                }
                $data = $query->get();
                $galleryImages = GalleryImage::latest()->get();
                $reviews = Review::latest()->take(6)->get();
                return view('home.index', compact('data','galleryImages','reviews'));
            }
            else
            {
                
                $total_cat= Cat::count();
                $total_adoption= Adoption::count();
                $total_book= Book::count();
                $total_delivered= Order::where('delivery_status', 'delivered')->count();
                return view('admin.index', compact('total_cat', 'total_adoption', 'total_book', 'total_delivered'));
            }
        }

    }

    public function show_review_form()
    {
        return view('home.review_form');
    }

    public function submit_review(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'title' => 'nullable|string|max:120',
            'body' => 'required|string|max:2000',
        ]);

        Review::create($validated);

        return redirect('/')->with('message', 'Thanks for your review!');
    }

    public function learn_facts()
    {
        return view('home.facts');
    }

    public function adopt_cat(Request $request, $id)
    {
        if (Auth::id())
        {
            $cat = Cat::find($id);

            $adopt_name = $cat->name;
            $adopt_age = $cat->age;
            $adopt_sex = $cat->sex;
            $adopt_breed = $cat->breed;
            $adopt_description = $cat->description;
            $adopt_image = $cat->img;
            $adopt_vaccinated = $cat->vaccinated;
            $adopt_availability = $cat->availability;

            $data=new Adoption;
            $data->name=$adopt_name;
            $data->age=$adopt_age;
            $data->sex=$adopt_sex;
            $data->breed=$adopt_breed;
            $data->description=$adopt_description;
            $data->img=$adopt_image;
            $data->vaccinated=$adopt_vaccinated;
            $data->availability=$adopt_availability;
            $data->user_id=Auth::id();
            $data->save();

            return redirect()->back()->with('message', 'Adoption Request Sent Successfully');

        }

        else
        {
            return redirect('login');
        }
        
    }

    public function my_cart()
    {
    $user_id = auth()->user()->id;
    $data = Adoption::where('user_id', $user_id)->get();
    $orders = Order::where('email', auth()->user()->email)->latest()->take(1)->get();
        return view('home.my_cart',compact('data','orders'));
    }

    public function remove_cart($id)
    {
    $data= Adoption::find($id);
    $data->delete();
    return redirect()->back();

    }

    public function confirm_order(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $name = $user->name;
        $email = $user->email;
        $phone = $request->phone;
        $address = $request->address;

        $adoptions = Adoption::where('user_id', $user_id)->get();

        foreach ($adoptions as $adoption) {
            $order = new Order;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->cat_name = $adoption->name;
            $order->cat_age = $adoption->age;
            $order->cat_sex = $adoption->sex;
            $order->cat_breed = $adoption->breed;
            $order->cat_image = $adoption->img;
            $order->save();

            $data = Adoption::find($adoption->id);

            $adoption->delete();
        }

        return redirect()->back()->with('message', 'Order Confirmed Successfully');
    }

    public function book_cat(Request $request)
    {
        $data = new Book;
        $data->email = $request->email;
        $data->breed = $request->breed;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->save();

        return redirect()->back()->with('message', 'Cat-Sitting Request Sent Successfully');
    }
}
