<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class CertificateController extends Controller
{
    public function generate($user = "Mohamed Saad Gheit", $course = "Demo Course")
    {
//        $user = 'mohamed Saad Gheit';
//        $course ='course name';
        $date = now()->format('F j, Y');

        $pdf = Pdf::loadView('certificate', compact('user', 'course', 'date'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('certificate.pdf');
//        return $pdf->download('certificate.pdf');// or ->stream() to view in browser
    }
}
