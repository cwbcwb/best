<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\Admin\Auth;
use DB;
class ExeclController extends Controller{
	public function export(){
		$cellData=array(
			//只给值就行
			array('序号','题干','分数'),
			array('1','AAAAA','55'),
			array('2','BBBBB','55'),
			array('3','CCCCC','55'),
			array('4','DDDDD','55'),
			array('5','EEEEE','55'),
		);
		Excel::create('文件名',function($excel) use ($cellData){
            $excel->sheet('sheet', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');

	}
	public function import(){
		//给路径，通过webuploader上传可以通过隐藏域获得其路径，在下方填写
		$filePath = 'storage/exports/'.iconv('UTF-8', 'GBK', '用户信息').'.xls';
        Excel::load($filePath, function($reader) {
			//从表中读出数据存入数据库
            //$data = $reader->all();
            $data = $reader->getSheet(0)->toArray();
			$temp=array();
			foreach($data as $k=>$v){
				//开始封装,除了第一行剩下的全是数据
				if($k == '0'){
					continue;
				}
				$temp[]=array(
					//与数据库选项一一对应即可
					''
				);
				
			}
			$result=DB::table('表名')->insert($temp);
			//return $result?1:0;这里可能不好使，用下面的方法比较好一点
			echo $result?1:0;
        });
	}
}