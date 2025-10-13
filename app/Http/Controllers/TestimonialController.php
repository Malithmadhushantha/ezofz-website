<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('user')
            ->approved()
            ->latest()
            ->paginate(12);

        return view('testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5'
        ]);

        $testimonial = Testimonial::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'rating' => $request->rating,
            'status' => 'pending'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your testimonial! It will be reviewed and published soon.'
        ]);
    }

    public function getFeatured()
    {
        $testimonials = Testimonial::with('user')
            ->approved()
            ->featured()
            ->latest()
            ->limit(5)
            ->get();

        // Append computed attributes to user data
        $testimonials->each(function ($testimonial) {
            if ($testimonial->user) {
                $testimonial->user->append(['avatar_url', 'initials']);
            }
        });

        return response()->json($testimonials);
    }

    // Admin methods
    public function adminIndex()
    {
        $testimonials = Testimonial::with('user')
            ->latest()
            ->paginate(15);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function updateStatus(Request $request, Testimonial $testimonial)
    {
        try {
            $request->validate([
                'status' => 'required|in:pending,approved,rejected'
            ]);

            $testimonial->update(['status' => $request->status]);

            return response()->json([
                'success' => true,
                'message' => 'Testimonial status updated successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating testimonial status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function toggleFeatured(Testimonial $testimonial)
    {
        try {
            // If featuring this testimonial, check if we already have 5 featured
            if (!$testimonial->is_featured) {
                $featuredCount = Testimonial::featured()->count();
                if ($featuredCount >= 5) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Maximum of 5 testimonials can be featured at once.'
                    ]);
                }
            }

            $testimonial->update(['is_featured' => !$testimonial->is_featured]);

            return response()->json([
                'success' => true,
                'message' => $testimonial->is_featured ? 'Testimonial featured successfully.' : 'Testimonial unfeatured successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating featured status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        try {
            $testimonial->delete();

            return response()->json([
                'success' => true,
                'message' => 'Testimonial deleted successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting testimonial: ' . $e->getMessage()
            ], 500);
        }
    }
}
