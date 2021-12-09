<?php 


	session_start();

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$fullname = $_POST['fullname'];

		$sToken = "your-api-key";
		$sMessage = "รายละเอียดการลงทะเบียน\n";
		$sMessage .= "User Email: " . $email . " \n";
		$sMessage .= "User Fullname: " . $fullname . " \n";
		$imageFile = new CURLFILE('img.jpeg');
		$sticker_package_id = '2';  // Package ID sticker
		$sticker_id = '34'; 

		$data  = array(
			'message' => $sMessage,
			'imageFile' => $imageFile,
			'stickerPackageId' => $sticker_package_id,
    		'stickerId' => $sticker_id
		);

		
		$chOne = curl_init(); 
		curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
		curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
		curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt( $chOne, CURLOPT_POST, 1); 
		curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data); 
		$headers = array( 'Content-type: multipart/form-data', 'Authorization: Bearer '.$sToken.'', );
		curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
		curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
		$result = curl_exec( $chOne ); 

		if ($result) {
			$_SESSION['success'] = "ส่งข้อมูลแจ้งเตือน Line Notify เรียบร้อยแล้ว!";
			header("location: index.php");
		} else {
			$_SESSION['error'] = "ส่งข้อมูลแจ้งเตือนผิดพลาด!";
			header("location: index.php");
		}

		//Result error 
		// if(curl_error($chOne)) 
		// { 
		// 	echo 'error:' . curl_error($chOne); 
		// } 
		// else { 
		// 	$result_ = json_decode($result, true); 
		// 	echo "status : ".$result_['status']; echo "message : ". $result_['message'];
		// } 
		// curl_close( $chOne );
	}


?>