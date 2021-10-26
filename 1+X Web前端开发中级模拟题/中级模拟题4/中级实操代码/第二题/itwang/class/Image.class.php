<?php
/**
 file: image.class.php 类名为Image
 图像处理类，可以完成对各种类型的图像进行缩放、加图片水印和剪裁的操作。
 http://www.lai18.com
 */
class Image {
	/* 图片保存的路径 */
	private $path;

	/**
	 * 实例图像对象时传递图像的一个路径，默认值是当前目录
	 * @param  string $path  可以指定处理图片的路径
	 */
	function __construct($path = "./") {
		$this -> path = rtrim($path, "/") . "/";
	}

	/**
	 * 对指定的图像进行缩放
	 * @param  string $name  是需要处理的图片名称
	 * @param  int $width   缩放后的宽度
	 * @param  int $height   缩放后的高度
	 * @param  string $qz   是新图片的前缀
	 * @return mixed      是缩放后的图片名称,失败返回false;
	 */
	function thumb($name, $width, $height, $qz = "th_") {
		/* 获取图片宽度、高度、及类型信息 */
		$imgInfo = $this -> getInfo($name);
		/* 获取背景图片的资源 */
		$srcImg = $this -> getImg($name, $imgInfo);
		/* 获取新图片尺寸 */
		$size = $this -> getNewSize($name, $width, $height, $imgInfo);
		/* 获取新的图片资源 */
		$newImg = $this -> kidOfImage($srcImg, $size, $imgInfo);
		/* 通过本类的私有方法，保存缩略图并返回新缩略图的名称，以"th_"为前缀 */
		return $this -> createNewImage($newImg, $qz . $name, $imgInfo);
	}

	/**
	 * 为图片添加水印
	 * @param  string $groundName 背景图片，即需要加水印的图片，暂只支持GIF,JPG,PNG格式
	 * @param  string $waterName 图片水印，即作为水印的图片，暂只支持GIF,JPG,PNG格式
	 * @param  int $waterPos    水印位置，有10种状态，0为随机位置；
	 *                1为顶端居左，2为顶端居中，3为顶端居右；
	 *                4为中部居左，5为中部居中，6为中部居右；
	 *                7为底端居左，8为底端居中，9为底端居右；
	 * @param  string $qz     加水印后的图片的文件名在原文件名前面加上这个前缀
	 * @return  mixed        是生成水印后的图片名称,失败返回false
	 */
	function waterMark($groundName, $waterName, $waterPos = 0, $qz = "wa_") {
		/*获取水印图片是当前路径，还是指定了路径*/
		$curpath = rtrim($this -> path, "/") . "/";
		$dir = dirname($waterName);
		if ($dir == ".") {
			$wpath = $curpath;
		} else {
			$wpath = $dir . "/";
			$waterName = basename($waterName);
		}

		/*水印图片和背景图片必须都要存在*/
		if (file_exists($curpath . $groundName) && file_exists($wpath . $waterName)) {
			$groundInfo = $this -> getInfo($groundName);
			//获取背景信息
			$waterInfo = $this -> getInfo($waterName, $dir);
			//获取水印图片信息
			/*如果背景比水印图片还小，就会被水印全部盖住*/
			if (!$pos = $this -> position($groundInfo, $waterInfo, $waterPos)) {
				echo '水印不应该比背景图片小！';
				return false;
			}

			$groundImg = $this -> getImg($groundName, $groundInfo);
			//获取背景图像资源
			$waterImg = $this -> getImg($waterName, $waterInfo, $dir);
			//获取水印图片资源

			/* 调用私有方法将水印图像按指定位置复制到背景图片中 */
			$groundImg = $this -> copyImage($groundImg, $waterImg, $pos, $waterInfo);
			/* 通过本类的私有方法，保存加水图片并返回新图片的名称，默认以"wa_"为前缀 */
			return $this -> createNewImage($groundImg, $qz . $groundName, $groundInfo);

		} else {
			echo '图片或水印图片不存在！';
			return false;
		}
	}

