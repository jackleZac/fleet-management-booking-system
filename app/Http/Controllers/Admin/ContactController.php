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
        return view('admin.contact', compact('contactInfo'));
    }
}
