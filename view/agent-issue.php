<?php
require_once '../config/connection.php';
$pdo = connection::connect();
$sql = "SELECT id, name, number FROM `issues` INNER JOIN `agnets-issues` ON id = issue_id AND agent_id =".$_GET['id'];
$q = $pdo->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$sql = "SELECT id, name FROM `issues` WHERE id NOT IN (SELECT issue_id FROM `agnets-issues`)";
$q1 = $pdo->query($sql);
$q1->setFetchMode(PDO::FETCH_ASSOC);

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
    <div class="active">
        <a href="http://localhost/ahmad/view/issues.php">
            القضيه
        </a>
    </div>
    <div>
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
                    <div class="modal-dialog" role="document">
                        <!--Content-->
                        <div class="modal-content form-elegant">
                            <!--Body-->
                            <form action="../model/agent-issue.php" method="post">
                                <div class="modal-body mx-4">
                                    <!--Body-->
                                    <div class="md-form mb-3">
                                        <input name="agent_id" value="<?php echo  $_GET['id']; ?>" hidden>
                                        <select name="issue_id" style="width:100%;padding:15px;top:-8px;" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                                            <?php while ($r = $q1->fetch()): ?>
                                                <option value="<?php echo $r['id'];?>" ><?php echo $r['name'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                        <label style="margin-left: 10px">المرحلة الحالية</label>
                                    </div>

                                    <div class="text-center mb-3">
                                        <button type="submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">اضافة</button>
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
                        + اضافة قضيه جديده للموكل (
                        <mark style="background-color:black;color:yellow"><?php echo $_GET['agent']; ?></mark>
                        )
                    </a>
                </div>
            </div>
        </div>
        <thead>
        <tr>
            <th class="text-center">موضوع القضيه</th>
            <th class="text-center">رقمها</th>
            <th>
                حذف
            </th>
        </tr>
        </thead>
        <tbody>
        <?php while ($r = $q->fetch()): ?>
            <tr>
                <td class="pt-3-half" contenteditable="false" onkeyup="edit(<?php echo $r['id']; ?>, 'name')" onkeydown="edit(<?php echo $r['id']; ?>, 'name')">
                        <span id="name<?php echo $r['id']; ?>">
                            <?php echo $r['name'] ?>
                        </span>
                </td>
                <td class="pt-3-half" contenteditable="false" onkeyup="edit(<?php echo $r['id']; ?>, 'number')" onkeydown="edit(<?php echo $r['id']; ?>, 'number'))">
                        <span id="number<?php echo $r['id']; ?>">
                            <?php echo $r['number'] ?>
                        </span>
                </td>

                <td>
                    <form action="../model/agent-issue.php" method="post">
                        <input name="type" value="delete" hidden>
                        <input name="issue_id" value="<?php echo $r['id'];?>" hidden>
                        <input name="agent_id" value="<?php echo $_GET['id']; ?>" hidden>
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