<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use phpqrcode;

class PosterController extends Controller
{
	/**
	 * 实现海报
	 *
	 * @param string $post_url 海报底图的网址
	 * @param string $qrcode_text 二维码内容
	 * @param string $qrcode_x 二维码在海报中的横坐标
	 * @param string $qrcode_y 二维码在海报中的纵坐标
	 *
	 * @return void 
	 */
	public function getPoster( Request $request ) {
		$post_url = $request->get('post_url');
		$qrcode_text = $request->get('qrcode_text');
		$qrcode_x = $request->get('qrcode_x');
		$qrcode_y = $request->get('qrcode_y');
		$img = new \QRcode();
		//容错级别 
		$errorCorrectionLevel = 'L';
		// 生成图片大小
		$matrixPointSize = 3;  
		//二维码图片名称
		$qrcode_name = 'qrcode.png';
		//生成二维码图片 
		$img->png($qrcode_text, $qrcode_name, $errorCorrectionLevel, $matrixPointSize);
		$backgroundInfo = getimagesize($post_url);
		$backgroundFun = 'imagecreatefrom'.image_type_to_extension($backgroundInfo[2], false);
		$background = $backgroundFun($post_url);
		$backgroundWidth = imagesx($background); //背景宽度
		$backgroundHeight = imagesy($background); //背景高度
		$imageRes = imageCreatetruecolor($backgroundWidth, $backgroundHeight);
		$color = imagecolorallocate($imageRes, 0, 0, 0);
		imagefill($imageRes, 0, 0, $color);
		imagecopy($imageRes, $background, 0, 0, 0, 0, $backgroundWidth, $backgroundHeight);
		$code = public_path().'/'.$qrcode_name;
		$src_img = imagecreatefrompng($code);
		//通过php的函数imagesx()获得图像资源的宽度、imagesy()获得图像资源的高度
		$src_w = imagesx($src_img);
		$src_h = imagesy($src_img);
		imagecopy($imageRes, $src_img, $qrcode_x, $qrcode_y, 0, 0, $src_w, $src_h);
		//在浏览器直接输出图像资源
		ob_clean();
		header("Content-Type:image/jpeg");
		imagejpeg($imageRes);
		//销毁图像资源
		imagedestroy($imageRes);
    }
}
