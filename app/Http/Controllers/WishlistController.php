<?php

namespace App\Http\Controllers;

use App\Mail\WishlistConfirmation;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WishlistController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Save the wishlist (you might have a Wishlist model)
        // Wishlist::create([
        //     'course_id' => $request->course_id,
        //     'user_id' => auth()->id(), // assuming user is logged in
        //     // other fields
        // ]);

        // Send confirmation email
        Mail::to($request->email)->send(new WishlistConfirmation($request->course_name, $request->full_name));

        return back()->with('success', 'Course added to wishlist and confirmation email sent.');
    }
}
