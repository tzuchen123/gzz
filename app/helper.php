<?php

function isCreate()
{
    // is 方法可以驗證接收到的請求 URI 與給定的規則是否相匹配。使用此方法時你可以將 * 符號作為萬用字元
    $isCreate = request()->is('*create*');
    return $isCreate;
}

function isEdit()
{
    $isEdit = request()->is('*edit*');
    return $isEdit;
}


function isImage( $url )
{
    $pos = strrpos( $url, ".");
    if ($pos === false)
        return false;
        $ext = strtolower(trim(substr( $url, $pos)));
        $imgExts = array(".gif", ".jpg", ".jpeg", ".png", ".tiff", ".tif"); // this is far from complete but that's always going to be the case...
        if ( in_array($ext, $imgExts) )
        return true;
    return false;
}



function countData($data)
{
    $data = $data->toArray();
    return count($data);
}
