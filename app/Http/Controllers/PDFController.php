<?php
namespace App\Http\Controllers;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller {
    public function generate($username) {
        $user = User::where('username', $username)
            ->with(['experiences', 'education', 'skills'])
            ->firstOrFail();
            
        $pdf = Pdf::loadView('pdf.cv-pdf', compact('user'));
        
        // Set PDF options for better quality
        $pdf->setPaper('a4');
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('dpi', 150);
        
        return $pdf->download('cv-'.$user->username.'.pdf');
    }
}
