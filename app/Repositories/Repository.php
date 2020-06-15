<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
abstract class Repository
{
 /** 注入的model */
 protected $model;
 /** @var string $modelName model名稱 */
 protected $modelName;
 /**
  * AbstractRepository constructor.
  */
 public function __construct()
 {
  $this->modelName = get_class($this->model);

  // dd($this->modelName);
 }
 /**
  * 根據pk找資料
  * @param $id
  * @param array $columns
  * @return mixed
  */
 public function find($id, $columns = ['*'])
 {
  return $this->model->find($id, $columns);
 }


 public function findOrFail($id, $with = [], $columns = ['*'])
 {
  return $this->model->with($with)->findOrFail($id, $columns);
 }
 /**
  * 根據一般欄位找資料
  * @param $attribute
  * @param $value
  * @param array $columns
  * @return Model
  */
 public function findBy($attribute, $value, $columns = ['*'])
 {
  return $this->model
   ->where($attribute, '=', $value)
   ->first($columns);
 }


 public function findDatas(array $value = [])
 {
  return $this->model
   ->whereIn('id', $value)
   ->get();
 }

 /**
  * 若存在則傳回 model，若不存在則新增
  * @param array $data
  * @return Model
  */
 public function firstOrCreate(array $data)
 {
  return $this->model->firstOrCreate($data);
 }
 /**
  * 回傳全部資料
  * @param array $columns
  * @return Collection
  */

    public function all(string $sort = 'desc', array $with = [])
 {
        return $this->model
                    ->with($with)
                    ->orderBy('created_at', $sort)
                    ->get();
 }
 /**
  * 回傳分頁資料
  * @param int $perPage
  * @param array $columns
  * @return Collection
  */
 // public function paginate($perPage = 15, $columns = ['*'])
 // {
 //  return $this->model->latest()->paginate($perPage, $columns);
 // }
 public function paginate($queries = [], $pp = 15, $with = [], $order = 'desc', $columns = ['*'])
    {
  $models = $this->model
      ->when($with != [], function($q) use($with) {
       $q->with($with);
      });


  if(isset($queries['keyword'])) {
   if(!is_null($queries['keyword'])) {
    try {
                    $models->whereTranslationLike($queries['column'], '%'.$queries['keyword'].'%');
                } catch (\Throwable $e){
                    $models;
                }
   }
  }
  unset($queries['keyword']);
  unset($queries['column']);

  foreach ($queries as $key => $value) {
   $models->when(!is_null($value), function($q) use($key, $value){
    $q->where($key, $value);
   });
  }

        return $models
                ->orderBy('created_at', $order)
                ->paginate($pp, $columns);
    }
 /**
  * 新增資料，傳回 model，不存檔
  * @param array $data
  * @return Model
  */
 public function new()
 {
  // return new $this->modelName($data);

  return new $this->model;
 }
 /**
  * 新增資料，回傳 model，直接存檔
  * @param array $data
  * @return Model
  */
 public function create(array $data = [])
 {
  return $this->model->create($data);
 }
 /**
  * 修改資料，回傳 model，直接存檔
  * @param array $data
  * @param $id
  * @param string $attribute
  * @return Model
  */
 public function update(array $data, $id, $attribute = "id")
 {

  return $this->model
   ->where($attribute, '=', $id)
   ->update($data);
 }
 /**
  * 刪除資料，回傳 model，直接刪除
  * @param $id
  * @return Model
  */
//  public function delete($id)
//  {
//   return $this->model->delete($id);
//  }

 public function destroy($id)
 {
  return $this->model->destroy($id);
 }


 public function fillSave($data, $id = null)
 {
  if(!is_null($id)){
   $this->model = $this->model->find($id);
  }
  $this->model->fill($data);
  $this->model->save();

  return $this->model;
 }

  public function allByOrder($queries = [], $with = [])
  {
      $models = $this->model->with($with);

      foreach ($queries as $key => $value) {

          $models->when(!is_null($value), function($q) use($key, $value){

              $q->where($key, $value);


          });
      }

      return $models
                  ->orderBy('rank', 'asc')
                  ->orderBy('id', 'asc')
                  ->get();
  }


}
