<?php
          $CountFile = "access.log";
          $CF = fopen ($CountFile, "r");
          $Views = fread ($CF, filesize ($CountFile));
          fclose ($CF);
          $Views++; 

          $CF = fopen ($CountFile, "w");
          fwrite ($CF, $Views); 
          fclose ($CF); 
          echo "<b>Số lượt truy cập: </b>";
          echo ($Views);
?>