<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\QuizResult;
use App\Helpers\Results;
use PDF;
use Illuminate\Support\Facades\Storage;


class GenerateAndSaveReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $uniqueKey;

    public function __construct($uniqueKey)
    {
        $this->uniqueKey = $uniqueKey;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $re = QuizResult::where('unique_key', $this->uniqueKey)->first();

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
            // $pdfPath = storage_path('app/pdf_reports/');
            // $pdfFileName = 'report_' . $re->unique_key . '.pdf';
            // $pdf->save($pdfPath . $pdfFileName);
            
            
                        $pdfPath = public_path('pdf_reports/');
            $pdfFileName = 'report_' . $re->unique_key . '.pdf';
            $pdf->save($pdfPath . $pdfFileName);
        }
    }
}
