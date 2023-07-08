    <?php
        session_start();
        require_once './controller/Home.php';
        require_once './lib/db.php';
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
        <title>Document</title>
    </head>
<div class="container">
    <br/>
    <select class="form-select" style = "width:200px" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
        <option value = ''>Đơn hàng</option>
        <option value="?sort=desc">Đã giao</option>
        <option value="?sort=asc">Đang giao</option>
        <option value="?sort=asc">Đã nhận</option>
    </select> <br/>

<table class = "table">
        <tr>
            <th>Mã hóa đơn</th>
            <th>Ngày mua</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Thành tiền</th>
            <th>Phương thức thanh toán</th>
        </tr>
    <?php
        $mattaikhoan = $_SESSION['mataikhoan'];
        $sql = "select * from hoadon where mataikhoan = $mattaikhoan";
        $stmt = TruyVan($sql);
        foreach($stmt as $row)
        { ?>
            <tr>
                <td><?php echo $row['MaHoaDon']?></td>
                <td><?php echo $row['NgayLap']?></td>
                <td><?php echo $row['DiaChi']?></td>
                <td><?php echo $row['ThanhTien']?></td>
                <?php if($row['Phuongthucthanhtoan'] == 1)
                 {?>
                    <td>Thanh toán khi nhận hàng</td>
                <?php } else if($row['Phuongthucthanhtoan'] == 2){?>
                    <td>Thanh toán qua MoMo</td>
                <?php } ?>
            </tr>
    <?php }?>
</table>
</div>