<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;

class ContactController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::first();
        return view('admin.contact.index', compact('contactInfo'));
    }

    public function edit($id)
    {
        $contactInfo = ContactInfo::findOrfail($id);

        return view('admin.contact.edit', compact('contactInfo'));
    }

    public function update(Request $request, $id)
    {
        $contactInfo = ContactInfo::findOrfail($id);

        $validated = $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string'
        ]);

        $contactInfo->update($validated);

        return redirect()
            ->route('admin.contact.index')
            ->with('success', 'Contact Info updated successfully.');
    }
}
