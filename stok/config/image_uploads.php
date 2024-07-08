<?php
    function uploadFiles($files){
        // fungsi tambahan untuk membaca array 
        if($files['name'][0] == ""){ // check apakah file ada atau tidak ada
            return "Please select at least one file";
        }

        $target_dir = "uploads/"; // Folder tempat menyimpan foto


        $names = $files['name']; // mengambil nama
        $tmp_names = $files['tmp_name']; // mengambil tmp nama dan alamatnya sebelum di upload

        // ini jika pakai multiple array
        // $files_array = array_combine($tmp_names, $names); // menggabungkannya
        
        // foreach($files_array as $tmp_folder => $image_name){ // memecahnya dan memasukkannya pada tmp folder
           
            $target_file = $target_dir . basename($names); // memilih tempatnya
            // Dapatkan timestamp saat ini
            $timestamp = time();
            // Dapatkan informasi file asli
            $file_info = pathinfo($names);
            $file_extension = $file_info['extension'];

            // Buat string acak
            $random_string = generateRandomString(5);

            // Buat nama file unik
            $image_name = $timestamp . '_' . $random_string . '.' . $file_extension;

            $target_file = $target_dir . basename($image_name); // memperbarui image name
            $check = getimagesize($tmp_names); // check size image
            if ($check !== false) {
                compressImage($tmp_names, $target_file, 20);

                // Create a thumbnail
                $target_thumbnail = $target_dir."thumbs/";
                if(!file_exists($target_thumbnail)){
                    mkdir($target_thumbnail, 0777, true);
                }
                // panggil fungsi create thumbnail
                createThumbnail($target_file, $target_thumbnail . "thumbnail_" . basename($image_name), 100, 100);
                
                // echo "The file " . htmlspecialchars(basename($image_name)) . " has been uploaded.";
            } else {
                // echo "File is not an image.";
            }
            return $image_name;
        // }


    }

    // fungsi untuk mendapatkan nama string unik
    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='fetifatimahdenysuprantiyono', ceil($length/strlen($x)) )), 1, $length);
    }

    // memeriksa rotasi
    function correctImageOrientation($image, $source) {
        $exif = @exif_read_data($source);
    
        if ($exif && isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];
    
            switch ($orientation) {
                case 3:
                    $image = imagerotate($image, 180, 0);
                    break;
    
                case 6:
                    $image = imagerotate($image, -90, 0);
                    break;
    
                case 8:
                    $image = imagerotate($image, 90, 0);
                    break;
            }
        }
    
        return $image;
    }
    

    // Function to compress image
function compressImage($source, $destination, $quality) {
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg' || $info['mime'] == 'image/jpg'){
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
    }  


     // Correct image orientation
     $image = correctImageOrientation($image, $source);
     
    // Save image
    imagejpeg($image, $destination, $quality);
    imagedestroy($image);
}

// Function to create thumbnail
function createThumbnail($source, $destination, $thumb_width, $thumb_height) {
    $info = getimagesize($source);

    if($info['mime'] == 'image/jpeg' || $info['mime'] == 'image/jpg'){
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
    }

    $width = imagesx($image);
    $height = imagesy($image);

    $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
    imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);

    // Save thumbnail
    imagejpeg($thumb, $destination, 80);
    imagedestroy($image);
    imagedestroy($thumb);
}
?> 