	/**
	 * 在一个大的背景图片中剪裁出指定区域的图片
	 * @param  string $name  需要剪切的背景图片
	 * @param  int $x     剪切图片左边开始的位置
	 * @param  int $y     剪切图片顶部开始的位置
	 * @param  int $width   图片剪裁的宽度
	 * @param  int $height   图片剪裁的高度
	 * @param  string $qz   新图片的名称前缀
	 * @return  mixed      裁剪后的图片名称,失败返回false;
	 */
	function cut($name, $x, $y, $width, $height, $qz = "cu_") {
		$imgInfo = $this -> getInfo($name);
		//获取图片信息
		/* 裁剪的位置不能超出背景图片范围 */
		if ((($x + $width) > $imgInfo['width']) || (($y + $height) > $imgInfo['height'])) {
			echo "裁剪的位置超出了背景图片范围!";
			return false;
		}

		$back = $this -> getImg($name, $imgInfo);
		//获取图片资源
		/* 创建一个可以保存裁剪后图片的资源 */
		$cutimg = imagecreatetruecolor($width, $height);
		/* 使用imagecopyresampled()函数对图片进行裁剪 */
		imagecopyresampled($cutimg, $back, 0, 0, $x, $y, $width, $height, $width, $height);
		imagedestroy($back);
		/* 通过本类的私有方法，保存剪切图并返回新图片的名称，默认以"cu_"为前缀 */
		return $this -> createNewImage($cutimg, $qz . $name, $imgInfo);
	}

	/* 内部使用的私有方法，用来确定水印图片的位置 */
	private function position($groundInfo, $waterInfo, $waterPos) {
		/* 需要加水印的图片的长度或宽度比水印还小，无法生成水印 */
		if (($groundInfo["width"] < $waterInfo["width"]) || ($groundInfo["height"] < $waterInfo["height"])) {
			return false;
		}
		switch($waterPos) {
			case 1 :
				//1为顶端居左
				$posX = 0;
				$posY = 0;
				break;
			case 2 :
				//2为顶端居中
				$posX = ($groundInfo["width"] - $waterInfo["width"]) / 2;
				$posY = 0;
				break;
			case 3 :
				//3为顶端居右
				$posX = $groundInfo["width"] - $waterInfo["width"];
				$posY = 0;
				break;
			case 4 :
				//4为中部居左
				$posX = 0;
				$posY = ($groundInfo["height"] - $waterInfo["height"]) / 2;
				break;
			case 5 :
				//5为中部居中
				$posX = ($groundInfo["width"] - $waterInfo["width"]) / 2;
				$posY = ($groundInfo["height"] - $waterInfo["height"]) / 2;
				break;
			case 6 :
				//6为中部居右
				$posX = $groundInfo["width"] - $waterInfo["width"];
				$posY = ($groundInfo["height"] - $waterInfo["height"]) / 2;
				break;
			case 7 :
				//7为底端居左
				$posX = 0;
				$posY = $groundInfo["height"] - $waterInfo["height"];
				break;
			case 8 :
				//8为底端居中
				$posX = ($groundInfo["width"] - $waterInfo["width"]) / 2;
				$posY = $groundInfo["height"] - $waterInfo["height"];
				break;
			case 9 :
				//9为底端居右
				$posX = $groundInfo["width"] - $waterInfo["width"];
				$posY = $groundInfo["height"] - $waterInfo["height"];
				break;
			case 0 :
			default :
				//随机
				$posX = rand(0, ($groundInfo["width"] - $waterInfo["width"]));
				$posY = rand(0, ($groundInfo["height"] - $waterInfo["height"]));
				break;
		}
		return array("posX" => $posX, "posY" => $posY);
	}

