<IDOCTYPE html>
     <html lang="en"> 
     <head>
        <meta charset="UTF-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Array secara asosiatif</title> 
    </head> 
    <body> 
        <form action="proses_select.php" method="post"> 
            <select name="tanggal"> 
                <!--<option value="1"><option> 
                <option value="1"><option> 
                <option value="1"><option> 
                <option value="1"><option> 
                <option value="1"><option>--> 
                <?php 
                for($i=1;$i<32;$i++){ 
                    echo "<option value='$i>$i<option>";
                } 
                ?> 
                </select> 
                <input type="submit" value="kirim"> 
                </form>
             </body> 
             </html>