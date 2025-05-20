<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class CVController extends Controller
{
    public function generate(Request $request)
    {
        try {
            // Get the authenticated user with all necessary relationships
            $user = $request->user();
            
            if (!$user) {
                return redirect()->back()->with('error', 'You must be logged in to generate a CV.');
            }

            // Load relationships
            $user->load(['experiences', 'education', 'skills']);
            
            // Validate required fields
            if (!$user->name || !$user->email) {
                return redirect()->back()->with('error', 'Please complete your profile information (name and email) before generating a CV.');
            }
            
            // Create PDF instance
            $pdf = PDF::loadView('pdf.cv-pdf', compact('user'));
            
            // Set PDF options for better quality
            $pdf->setPaper('a4');
            $pdf->setOption('isHtml5ParserEnabled', true);
            $pdf->setOption('isRemoteEnabled', true);
            $pdf->setOption('dpi', 150);
            $pdf->setOption('defaultFont', 'Arial');
            
            // Generate unique filename
            $filename = 'cv_' . $user->username . '_' . time() . '.pdf';
            
            // Ensure the storage directory exists
            $storagePath = storage_path('app/public/cv');
            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0755, true);
            }
            
            // Save the PDF
            $pdf->save($storagePath . '/' . $filename);

            // Store the filename in the session
            session(['cv_path' => $filename]);

            return redirect()->back()
                ->with('success', 'CV generated successfully! Click the download button to get your CV.');
                
        } catch (\Exception $e) {
            Log::error('CV Generation Error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()->with('error', 'Failed to generate CV: ' . $e->getMessage());
        }
    }

    public function download(Request $request)
    {
        try {
            $filename = session('cv_path');
            
            if (!$filename) {
                return redirect()->back()->with('error', 'No CV generated yet. Please generate a CV first.');
            }

            $path = storage_path('app/public/cv/' . $filename);
            
            if (!file_exists($path)) {
                return redirect()->back()->with('error', 'CV file not found. Please generate a new CV.');
            }

            // Clear the session after successful download
            session()->forget('cv_path');

            return response()->download($path, 'cv.pdf')->deleteFileAfterSend(true);
            
        } catch (\Exception $e) {
            Log::error('CV Download Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to download CV. Please try generating it again.');
        }
    }
} 