	/* 内部使用的私有方法，用于获取图片的属性信息（宽度、高度和类型） */
	private function getInfo($name, $path = ".") {
		$spath = $path == "." ? rtrim($this -> path, "/") . "/" : $path . '/';

		$data = getimagesize($spath . $name);
		$imgInfo["width"] = $data[0];
		$imgInfo["height"] = $data[1];
		$imgInfo["type"] = $data[2];

		return $imgInfo;
	}

	/*内部使用的私有方法， 用于创建支持各种图片格式（jpg,gif,png三种）资源 */
	private function getImg($name, $imgInfo, $path = '.') {

		$spath = $path == "." ? rtrim($this -> path, "/") . "/" : $path . '/';
		$srcPic = $spath . $name;

		switch ($imgInfo["type"]) {
			case 1 :
				//gif
				$img = imagecreatefromgif($srcPic);
				break;
			case 2 :
				//jpg
				$img = imagecreatefromjpeg($srcPic);
				break;
			case 3 :
				//png
				$img = imagecreatefrompng($srcPic);
				break;
			default :
				return false;
				break;
		}
		return $img;
	}

	/* 内部使用的私有方法，返回等比例缩放的图片宽度和高度，如果原图比缩放后的还小保持不变 */
	private function getNewSize($name, $width, $height, $imgInfo) {
		$size["width"] = $imgInfo["width"];
		//原图片的宽度
		$size["height"] = $imgInfo["height"];
		//原图片的高度

		if ($width < $imgInfo["width"]) {
			$size["width"] = $width;
			//缩放的宽度如果比原图小才重新设置宽度
		}

		if ($height < $imgInfo["height"]) {
			$size["height"] = $height;
			//缩放的高度如果比原图小才重新设置高度
		}
		/* 等比例缩放的算法 */
		if ($imgInfo["width"] * $size["width"] > $imgInfo["height"] * $size["height"]) {
			$size["height"] = round($imgInfo["height"] * $size["width"] / $imgInfo["width"]);
		} else {
			$size["width"] = round($imgInfo["width"] * $size["height"] / $imgInfo["height"]);
		}

		return $size;
	}

	/* 内部使用的私有方法，用于保存图像，并保留原有图片格式 */
	private function createNewImage($newImg, $newName, $imgInfo) {
		$this -> path = rtrim($this -> path, "/") . "/";
		switch ($imgInfo["type"]) {
			case 1 :
				//gif
				$result = imageGIF($newImg, $this -> path . $newName);
				break;
			case 2 :
				//jpg
				$result = imageJPEG($newImg, $this -> path . $newName);
				break;
			case 3 :
				//png
				$result = imagePng($newImg, $this -> path . $newName);
				break;
		}
		imagedestroy($newImg);
		return $newName;
	}

	/* 内部使用的私有方法，用于加水印时复制图像 */
	private function copyImage($groundImg, $waterImg, $pos, $waterInfo) {
		imagecopy($groundImg, $waterImg, $pos["posX"], $pos["posY"], 0, 0, $waterInfo["width"], $waterInfo["height"]);
		imagedestroy($waterImg);
		return $groundImg;
	}

	/* 内部使用的私有方法，处理带有透明度的图片保持原样 */
	private function kidOfImage($srcImg, $size, $imgInfo) {
		$newImg = imagecreatetruecolor($size["width"], $size["height"]);
		$otsc = imagecolortransparent($srcImg);
		if ($otsc >= 0 && $otsc < imagecolorstotal($srcImg)) {
			$transparentcolor = imagecolorsforindex($srcImg, $otsc);
			$newtransparentcolor = imagecolorallocate($newImg, $transparentcolor['red'], $transparentcolor['green'], $transparentcolor['blue']);
			imagefill($newImg, 0, 0, $newtransparentcolor);
			imagecolortransparent($newImg, $newtransparentcolor);
		}
		imagecopyresized($newImg, $srcImg, 0, 0, 0, 0, $size["width"], $size["height"], $imgInfo["width"], $imgInfo["height"]);
		imagedestroy($srcImg);
		return $newImg;
	}

}
?>