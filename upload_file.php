<?php

/**
 * 利用上传文件时间生成唯一ID，用于解决用户一次选择多个文件时，文件名相同的问题
 * @return int Unix时间戳小数点右移四位取整
 */
function upload_time() {
    list($msec, $sec) = explode(" ", microtime());
    return ((int)$sec . (int)($msec * 10000));
}

if (!empty($_FILES['files']['name'][0])) {
    
    $files = $_FILES['files'];

    for ($i = 0; $i < count($files['name']); $i++) { 
        
        if ($files['error'][$i] == 0) {

            move_uploaded_file($files['tmp_name'][$i], upload_time() . $files['name'][$i]);

        }
        
    }

}

?>