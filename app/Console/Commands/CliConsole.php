<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class CliConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cli:run {script}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $db;
    private $lb;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->db = DB::connection('mysql');
        $this->lb = DB::connection('lb');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $script = $this->argument('script');
        $this->$script();
    }

    public function importArticle()
    {
        $articles = $this->lb->table('lb_articles')->get();

        $inserts = [];
        foreach ($articles as $article)
        {
            $inserts[] = [
                'src_id'           => $article->Id,
                'title'            => $article->title,
                'cate_id'          => $article->cate_id,
                'summary'          => $article->summary,
                'summary_original' => $article->summary_original,
                'content'          => $article->content,
                'content_original' => $article->content_original,
                'read_num'          => $article->read_num,
                'is_hidden'        => $article->is_hidden,
                'published_at'     => strtotime($article->published_at),
                'created_at'       => strtotime($article->created_at),
            ];
        }

        $this->db->table('t_articles')->insert($inserts);
    }

    public function importCategory()
    {
        $categories = $this->lb->table('lb_cates')->get();

        $inserts = [];
        foreach ($categories as $cate)
        {
            $inserts[] = [
                'id'         => $cate->Id,
                'pid'        => $cate->pid,
                'title'      => $cate->name,
                'created_at' => strtotime($cate->created_at),
            ];
        }

        $this->db->table('t_categories')->insert($inserts);
    }
}
