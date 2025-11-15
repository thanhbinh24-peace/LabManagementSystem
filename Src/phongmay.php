<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách phòng máy</title>
    <style>
        table {
            margin: 10px auto;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        tr:nth-child(even) {
            background-color: #fee0c1;
        }
        th {
            color: red;
            font-weight: bold;
            padding: 5px;
        }
        td {
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <?php
        include("../Database/config.php");
        $sql = "SELECT p.MaPhong, p.TenPhong, p.SucChua, np.TenNhom, tt.TenTTP
        FROM phong p
        JOIN nhomphong np ON np.MaNhom = p.MaNhom
        JOIN chitietttp ct ON ct.MaPhong = p.MaPhong
        JOIN trangthaiphong tt ON ct.MaTTP = tt.MaTTP";
        $result = mysqli_query($con, $sql);
        $n = mysqli_num_rows($result);
         if($n > 0) {
            echo"<h2 style='text-align: center;'>Danh sách phòng máy</h2>";
            echo"<table>";
                echo"<tr>
                    <th>Số thứ tự</th>
                    <th>Tên phòng</th>
                    <th>Tên nhóm</th>
                    <th>Sức chứa</th>
                    <th>Trạng thái phòng</th>
                    <th>Chức năng</th>
                </tr>";
                for($i=0; $i<$n; $i++) {
                    echo"<tr>";
                    $row = mysqli_fetch_array($result);
                    echo"<td>".($i + 1)."</td>";
                    echo"<td>".$row['TenPhong']."</td>";
                    echo"<td>".$row['TenNhom']."</td>";  
                    echo"<td style='text-align: center;'>".$row['SucChua']."</td>";
                    echo"<td>".$row['TenTTP']."</td>";
                    echo"<td>
                    <a href=''>Xem</a>
                    <a href=''>Sửa</a>
                    <a href=''>Xóa</a>
                    <a href=''>Mượn phòng</a>
                    </td>";
                    
                    echo"</tr>";
                }
            echo"</table>";
         }
    ?>
</body>
</html>