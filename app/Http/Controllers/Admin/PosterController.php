<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use phpqrcode;

class PosterController extends Controller
{
	/**
	 * ʵ�ֺ���
	 *
	 * @param string $post_url ������ͼ����ַ
	 * @param string $qrcode_text ��ά������
	 * @param string $qrcode_x ��ά���ں����еĺ�����
	 * @param string $qrcode_y ��ά���ں����е�������
	 *
	 * @return void 
	 */
	public function getPoster( Request $request ) {
		$post_url = $request->get('post_url');
		$qrcode_text = $request->get('qrcode_text');
		$qrcode_x = $request->get('qrcode_x');
		$qrcode_y = $request->get('qrcode_y');
		$img = new \QRcode();
		//�ݴ��� 
		$errorCorrectionLevel = 'L';
		// ����ͼƬ��С
		$matrixPointSize = 3;  
		//��ά��ͼƬ����
		$qrcode_name = 'qrcode.png';
		//���ɶ�ά��ͼƬ 
		$img->png($qrcode_text, $qrcode_name, $errorCorrectionLevel, $matrixPointSize);
		$backgroundInfo = getimagesize($post_url);
		$backgroundFun = 'imagecreatefrom'.image_type_to_extension($backgroundInfo[2], false);
		$background = $backgroundFun($post_url);
		$backgroundWidth = imagesx($background); //�������
		$backgroundHeight = imagesy($background); //�����߶�
		$imageRes = imageCreatetruecolor($backgroundWidth, $backgroundHeight);
		$color = imagecolorallocate($imageRes, 0, 0, 0);
		imagefill($imageRes, 0, 0, $color);
		imagecopy($imageRes, $background, 0, 0, 0, 0, $backgroundWidth, $backgroundHeight);
		$code = public_path().'/'.$qrcode_name;
		$src_img = imagecreatefrompng($code);
		//ͨ��php�ĺ���imagesx()���ͼ����Դ�Ŀ�ȡ�imagesy()���ͼ����Դ�ĸ߶�
		$src_w = imagesx($src_img);
		$src_h = imagesy($src_img);
		imagecopy($imageRes, $src_img, $qrcode_x, $qrcode_y, 0, 0, $src_w, $src_h);
		//�������ֱ�����ͼ����Դ
		ob_clean();
		header("Content-Type:image/jpeg");
		imagejpeg($imageRes);
		//����ͼ����Դ
		imagedestroy($imageRes);
    }
}
