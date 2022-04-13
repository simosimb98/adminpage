<?php

if (isset($_POST['submitSendNewsletter']) && isset($_FILES) && (bool) $_FILES) {

    $allowedExtensions = array("pdf", "doc", "docx", "gif", "jpeg", "jpg", "png", "txt");

    $files = array();
    foreach ($_FILES as $name => $file) {
        $file_name = $file['name'];
        $temp_name = $file['tmp_name'];
        $file_type = $file['type'];
        $path_parts = pathinfo($file_name);
        $ext = $path_parts['extension'];
        if (!in_array($ext, $allowedExtensions)) {
            die("File $file_name has the extensions $ext which is not allowed");
        }
        array_push($files, $file);
    }

    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = "From: Maxon Auto Parts <maxon09987@gmail.com>";

    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";


    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
    $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
    $message .= "--{$mime_boundary}\n";

    // preparing attachments
    for ($x = 0; $x < count($files); $x++) {
        $file = fopen($files[$x]['tmp_name'], "rb");
        $data = fread($file, filesize($files[$x]['tmp_name']));
        fclose($file);
        $data = chunk_split(base64_encode($data));
        $name = $files[$x]['name'];
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" .
                "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" .
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        $message .= "--{$mime_boundary}\n";
    }
    // send

    require_once 'capdb.inc.php';

    $sql = "SELECT email FROM newsletter;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){

            $to = $row['email'];

            if(mail($to, $subject, $message, $headers)){
                header("Location: ../newsletter.php?newsletter=sent");
                exit();
            }else{
                header("Location: ../newsletter.php?newsletter=fail");
                exit();
            }

        }
    }
}