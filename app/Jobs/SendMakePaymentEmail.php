<?php

namespace App\Jobs;

use App\Models\QuizResult;
use App\Models\UserDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMakePaymentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data = null;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info('Mail sending code called');
        
        $user = UserDetail::where('quiz_key',$this->data['quiz_key'])->where('user_id',null)->first();
        if($user){  // payment not done, send the mail

            $result = QuizResult::where('unique_key',$this->data['quiz_key'])->first();
            $result->update(['email_sent_at'=>$this->data->email]);
            Mail::send('email.unique_link',$this->data ,  function ($message){
                $message->to($this->data->email)
                    ->subject('Get your IQ score and certificate');
            });

        }
        
    }
}
