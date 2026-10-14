<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;

use App\Models\Order;

use App\Models\Book;
use App\Models\GalleryImage;

class AdminController extends Controller
{
    public function add_cat()
    {
        return view('admin.add_cat');
    }

    public function upload_cat(Request $request)
    {
        $data = new Cat;
        $data->name = $request->name;
        $data->age = $request->age;
        $data->sex = $request->sex;
        $data->breed = $request->breed;
        $data->description = $request->description;
        $img = $request->file('img');
        if ($img) {
            $filename = time().'.'.$img->getClientOriginalExtension();
            $img->move('cat_img', $filename);
            $data->img = $filename;
        } else {
            $data->img = null;
        }
    $data->vaccinated = $request->vaccinated;
    // Save availability as boolean (1/0)
    $data->availability = $request->availability == "1" ? 1 : 0;
    $data->save();
    return redirect()->back()->with('message', 'Cat Added Successfully');
    }
    
    public function view_cat()
    {
        $data = Cat::all();
        return view('admin.show_cat', compact('data'));
    }
    
    public function delete_cat($id)
    {
        $cat = Cat::find($id);
        
        $cat->delete();
        return redirect()->back()->with('message', 'Cat Deleted Successfully');
        
            
    }

    public function update_cat($id)

    {
        $cat= Cat::find($id);
        return view('admin.update_cat',compact('cat'));

    }

    public function edit_cat(Request $request, $id)
    {
        $cat = Cat::find($id);
        $cat->name = $request->name;
        $cat->age = $request->age;
        $cat->sex = $request->sex;
        $cat->breed = $request->breed;
        $cat->description = $request->description;
        $cat->vaccinated = $request->vaccinated;
        $cat->availability = $request->availability;
        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('cat_img', $imagename);
            $cat->img = $imagename;

        $cat->save();
        return redirect('view_cat');
    }
    



    

    }

    public function orders()
    {
        $data=order::all();
        return view('admin.order',compact('data'));
    }

    public function on_the_way($id)
    {
        $data= Order::find($id);
        $data->delivery_status="On the way";
        $data->save();

        return redirect()->back();


    }

    public function delivered($id)
    {
        $data= Order::find($id);
        $data->delivery_status="Delivered";
        $data->save();

        return redirect()->back();


    }

    public function cancel($id)
    {
        $data= Order::find($id);
        $data->delivery_status="Cancelled";
        $data->save();

        return redirect()->back();


    }
    public function requests()
    {
        $book=Book::all();
        return view('admin.requests', compact('book'));
    }

    public function deny($id)
    {
        $data= Book::find($id);
        $data->status="Denied";
        $data->save();

        return redirect()->back();
    }

    public function approve($id)
    {
        $data= Book::find($id);
        $data->status="Approved";
        $data->save();

        return redirect()->back();
    }
    
    
    public function gallery()
    {
        $images = GalleryImage::latest()->get();
        return view('admin.gallery', compact('images'));
    }

    public function upload_gallery_image(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'caption' => 'nullable|string|max:255',
        ]);

        $image = $request->file('image');
        $imagename = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
        $image->move('gallery_img', $imagename);

        GalleryImage::create([
            'img' => $imagename,
            'caption' => $request->input('caption'),
        ]);

        return redirect()->back()->with('message', 'Image uploaded to gallery');
    }

    public function delete_gallery_image($id)
    {
        $img = GalleryImage::findOrFail($id);
        $path = public_path('gallery_img'.DIRECTORY_SEPARATOR.$img->img);
        if (file_exists($path)) {
            @unlink($path);
        }
        $img->delete();
        return redirect()->back()->with('message', 'Image removed from gallery');
    }
}
