<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Records</title>
    <style>
         table{
            width: 70%;
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
           }
        table, tr, th, td{
            border: 1px solid #d4d4d4;
            background :#aaccff;
            color : #000;
            border-collapse: collapse;
            padding: 8px;
           }
        th, td{
            text-align: left;
            vertical-align: top;
          }
        tr:nth-child(even){
            background-color: #9fa9d4;
          }
   </style>
<body> 
<?php 
include "config.php";

$query = "SELECT id, fullname, phoneno, emailadd ,imagedata ,messagearea , hobbies , gender , content  , country  FROM formvalidation";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    echo '<button id="exportButton" style="display: block;background: #141a34; color: #fff;margin: 0 auto; margin-bottom: 10px;">Export to CSV file</button>';
    echo '<a href="export_to_pdf.php" download="Form_records.pdf" style="align-items:centre;margin-bottom: 10px;">Download PDF</a>';
    echo '<table id="records"> <tr> <th> Id </th> <th> FullName </th> <th> Emailadd </th> <th> Phoneno </th> <th> Images </th> <th> Messagearea </th><th> Hobbies </th><th> Gender </th><th> Content </th><th> Country </th> <th colspan=2 style=text-align:center;> Action </th> </tr>';
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['fullname']."</td>";
        echo "<td>".$row['emailadd']."</td>";
        echo "<td>".$row['phoneno']."</td>";
        echo "<td><img src='".$row['imagedata']."'style='width: 50px; height: 50px;' /></td>";
        echo "<td>".$row['messagearea']."</td>";
        echo "<td>".$row['hobbies']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['content']."</td>";
        echo "<td>".$row['country']."</td>";
        echo "<td><a href='delete.php?id=". $row["id"]."' style='color: red;'>DELETE</a></td>";
        echo "<td><a href='index.php?id=".$row["id"]."'style='color: green;'>UPDATE</td>";
        echo "</tr>";
    }
} else {
    echo "Nothing Over Here";
}

// closing connection
mysqli_close($conn);
?>
 <script>
     document.getElementById("exportButton").addEventListener("click", function() {
        var table = document.getElementById("records");
        var csv = [];
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll("td, th");

            for (var j = 0; j < cols.length; j++) {
                if (cols[j].querySelector("img")) {
                    row.push(cols[j].querySelector("img").src);
                } else {
                    row.push(cols[j].innerText);
                }
            }

            csv.push(row.join(","));
        }

        var csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "form_records.csv");
        document.body.appendChild(link);

        link.click(); 
    });
</script>
</body>
</html>
    </script>
</script>
</body>
</html>

