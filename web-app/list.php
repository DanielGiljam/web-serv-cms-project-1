<?php require_once ('initialize.php'); ?>

<?php

$subject_set = find_all_db_objects();

?>

<?php $page_title = 'List of people'; ?>
<?php include('header.php'); ?>

<div id="content">
    <div class="subjects listing">
        <h1>List of People</h1>


        <table class="list">
            <tr>
                <th>Name</th>
                <th>Zip Code</th>
                <th>Check em out! ;)</th>
            </tr>


            <!-- loops out each item from the array $subjects[] to a $subject-->
            <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>
                <tr>
                    <td><?php echo h($subject['namn']); ?></td>
                    <td><?php echo h($subject['postnummer']); ?></td>
                    <td><a class="action" href="<?php echo 'show.php?namn=' . h(u($subject['namn'])); ?>">View</a></td>
                </tr>
            <?php } ?>
        </table>
        <?php mysqli_free_result($subject_set); ?>
    </div>

</div>

<?php include('footer.php'); ?>