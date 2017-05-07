<?php
            if($_POST['Name']!="" and $_POST['Email']!="" and $_POST['Subject']!="" and $_POST['Message']!="") {
                  $empf = "info@burzlaffdesign.com";
                  $betreff = $_POST['Subject'];
                  $from = "From: ";
                  $from .= $_POST['Name'];
                  $from .= " <";
                  $from .= $_POST['Email'];
                  $from .= ">\n";
                  $from .= "Reply-To: ";
                  $from .= $_POST['Email'];
                  $from .= "\n";
                  $from .= "Content-Type: text/html\n";
                  $text = $_POST['Message'];
                   
                  mail($empf, $betreff, $text, $from);
                  echo "Thank you - your message has been sent!";
            } else {
                  echo "please fill out all fields...";
            }
?>