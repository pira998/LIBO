<?php
include 'header.php';


include $_SERVER['DOCUMENT_ROOT'] . '/classes/Mediator.php';
include $_SERVER['DOCUMENT_ROOT'] . '/classes/MediatorImp.php';
if (!isset($_SESSION['librarian'])) {

    $_SESSION['msg'] = "You must log in first to view this page";
    header("location: ../sign_in.php");
}

if (isset($_GET['logout'])) {

    session_destroy();
    unset($_SESSION['librarian']);
    header("location: ../sign_in.php");
}


?>

<div class="content">
    <div class="container-fluid">
        <center>
            <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal">
                Compose
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="post" action="">

                                <div class="card-body">

                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Subject..." name="subject" required>
                                        </div>
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="material-icons">face</i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Body..." name="body" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="create" value="Send"></input>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </center>
        <?php
        $sql = "SELECT * FROM `messages`ORDER BY `created_time` DESC";
        $connection = Connector::getConnection();
        $query = mysqli_query($connection, $sql);
        ?>
        <table class="table table-inbox table-hover">
            <tbody>
                <tr class="unread">
                    <th class="view-message ">No</th>
                    <th class="view-message  dont-show">Subject</th>
                    <th class="view-message ">Body</th>
                    <th class="view-message ">Send Date</th>

                </tr>

                <?php
                while ($m = mysqli_fetch_array($query)) {
                ?>

                    <tr class="unread">
                        <td class="view-message  dont-show"><?php echo $m['id'] ?></td>
                        <td class="view-message  dont-show"><?php echo $m['subject'] ?></td>
                        <td class="view-message "><?php echo $m['body'] ?></td>
                        <td class="view-message "><?php echo date('d/m/Y', $m['created_time']) ?></td>
                    </tr>
                <?php } ?>

                <br>
            </tbody>
        </table>





        <?php
        if (isset($_POST['create'])) {

            $mediator = new MediatorImp();

            $sql = $mediator->sendMessage($_POST, $connection);

            

        }


        include 'footer.php';
        ?>

        