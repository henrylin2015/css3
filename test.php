<?php
/**
 * @description:这个方法是读取本地的txt文件中的数据添加到数据库中
 * @author:henry
 * @create:2016年04月13日16:44:38
 */

class QueryTxtInsertMysql{
     private $_file;
     public function __construct($file){
                 $this->_file = $file;
            }
     /**
      * @description:检查文件是否存在
      */
     public function checkIsFile(  ){
                 if( !file_exists( $this->_file ) ){
                      return false;
                 }
                 return true;
            }

     /***
      * @description:把txt文件的数据转换为数组
      * @author:henry
      */
     public function txtToArray(  ){
                 if( $this->checkIsFile(  ) ){
                      $content = file_get_contents( $this->_file );
                      $content = explode( ',' ,$content);
                      echo "<pre>";
                      var_dump( $content );
                      exit(  );
                 }
                 echo "error";
                 exit(  );
            }
}

$file = "query.txt";
$query = new QueryTxtInsertMysql( $file );
echo $query->txtToArray(  );