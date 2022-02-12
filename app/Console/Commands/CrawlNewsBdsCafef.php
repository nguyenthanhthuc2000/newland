<?php

namespace App\Console\Commands;

use App\Repository\Posts\PostRepositoryInterface;
use Illuminate\Console\Command;

class CrawlNewsBdsCafef extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:newsCafef';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl https://cafef.vn/bat-dong-san.chn';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        PostRepositoryInterface $postRepo
    )
    {
        parent::__construct();
        $this->postRepo = $postRepo;

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('max_execution_time', 360);
        $crawler = \Goutte::request('GET', 'https://cafef.vn/bat-dong-san.chn');
        $crawler->filter('#LoadListNewsCat .tlitem')->each(function ($node) {
            $title = $node->filter('h3')->text();
            $url = 'https://cafef.vn'.$node->filter('h3 > a', 0)->attr('href');
            $img = $node->filter('img')->attr('src');

            $content1 = \Goutte::request('GET', $url);
            $content = '';

            $contents = $content1->filter('#form1 #mainContent')->each(function ($n1) {

                $str = '';
                try {
                    $str = $n1->filter('.link-content-footer')->html();
                } catch (\Exception $e){

                }

                return [$str, $n1->html()];
            });


            if(isset($contents)){
                if($contents[0][0] != ''){
                    $content = str_replace($contents[0][0], '', $contents[0][1]);
                }
                else{
                    $content = $contents[0][1];
                }

                $code = substr(md5(microtime()),rand(0,5), 7);
                $slug = slug($title).'-'.$code;

                $data = [
                    'title' => $title,
                    'slug' => $slug,
                    'code' => $code,
                    'photo' => $img,
                    'author' => $url,
                    'content' => $content,
                    'status' => 1
                ];

                $check = $this->postRepo->findByAttributes(['title' => $title]);
                if(!$check){
                    if(!$this->postRepo->create($data)){

                    }
                }
            }
        });
    }
}
