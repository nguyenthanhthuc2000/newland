<?php
namespace App\Repository\Posts;

use App\Repository\BaseRepository;
use App\Models\Posts;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    //lấy model tương ứng
    public function getModel(){

        return new Posts();
    }

    public function getAllNews(){

        return $this->model->where('type', null)->orderBy('id', 'DESC')->paginate();
    }

    public function getByType($type){

        return $this->model->where('type', $type)->first();
    }
}
