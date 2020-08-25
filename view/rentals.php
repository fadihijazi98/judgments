<?php
require_once '../config/connection.php';
$pdo = connection::connect();
$sql = "SELECT * FROM rents";
$q = $pdo->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- main stylesheet file -->
    <link rel="stylesheet" href="../public/css/main.css">
    <!-- bootstrap stylesheet link file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>أحمد</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../node_modules/mdbootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../node_modules/mdbootstrap/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../node_modules/mdbootstrap/css/style.css" rel="stylesheet">
</head>
<body dir="rtl">
<div class="cover_color">
</div>
<header>
    <div>
        <a href="http://localhost/ahmad/view/index.php">
            الموكلون
        </a>
    </div>
    <div>
        <a href="http://localhost/ahmad/view/issues.php">
            القضيه
        </a>
    </div>
    <div class="active">
        <a href="http://localhost/ahmad/view/rentals.php">
            الايجارات
        </a>
    </div>
</header>
<div class="content">
    <table id="dtBasicExample" class="table table-bordered table-responsive-md table-striped text-center">
        <div class="button_new_issue">
            <div class="new_issue_modell">
                <!-- Modal -->
                <div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-height:80vh !important;overflow: scroll !important;">
                        <!--Content-->
                        <div class="modal-content form-elegant">
                            <!--Body-->
                            <form action="../model/rentals.php" method="post">
                                <div class="modal-body mx-4">
                                    <!--Body-->
                                    <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right" for="Form-email1">اسم العقار</label>
                                        <input name="name" id="Form-email1" class="form-control validate">
                                    </div>
                                    <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right" for="Form-email1">اسم المؤجر</label>
                                        <input name="lessor_name" id="Form-email1" class="form-control validate">
                                    </div>
                                    <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right" for="Form-email1">اسم المستاجر</label>
                                        <input name="tenant_name" id="Form-email1" class="form-control validate">
                                    </div>
                                    <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right" for="Form-email1">المنطقه مع التفاصيل</label>
                                        <input name="region" id="Form-email1" class="form-control validate">
                                    </div>
                                    <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right" for="Form-email1">مدة الايجار ( بالايام )</label>
                                        <input name="period" id="Form-email1" class="form-control validate">
                                    </div
                                    <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right" for="Form-email1">مبلغ الايجار</label>
                                        <input name="amount" placeholder="مبلغ الايجار" id="Form-email1" class="form-control validate">
                                    </div>

                                    <div class="md-form mb-1" style="padding: 20px">
                                        <input type="date" name="start_rent" id="Form-email0" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="Form-email0">تاريخ بدء الايجار</label>
                                    </div>
                                    <div class="md-form mb-1" style="padding: 20px">
                                        <input type="date" name="end_rent" id="Form-email1" class="form-control validate">
                                        <label data-error="wrong" data-success="right" for="Form-email1">تاريخ انتهاء الايجار</label>
                                    </div>
                                    <div class="md-form mb-1" style="padding: 10px">
                                        <select name="renewal" style="width:100%;padding:15px;top:-8px;" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                                            <option value="تلقائيا" selected>تلقائيا</option>
                                            <option value="بناء على طلب">بناء على طلب</option>
                                        </select>
                                        <label style="margin-left: 10px">المرحلة الحالية</label>
                                    </div>

                                    <div class="md-form mb-1" style="padding: 10px">
                                        <select name="currency" style="width:100%;padding:15px;top:-8px;" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                                            <option value="شيقل" selected>شيقل</option>
                                            <option value="دولار">دولار</option>
                                            <option value="دينار">دينار</option>
                                        </select>
                                        <label style="margin-left: 10px">العملة</label>
                                    </div>
                                    <div class="md-form mb-1" style="padding: 10px">
                                        <select name="payment" style="width:100%;padding:15px;top:-8px;" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                                            <option value="قسط" selected>قسط</option>
                                            <option value="قسطين">قسطين</option>
                                            <option value="شهريا">شهريا</option>
                                        </select>
                                        <label style="margin-left: 10px">الية الدفع</label>
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">اضافة</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!-- Modal -->
                <div class="text-right">
                    <a style="font-size: 18px" href="" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#elegantModalForm">
                        + اضافة عقار جديد
                    </a>
                </div>
            </div>
        </div>
        <thead>
        <tr>
            <th class="text-center">اسم العقار</th>
            <th class="text-center">اسم المؤجر</th>
            <th class="text-center">اسم المستاجر</th>
            <th class="text-center">مكان العقار</th>
            <th class="text-center">مدة الايجار</th>
            <th class="text-center">تاريخ البدء</th>
            <th class="text-center">تاريخ الانتهاء</th>
            <th class="text-center">الية التجديد</th>
            <th class="text-center">مبلغ الايجار</th>
            <th class="text-center">العملة</th>
            <th class="text-center">الية الدفع</th>
            <th>
                حذف
            </th>
        </tr>
        </thead>
        <tbody>
        <?php while ($r = $q->fetch()): ?>
            <tr>
                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'name')" onkeydown="edit(<?php echo $r['id']; ?>, 'name')">
                        <span id="name<?php echo $r['id']; ?>">
                            <?php echo $r['name'] ?>
                        </span>
                </td>
                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'lessor_name')" onkeydown="edit(<?php echo $r['id']; ?>, 'lessor_name'))">
                        <span id="lessor_name<?php echo $r['id']; ?>">
                            <?php echo $r['lessor_name'] ?>
                        </span>
                </td>
                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'tenant_name')" onkeydown="edit(<?php echo $r['id']; ?>, 'tenant_name'))">
                        <span id="tenant_name<?php echo $r['id']; ?>">
                            <?php echo $r['tenant_name'] ?>
                        </span>
                </td>
                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'region')" onkeydown="edit(<?php echo $r['id']; ?>, 'region'))">
                        <span id="region<?php echo $r['id']; ?>">
                            <?php echo $r['region'] ?>
                        </span>
                </td>
                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'period')" onkeydown="edit(<?php echo $r['id']; ?>, 'period'))">
                        <span id="period<?php echo $r['id']; ?>">
                            <?php echo $r['period'] ?>
                        </span>
                </td>

                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'start_rent')" onkeydown="edit(<?php echo $r['id']; ?>, 'start_rent'))">
                        <span id="start_rent<?php echo $r['id']; ?>">
                            <?php echo explode(' ',$r['start_rent'])[0] ?>
                        </span>
                </td>
                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'end_rent')" onkeydown="edit(<?php echo $r['id']; ?>, 'end_rent'))">
                        <span id="end_rent<?php echo $r['id']; ?>">
                            <?php echo explode(' ',$r['end_rent'])[0] ?>
                        </span>
                </td>

                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'renewal')" onkeydown="edit(<?php echo $r['id']; ?>, 'renewal'))">
                        <span id="renewal<?php echo $r['id']; ?>">
                            <?php echo $r['renewal'] ?>
                        </span>
                </td>
                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'amount')" onkeydown="edit(<?php echo $r['id']; ?>, 'amount'))">
                        <span id="amount<?php echo $r['id']; ?>">
                            <?php echo $r['amount'] ?>
                        </span>
                </td>
                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'currency')" onkeydown="edit(<?php echo $r['id']; ?>, 'currency'))">
                        <span id="currency<?php echo $r['id']; ?>">
                            <?php echo $r['currency'] ?>
                        </span>
                </td>
                <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'payment')" onkeydown="edit(<?php echo $r['id']; ?>, 'payment'))">
                        <span id="payment<?php echo $r['id']; ?>">
                            <?php echo $r['payment'] ?>
                        </span>
                </td>
                <td>
                    <form action="../model/rentals.php" method="post">
                        <input name="delete" value="true" hidden>
                        <input name="rental_id" value="<?php echo $r['id'];?>" hidden>
                        <button type="submit" class="btn btn-default btn-rounded" style="font-size: 14px !important;">
                            حذف
                        </button>
                    </form>
                </td>
            </tr>

        <?php endwhile; ?>
        </tbody>

    </table>
</div>
<!-- bootstrap js script's -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    function edit(id, type) {
        var send = "renatil_edit=true&id="+id+"&type="+type+"&value="+document.getElementById(type+id).innerHTML;
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../model/rentals.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(send);

    }
</script>
<!-- JQuery -->
<script type="text/javascript" src="../node_modules/mdbootstrap/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../node_modules/mdbootstrap/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../node_modules/mdbootstrap/js/mdb.min.js"></script>
</body>
</html>