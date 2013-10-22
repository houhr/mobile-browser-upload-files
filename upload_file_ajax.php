<?php

/**
 * 利用上传文件时间生成唯一ID，用于解决用户一次选择多个文件时，文件名相同的问题
 * @return int Unix时间戳小数点右移四位取整
 */
function upload_time() {
    list($msec, $sec) = explode(" ", microtime());
    return ((int)$sec . (int)($msec * 10000));
}

if (!empty($_FILES['file']['name'])) {
    
    $file = $_FILES['file'];

    move_uploaded_file($file['tmp_name'], upload_time() . $file['name']);

}

?>