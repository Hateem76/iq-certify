<?php

namespace App\Http\Controllers\frontend;

use App\Helpers\Results;
use App\Http\Controllers\Controller;
use App\Models\QuizResult;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GenerateAndSaveReportJob;
class CertificateController extends Controller
{
    public function generateCertificate($id)
    {



     $re =   QuizResult::where('unique_key',$id)->first();
        $data = [
            'result' => Results::Get($re->id,'total'),
            'name' => $re->user->name,
            'unique' => $re->unique_key,
            'date' => $re->created_at,
        ];
        $pdf = PDF::loadView('pdf.certificate', $data);
        $pdf->setPaper([0, 0, 700, 490]);
        return $pdf->download('certificate.pdf');


//return view('pdf.certificate', $data);

        // Load the HTML view and store it in a variable
        $htmlContent = view('pdf.certificate', $data)->render();

        // Generate the PDF
        $pdf = PDF::loadHTML($htmlContent);

        $pdf->setPaper([0, 0, 700, 490]); // Width, Height in millimeters
        // Return the PDF as a stream (for testing)
        return $pdf->stream('certificate.pdf');
    }
    public function generateCertificateview($id)
    {



     $re =   QuizResult::where('unique_key',$id)->first();
        $data = [
            'result' => Results::Get($re->id,'total'),
            'name' => $re->user->name,
            'unique' => $re->unique_key,
            'date' => $re->created_at,
        ];
//        $pdf = PDF::loadView('pdf.certificate', $data);
//        $pdf->setPaper([0, 0, 700, 490]);
//        return $pdf->download('certificate.pdf');


//return view('pdf.certificate', $data);

        // Load the HTML view and store it in a variable
        $htmlContent = view('pdf.certificate', $data)->render();

        // Generate the PDF
        $pdf = PDF::loadHTML($htmlContent);

        $pdf->setPaper([0, 0, 700, 490]); // Width, Height in millimeters
        // Return the PDF as a stream (for testing)
        return $pdf->stream('certificate.pdf');
    }

    public function generatereportview($id)
    {
        $re =   QuizResult::where('unique_key',$id)->first();
        $data = [
            'result' => Results::Get($re->id,'total'),
            'name' => $re->user->name,
            'unique' => $re->unique_key,
            'date' => $re->created_at,
            'id' => $re->id,
        ];




        $htmlContent = view('pdf.report',$data)->render();

        // Generate the PDF
        $pdf = PDF::loadHTML($htmlContent);
        $pdf->setPaper([0, 0, 700, 490]); // Width, Height in millimeters
        return $pdf->stream('report.pdf');
    }
    public function generatereportdownload($id)
    {
        $re =   QuizResult::where('unique_key',$id)->first();
        $data = [
            'result' => Results::Get($re->id,'total'),
            'name' => $re->user->name,
            'unique' => $re->unique_key,
            'date' => $re->created_at,
            'id' => $re->id,
        ];
        GenerateAndSaveReportJob::dispatch($id)->onQueue('pdf_generation');



        $pdf = PDF::loadView('pdf.report', $data);
        $pdf->setPaper([0, 0, 700, 490]);
        return $pdf->download('report.pdf');





//return view('pdf.certificate', $data);

        // Load the HTML view and store it in a variable
//        return view('pdf.report');
        $htmlContent = view('pdf.report',$data)->render();

        // Generate the PDF
        $pdf = PDF::loadHTML($htmlContent);

        $pdf->setPaper([0, 0, 700, 490]); // Width, Height in millimeters

        // Return the PDF as a stream (for testing)
        return $pdf->stream('report.pdf');
    }

    public function generateCertificate2()
    {


     $re =   QuizResult::where('unique_key',1)->first();
//        $data = [
//            'result' => Results::Get($re->id,'total'),
//            'name' => $re->user->name,
//            'unique' => $re->unique_key,
//            'date' => $re->created_at,
//        ];
        $data = [];
//        $pdf = PDF::loadView('pdf.certificate', $data);
//        $pdf->setPaper([0, 0, 700, 490]);
//        return $pdf->download('certificate.pdf');


//return view('pdf.certificate', $data);

        // Load the HTML view and store it in a variable
        $htmlContent = view('pdf.certificate2', $data)->render();

        // Generate the PDF
        $pdf = PDF::loadHTML($htmlContent);

//        $pdf->setPaper([0, 0, 700, 490]); // Width, Height in millimeters
        // Return the PDF as a stream (for testing)
        return $pdf->stream('certificate.pdf');
    }


    // Controller method for generating and downloading PDF
    public function generateSaveAndDownloadReportAjax($id)
    {
        $pdfPath = storage_path('app/pdf_reports/');
        $pdfFileName = 'report_' . $id . '.pdf';

        // Check if the PDF file already exists
        if (Storage::exists('pdf_reports/' . $pdfFileName)) {
            // If the file exists, return its relative path
            return response()->json(['pdf_path' => 'storage/pdf_reports/' . $pdfFileName]);
        }

        // If the file doesn't exist, generate and save the PDF
        $re = QuizResult::where('unique_key', $id)->first();

        if ($re) {
            $data = [
                'result' => Results::Get($re->id, 'total'),
                'name' => $re->user->name,
                'unique' => $re->unique_key,
                'date' => $re->created_at,
                'id' => $re->id,
            ];

            $htmlContent = view('pdf.report', $data)->render();

            // Generate the PDF
            $pdf = PDF::loadHTML($htmlContent);
            $pdf->setPaper([0, 0, 700, 490]); // Width, Height in millimeters

            // Save the PDF to a folder
            $pdf->save($pdfPath . $pdfFileName);

            // Return the generated PDF file path
            return response()->json(['pdf_path' => 'storage/pdf_reports/' . $pdfFileName]);
        }

        // If the QuizResult with the given ID is not found, return an error response
        return response()->json(['error' => 'Quiz result not found.']);
    }
}
