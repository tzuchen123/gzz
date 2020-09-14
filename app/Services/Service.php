<?php

namespace App\Services;

use Illuminate\Support\Arr;


abstract class Service
{
    protected $imageRepo;

    public function all()
    {
        return $this->repo->all();
    }

    public function paginate(array $queries = [], $pp = 15, $with = [], $order = 'desc', $columns = ['*'])
    {
        return $this->repo->paginate($queries, $pp, $with, $order, $columns);
    }

    public function new()
    {
        return $this->repo->new();
    }

    public function findById($id)
    {

        return $this->repo->findOrFail($id);
    }

    public function getOnlineDataById($id, $with = [])
    {
        $model = $this->repo->findOrFail($id, $with);

        if ($model->status != 1) {
            abort(404);
        }
        return $model;
    }


    // data => form data
    // name => field name
    // model => updated model (not save)
    public function uploadImage(&$data, $name, $folderName, $width, &$model = null)
    {
        // return data, if data not contain img
        if (!isset($data[$name])) {
            return $data;
        }


        if (is_null($model)) {
            $data[$name] = $this->imageHandlerService->save($data[$name], $folderName, $width)['path'];
        } else {
            $data[$name] = $this->imageHandlerService->save($data[$name], $folderName, $width, $model[$name])['path'];
            $model[$name] = $data[$name];
        }
        return $data;
    }

    public function updateRank($data, $id)
    {
        if (is_null($data['rank'])) {
            $data['rank'] = 1;
        }
        if ($data['rank'] < 0) {
            $data['rank'] = 1;
        }

        return $this->repo->update($data, $id);
    }

    public function updateStatus($data, $id)
    {
        return $this->repo->update($data, $id);
    }



    public function translationSave($data, &$model, $locale = 'zh-TW')
    {

        foreach ($data as $k => $value) {
            $model->{"$k:$locale"} = $data[$k];
        }
        $model->save();

        return $model;
    }

    public function hasTranslation($id, $locale)
    {
        $model = $this->repo->find($id);

        return $model->hasTranslation($locale);
    }

    public function destroyLocale($modelId, $locale)
    {
        $model = $this->repo->find($modelId);

        return $model->deleteTranslations($locale);
    }

    public function giveIdForImageInText($content, $id)
    {
        $ptn = '/<img src="([^"]+)"/';
        $str = $content;
        preg_match_all($ptn, $str, $matches);

        foreach ($matches[1] as $url) {
            $model = $this->imageRepo->findBy('url', $url);
            $model->update(['imageable_id' => $id]);
        }

        return $matches[1];
    }


    public function delete($id, array $imgs = [])
    {
        $model = $this->repo->find($id);

        // 刪除圖片
        if(count($imgs) != 0) {
            foreach ($imgs as $img) {
                $this->imageHandlerService->delete($model[$img]);
            }
        }
       
        return $this->repo->delete($id);

    }

    public function destroy($id, array $imgs = [])
    {
        $model = $this->repo->find($id);

        // 刪除圖片
        if (count($imgs) != 0) {
            foreach ($imgs as $img) {
                $this->imageHandlerService->destroy($model[$img]);
            }
        }

        return $this->repo->destroy($id);
    }


    public function bulkDelete($ids)
    {
        $ids = explode(",", $ids);

        foreach ($ids as $id) {
            $this->delete($id);
        }

        return true;
    }

    public function uploadAllImageInData(&$data, $folderName, $model = null, $width = 2048)
    {
        foreach ($data as $key => $value) {
            if (!is_array($data[$key])) {
                if (is_file($data[$key])) {
                    if (is_null($model)) {
                        $data = $this->uploadImage($data, $key, $folderName, $width);
                    } else {
                        $data = $this->uploadImage($data, $key, $folderName, $width, $model);
                    }
                }
            }
        }

        return $data;
    }


    public function getNonTransData($data, array $fields)
    {

        foreach ($data as $key => $value) {
            if (!in_array($key, $fields)) {
                unset($data[$key]);
            }
        }
        return $data;
    }

    public function getTransData($data, array $fields)
    {

        foreach ($data as $key => $value) {
            if (!in_array($key, $fields)) {
                unset($data[$key]);
            }
        }
        return $data;
    }


    public function covertToJson(&$data, array $fields)
    {
        foreach ($fields as $key => $field) {
            if (!array_key_exists($field, $data)) {
                $data[$field] = [];
            }
            $data[$field] = json_encode($data[$field]);
        }

        return $data;
    }

    public function allByOrder(array $queries = [], $with = [])
    {
        return $this->repo->allByOrder($queries, $with);
    }

    public function checkNext($id)
    {
        $nextId = $id + 1;

        $location = $this->repo->find($nextId);

        if ($location == null) {
            return null;
        } else {
            return  $nextId;
        }
    }

    public function checkPrevious($id)
    {
        $nextId = $id - 1;

        $location = $this->repo->find($nextId);

        if ($location == null) {
            return null;
        } else {
            return  $nextId;
        }
    }

    public function checkLast($id)
    {
        $lastId = $id - 1;

        $location = $this->repo->find($lastId);

        if ($location == null) {
            return null;
        } else {
            return  $lastId;
        }
    }


    public function getInfos($id)
    {
        return $this->repo->getInfos($id);
    }


    public function getInfo($id)
    {
        return $this->repo->getInfo($id);
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function uploadVideo($data, $id)
    {

        // 取得檔案
        $file = Arr::get($data, 'video');

        // 抓檔名
        $filename = $file->getClientOriginalName();


        // 生成路徑
        $path = public_path('storage') . '/uploads/';

        // 移動檔案
        $file->move($path, $filename);

        //回傳路徑
        $path = '/storage/uploads/' . $filename;
        $data = ['video' => $path];

        // 把檔案路徑存到DB
        $this->repo->update($data, $id);

        return $path;
    }
}
