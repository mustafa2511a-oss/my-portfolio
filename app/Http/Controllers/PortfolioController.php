<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('portfolio', compact('projects'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->all());

        return back()->with('success', 'Aapka message mil gaya hai!');
    }

    public function downloadCV()
    {
        $filePath = public_path('cv/my-cv.pdf');

        if (file_exists($filePath)) {
            return response()->download($filePath, 'My_CV.pdf');
        }

        $demoPdfContent = "%PDF-1.4\n1 0 obj<</Type/Catalog/Pages 2 0 R>>endobj 2 0 obj<</Type/Pages/Count 1/Kids[3 0 R]>>endobj 3 0 obj<</Type/Page/MediaBox[0 0 612 792]/Parent 2 0 R/Resources<</Font<</F1 4 0 R>>>>/Contents 5 0 R>>endobj 4 0 obj<</Type/Font/Subtype/Type1/BaseFont/Helvetica>>endobj 5 0 obj<</Length 84>>stream\nBT\n/F1 24 Tf\n100 700 Td\n(Portfolio Demo CV) Tj\n/F1 14 Tf\n0 -40 Td\n(Developer Resume Sample) Tj\nET\nendstream\nendobj\nxref\n0 6\n0000000000 65535 f\n0000000009 00000 n\n0000000056 00000 n\n0000000111 00000 n\n0000000212 00000 n\n0000000287 00000 n\ntrailer<</Size 6/Root 1 0 R>>\nstartxref\n421\n%%EOF";

        return response($demoPdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Demo_Developer_CV.pdf"',
        ]);
    }
}