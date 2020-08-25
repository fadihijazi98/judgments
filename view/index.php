<?php
    require_once '../config/connection.php';
    $pdo = connection::connect();
    $sql = "SELECT * FROM `agents`";
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
        <div class="active">
            <a href="http://localhost/ahmad/view/index.php">
                الموكلون
            </a>
        </div>
        <div>
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
            <div class="button_new_agent">
                <div class="new_agent_modell">
                    <!-- Modal -->
                    <div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <!--Content-->
                            <div class="modal-content form-elegant">
                                <!--Body-->
                                <form action="../model/agents.php" method="post">
                                    <div class="modal-body mx-4">
                                        <!--Body-->
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="Form-email1">اسم الموكل</label>
                                            <input name="agent_name" id="Form-email1" class="form-control validate">
                                        </div>
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="Form-email1">رقم الهوية</label>
                                            <input name="agent_ssn" id="Form-email1" class="form-control validate">
                                        </div>

                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="Form-email1">الهاتف</label>
                                            <input name="agent_phone1" id="Form-email1" class="form-control validate">
                                        </div>
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="Form-email1">الجوال</label>
                                            <input name="agent_phone2" id="Form-email1" class="form-control validate">
                                        </div>
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="Form-email1">العنوان</label>
                                            <input name="agent_address" id="Form-email1" class="form-control validate">
                                        </div>
                                        <div class="md-form mb-3">
                                            <select name="agent_issue" style="width:100%;padding:15px;top:-8px;" class="mdb-select md-form md-outline colorful-select dropdown-primary">
                                                <?php
                                                    $sql = "SELECT id, name FROM issues";
                                                    $q0 = $pdo->query($sql); // q as result
                                                    $q0->setFetchMode(PDO::FETCH_ASSOC);
                                                ?>
                                                <?php while ($r = $q0->fetch()): ?>
                                                    <option value="<?php echo $r['id'] ?>"><?php echo $r['name']; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <label style="margin-left: 10px">القضيه</label>
                                        </div>
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="Form-email1">المدعى عليه</label>
                                            <input name="agent_defendant" id="Form-email1" class="form-control validate">
                                        </div>
                                        <div class="md-form mb-5">
                                            <label data-error="wrong" data-success="right" for="Form-email1">الاتعاب</label>
                                            <input name="agent_budget" id="Form-email1" class="form-control validate">
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
                            + اضافة موكل جديد
                        </a>
                    </div>
                </div>
            </div>
            <thead>
            <tr>
                <th class="text-center">اسم الموكل</th>
                <th class="text-center">رقم الهوية</th>
                <th class="text-center">الهاتف</th>
                <th class="text-center">الجوال</th>
                <th class="text-center">العنوان</th>
                <th class="text-center">القضيه</th>
                <th class="text-center">المدعى عليه</th>
                <th class="text-center">الاتعاب</th>
                <th class="text-center">حذف</th>
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
                        <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'ssn')" onkeydown="edit(<?php echo $r['id']; ?>, 'ssn'))">
                            <span id="ssn<?php echo $r['id']; ?>">
                                <?php echo $r['ssn'] ?>
                            </span>
                        </td>
                        <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'phone1')" onkeydown="edit(<?php echo $r['id']; ?>, 'phone1'))">
                            <span id="phone1<?php echo $r['id']; ?>">
                                <?php echo $r['phone1'] ?>
                            </span>
                        </td>
                        <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'phone2')" onkeydown="edit(<?php echo $r['id']; ?>, 'phone2'))">
                            <span id="phone2<?php echo $r['id']; ?>">
                                <?php echo $r['phone2'] ?>
                            </span>
                        </td>
                        <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'address')" onkeydown="edit(<?php echo $r['id']; ?>, 'address'))">
                            <span id="address<?php echo $r['id']; ?>">
                                <?php echo $r['address'] ?>
                            </span>
                        </td>
                        <td>
                            <a href="http://localhost/ahmad/view/agent-issue.php?id=<?php echo $r['id']; ?>&agent=<?php echo $r['name']; ?>" class="btn btn-default btn-rounded" style="font-size: 14px !important;">
                                    عرض قضاياه
                            </a>
                        </td>
                        <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'agent_defendant_name')" onkeydown="edit(<?php echo $r['id']; ?>, 'agent_defendant_name'))">
                            <span id="agent_defendant_name<?php echo $r['id']; ?>">
                                <?php echo $r['agent_defendant_name'] ?>
                            </span>
                        </td>
                        <td class="pt-3-half" contenteditable="true" onkeyup="edit(<?php echo $r['id']; ?>, 'budget')" onkeydown="edit(<?php echo $r['id']; ?>, 'budget'))">
                            <span id="budget<?php echo $r['id']; ?>">
                                <?php echo $r['budget'] ?>
                            </span>
                        </td>
                        <td>
                            <form action="../model/agents.php" method="post">
                                <input name="agent_id" value="<?php echo $r['id'];?>" hidden>
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
            var send = "agent_edit=true&id="+id+"&type="+type+"&value="+document.getElementById(type+id).innerHTML;
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "../model/agents.php", true);
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