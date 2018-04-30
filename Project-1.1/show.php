<?php

require_once ('initialize.php');

//best practice
$namn = isset($_GET['namn'])? $_GET['namn'] : '1';


$db_query = find_db_objects_by_name($namn);

?>

<?php $page_title = $db_query['namn']; ?>
<?php include('header.php'); ?>

    <div id="content">
        <a class="back-link" href="<?php echo 'list.php';?>">&laquo; Back to List</a>

        <div id="subject show">
            <h1>Name: <?php echo h($db_query['namn']); ?></h1>

            <div class="attributes">
                <dl>
                    <dt>Postnummer:</dt>
                    <dd><?php echo h($db_query['postnummer']); ?></dd>
                </dl>
                <dl>
                    <dt>Summery:</dt>
                    <dd><?php echo h($db_query['annonstext']); ?></dd>
                </dl>
                <dl>
                    <dt>Annual Salary:</dt>
                    <dd><?php echo h($db_query['arslon']);?></dd>
                </dl>
                <dl>
                <dt>E-mail:</dt>
                <dd><?php echo h($db_query['email']);?></dd>
                </dl>
                </dl>
                <dl>
                    <dt>Looking for:</dt>
                    <dd><?php echo h($db_query['soker']);?></dd>
                </dl>
            </div>


        </div>


    </div>



<?php include('footer.php'); ?>