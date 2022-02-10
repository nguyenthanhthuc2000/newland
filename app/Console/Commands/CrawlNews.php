<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repository\Posts\PostRepositoryInterface;

class CrawlNews extends Command
{
    protected $postRepo;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:crawlNews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crawl News';

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
        //Trang cần lấy dữ liệu
        $page = 1;
        for ($page; $page < 3; $page++){

            $crawler = \Goutte::request('GET', 'https://cafeland.vn/tin-tuc/page-'.$page.'/');

            //Lấy danh sách bài viết
            $crawler->filter('.left-col .box-content .list-type-14 li')->each(function ($node) {
                //Lấy url, img, title bài viết
                $title = $node->filter('h3')->text();
                $url = $node->filter('h3 > a', 0)->attr('href');
                $img = $node->filter('img')->attr('data-src');

                if(strpos( $url, 'https://cafeland.vn/tin-tuc') !== false){
                    //Lưu thông tin bài viết
                    $content1 = \Goutte::request('GET', $url);
                    $content2 = \Goutte::request('GET', $url);
                    //Thấy có 2 box chứa nội dung
                    $content = '';
                    $contents = $content1->filter('#sevenBoxNewContentInfo')->each(function ($n1) {
                        return $n1->html();
                    });
                    if(isset($contents[0])){
                        $content = $contents[0];
                    }
                    else{
                        $valContent2 = $content2->filter('#sevenBoxNewContentInfoNo')->each(function ($n2) {
                            return $n2->html();
                        });
                        $content = $valContent2[0];
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
                            dd($data);
                        }
                    }
                }

            });
        }

        $this->info('Crawl news successfully');
    }
}
