<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Filters\ArticleFilter;
use Str;
class Article extends Model
{
    use HasFactory;
    protected $table = 'article';
    protected $guarded = [];
    public $timestamps = true;
    protected $perPage = 8;

    public function scopeFilters($query, $request)
    {
        $param = $request->all();
        foreach ($param as $field => $value) {
            $method = 'filter' . Str::studly($field);

            if ($value != '') {
                if (method_exists($this, $method)) {
                    $this->{$method}($query, $value);
                } else {
                    if (!empty($this->filterable) && is_array($this->filterable)) {
                        if (in_array($field, $this->filterable)) {
                            $query->where($this->table . '.' . $field, $value);
                        } elseif (key_exists($field, $this->filterable)) {
                            $query->where($this->table . '.'
                                . $this->filterable[$field], $value);
                        }
                    }
                }
            }
        }

        return $query;
    }

    public function imagesArticle(){
        return $this->hasMany(ImagesArticle::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function scopePrice($query, $from, $to, $negotiable){
        if($negotiable){
            $query->where('unit', 'Thỏa thuận');
            return $query;
        }
        else if($to && !$negotiable){
            $query->whereBetween('price', [$from, $to]);
            return $query;
        }
        else {
            $query->where('price', '>', $from);
            return $query;
        }
    }

    public function scopeFilter($query, $request){
        if(isset($request['hinh-thuc'])){
            $query->where('form', $request['hinh-thuc']);
        }
        if(isset($request['id-danh-muc'])){
            $query->where('category_id', $request['id-danh-muc']);
        }
        if(isset($request['id-khu-vuc'])){
            $query->where('province_id', $request['id-khu-vuc']);
        }
        if(isset($request['muc-gia'])){
            if($request['muc-gia'] == 'Thỏa thuận'){
                $query->where('unit', 'Thỏa thuận');
            }
            else {
                $query->where('price', $request['muc-gia']);
            }
        }
        if(isset($request['dien-tich'])){
            $query->where('acreage', $request['dien-tich']);
        }
        if(isset($request['trang-thai'])){
            $query->where('status', $request['trang-thai'])->paginate();
        }

        if(isset($request['tinh-trang'])){
            $query->where('state', $request['tinh-trang'])->paginate();
        }
        return $query;
    }

    protected $filterable = [
        'status',
        'vip',
        'featured',
        'state',
        'created_at',
    ];
}
