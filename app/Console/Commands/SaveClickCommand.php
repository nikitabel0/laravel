<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Click;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClickMail;

class SaveClickCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:save-click-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $article_count = Click::count();
        Click::whereNotNull('id')->delete();
        $commemt_count = Comment::whereDate('created_at', Carbon::today())->count();
        Mail::to('ndbeliaev04012005@mail.ru')->send(new ClickMail($article_count,$commemt_count));
    }
}
