<?php

//这是一个验证码的类
class  Captcha {
	private $width;
	private $height;
	private $codeNum;
	//数量
	private $code;
	//验证码字符
	private $im;
	//资源

	//初始化
	function __construct($width = 80, $height = 30, $codeNum = 4) {
		$this -> width = $width;
		$this -> height = $height;
		$this -> codeNum = $codeNum;
	}

	//画验证码
	function showImg() {
		//创建画布背景
		$this -> createImg();
		//		画字符
		$this -> setCaptcha();
		//		画干扰元素
		$this -> setDisturb();
		//		输出
		$this -> outputImg();
	}

	//获取验证码
	function getCaptcha() {
		return strtolower($this -> code);
	}

	private function createImg() {
		$this -> im = imagecreatetruecolor($this -> width, $this -> height);
		$bgcolor = imagecolorallocate($this -> im, rand(0, 20), rand(0, 20), rand(0, 20));
		imagefill($this -> im, 0, 0, $bgcolor);
	}

	private function outputImg() {
		if (imagetypes() & IMG_PNG) {
			header("content-type:image/png");
			imagepng($this -> im);
			imagedestroy($this -> im);
		} elseif (imagetypes() & IMG_JPG) {
			header("content-type:image/jpeg");
			imagepng($this -> im);
			imagedestroy($this -> im);
		} elseif (imagetypes() & IMG_GIF) {
			header("content-type:image/gif");
			imagepng($this -> im);
			imagedestroy($this -> im);
		} else {
			die("不支持的格式");
		}
	}

	//创建字符
	private function createCode() {
		$str = "abcdefghijkmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXYZ03456789";
		for ($i = 0; $i < $this -> codeNum; $i++) {
			$this -> code .= $str{rand(0, strlen($str) - 1)};
		}
	}

	//画字符
	private function setCaptcha() {
		$this -> createCode();
		for ($i = 0; $i < $this -> codeNum; $i++) {
			$color = imagecolorallocate($this -> im, rand(50, 250), rand(50, 250), rand(50, 250));
			$size = rand(floor($this -> height / 5), floor($this -> height / 3));
			$x = floor($this -> width / $this -> codeNum) * $i + 5;
			$y = rand(0, $this -> height - 20);
			imagechar($this -> im, $size, $x, $y, $this -> code{$i}, $color);
		}
	}

	private function setDisturb() {
		//干扰点
		$area = $this -> width * $this -> height / 20;
		$num = ($area > 250) ? 250 : $area;
		for ($i = 0; $i < $num; $i++) {
			$color = imagecolorallocate($this -> im, rand(50, 250), rand(50, 250), rand(50, 250));
			imagesetpixel($this -> im, rand(1, $this -> width - 2), rand(1, $this -> height - 2), $color);
		}
		for ($i = 0; $i <= 5; $i++) {
			$color = imagecolorallocate($this -> im, rand(50, 250), rand(50, 250), rand(50, 250));
			imagearc($this -> im, rand(0, $this -> width), rand(0, $this -> height), rand(30, 300), rand(30, 300), 50, 30, $color);
		}
	}

}
?>