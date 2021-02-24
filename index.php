<?php
/**
 * Created by PhpStorm.
 * User: KAMRAN
 * Date: 24/02/2021
 * Time: 10:01 PM
 */

if($_POST){
    if (!file_exists('rating.json')) {
        $vals[] = array(
            'name' => $_POST['name'],
            'rate' => $_POST['rate'],
            'ip' => $_SERVER['HTTP_HOST'],
            'agent' => $_SERVER['HTTP_USER_AGENT']
        );

        $enC = json_encode($vals, JSON_PRETTY_PRINT);
        file_put_contents('rating.json', $enC, FILE_APPEND);

    } else {

        $newz = array();

        $vals[] = array(
            'name' => $_POST['name'],
            'rate' => $_POST['rate'],
            'ip' => $_SERVER['HTTP_HOST'],
            'agent' => $_SERVER['HTTP_USER_AGENT']
        );
        $new = file_get_contents('rating.json');
        $newz = json_decode($new);
        $valz = array_merge($vals, $newz);
        $fp = fopen('rating.json', 'w');
        $enC = json_encode($valz, JSON_PRETTY_PRINT);
        file_put_contents('rating.json', $enC, FILE_APPEND);
    }
    ?>
    Thank you for your rating<BR />
    <a href="rating.json" target="_blank">View All Rates</a>&nbsp;
    <a href="index.php" target="_blank">Back to form</a>
    <?php
}else{?>
    <form method="post">
        <label for="name">
            Your Name
            <input type="text" name="name" placeholder="Your Name">

        </label>
        <BR /> <BR />How do you rate me as a friend?<BR />
        <label for="r1">
            <input checked type="radio" id="r1" name="rate" value="No Rank">
            No Rank
        </label><BR />
        <label for="r1">
            <input type="radio" id="r1" name="rate" value="Rank 1">
            On Rank 1
        </label><BR />
        <label for="r2">
            <input type="radio"  id="r2" name="rate" value="Rank 2">
            On Rank 2
        </label><BR />
        <label for="r3">
            <input type="radio"  id="r3" name="rate" value="Rank 3">
            On Rank 3
        </label><BR />
        <label for="r4">
            <input type="radio"  id="r4" name="rate" value="Rank 4">
            On Rank 4
        </label><BR />
        <label for="r5">
            <input type="radio"  id="r5" name="rate" value="Rank 5">
            On Rank 5
        </label><BR />
        <label for="r6">
            <input type="radio"  id="r6" name="rate" value="Rank 6">
            On Rank 6
        </label><BR />
        <label for="r7">
            <input type="radio"  id="r7" name="rate" value="Rank 7">
            On Rank 7
        </label><BR />
        <label for="r8">
            <input type="radio"  id="r8" name="rate" value="Rank 8">
            On Rank 8
        </label><BR />
        <label for="r9">
            <input type="radio"  id="r9" name="rate" value="Rank 9">
            On Rank 9
        </label><BR />
        <label for="r10">
            <input type="radio"  id="r10" name="rate" value="Rank 10">
            On Rank 10
        </label><BR />
        <input type="submit" value="Submit">
    </form>

<?php }