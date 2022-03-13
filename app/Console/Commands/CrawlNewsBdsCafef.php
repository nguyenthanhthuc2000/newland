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
    protected $signature = 'sync:newsCafeF';

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
            $author = '';
            $source = '';

            //Lấy link gốc của bài viết
            $source = $content1->filter('#form1')->each(function ($s) {
                $str = '';
                try {
                    $str = $s->filter('.link-source-full')->html();
                } catch (\Exception $e){

                }
                return $str;
            });

            //Lấy tên tác giả
            $author = $content1->filter('#form1 .author')->each(function ($a) {
                return $a->html();
            });

            //Lấy nội dung bài viết
            $contents = $content1->filter('#form1 #mainContent')->each(function ($n1) {

                $str = '';
                try {
                    //Lấy nội dung thừa
                    $str = $n1->filter('.link-content-footer')->html();
                } catch (\Exception $e){

                }

                return [$str, $n1->html()];
            });


            if(isset($contents)){
                //Loại bõ nội dung thừa
                if($contents[0][0] != ''){
                    $content = str_replace($contents[0][0], '', $contents[0][1]);
                }
                else{
                    $content = $contents[0][1];
                }

                //Lấy nguồn gốc cần lưu
                $outputSource = '';
                if(isset($source[0])){
                    $outputSource = $source[0];
                }
                else{
                    $outputSource = $url;
                }

                //Tạo mã code cho từng bài viết
                $code = substr(md5(microtime()),rand(0,5), 7);
                $slug = slug($title).'-'.$code;

                $data = [
                    'title' => $title,
                    'slug' => $slug,
                    'code' => $code,
                    'photo' => $img,
                    'author' => str_replace('  ', '', $author[0]) ,
                    'source' => str_replace(' ', '', $outputSource),
                    'content' => $content,
                    'status' => 1,
                    'crawl' => 1,
                    'auto' => 1
                ];

                //KIểm tra có tồn tại bài viết chưa
                $check = $this->postRepo->findByAttributes(['title' => $title]);
                if(!$check){
                    if(!$this->postRepo->create($data)){

                    }
                }
            }
        });
        $this->info('Crawl news successfully');
    }
}
