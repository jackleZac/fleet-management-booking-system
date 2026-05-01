<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        // Filter by make
        if ($request->filled('make')) {
            $query->where('make', $request->make);
        }

        // Filter by transmission
        if ($request->filled('transmission')) {
            $query->where('transmission', $request->transmission);
        }

        // Sort by price        
        if ($request->filled('sort_price')) {
            $query->orderBy('price_per_day', $request->sort_price);
        }
        
        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $cars = $query->get();

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'seats' => 'required|integer|min:1',
            'transmission' => 'required|string|max:50',
            'is_featured' => 'required|boolean',
            'fuel' => 'required|string|max:50',
            'price_per_day' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',

            // image validation
            'primary_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'extra_images' => 'nullable|array',
            'extra_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        DB::transaction(function () use ($request, $validated) {
            // Remove image fields because they do not belong in cars table
            unset($validated['primary_image'], $validated['extra_images']);

            // Create car first
            $car = Car::create($validated);

            // Store primary image
            if ($request->hasFile('primary_image')) {
                $primaryImagePath = $request->file('primary_image')->store('cars', 'public');

                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => $primaryImagePath,
                    'is_primary' => true,
                ]);
            }

            // Store extra images
            if ($request->hasFile('extra_images')) {
                foreach ($request->file('extra_images') as $extraImage) {
                    $extraImagePath = $extraImage->store('cars', 'public');

                    CarImage::create([
                        'car_id' => $car->id,
                        'image_path' => $extraImagePath,
                        'is_primary' => false,
                    ]);
                }
            }
        });

        Car::create($validated);
        CarImage::create([
            'car_id' => $car->id,
            'image_path' => $primaryImagePath,
            'is_primary' => true,
        ]);

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car added successfully.');
    }

    public function edit($id)
    {
        $car = Car::with(['primaryImage', 'images'])->findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'model' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'seats' => 'required|integer|min:1',
            'transmission' => 'required|string|max:50',
            'is_featured' => 'required|boolean',
            'fuel' => 'required|string|max:50',
            'price_per_day' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',

            // optional when updating
            'primary_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'extra_images' => 'nullable|array',
            'extra_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        DB::transaction(function () use ($request, $validated, $id) {
            unset($validated['primary_image'], $validated['extra_images']);

            $car = Car::findOrFail($id);

            // Update normal car details
            $car->update($validated);

            // If new primary image is uploaded, replace old primary image
            if ($request->hasFile('primary_image')) {
                $oldPrimaryImage = $car->primaryImage;

                if ($oldPrimaryImage) {
                    Storage::disk('public')->delete($oldPrimaryImage->image_path);
                    $oldPrimaryImage->delete();
                }

                $primaryImagePath = $request->file('primary_image')->store('cars', 'public');

                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => $primaryImagePath,
                    'is_primary' => true,
                ]);
            }

            // If extra images are uploaded, add them without deleting existing extra images
            if ($request->hasFile('extra_images')) {
                foreach ($request->file('extra_images') as $extraImage) {
                    $extraImagePath = $extraImage->store('cars', 'public');

                    CarImage::create([
                        'car_id' => $car->id,
                        'image_path' => $extraImagePath,
                        'is_primary' => false,
                    ]);
                }
            }
        });

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car updated successfully.');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Car deleted successfully.');
    }
}