<?php
session_start();
$connect = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql','3306');


$id = $_POST['id'];
$pw = $_POST['pw'];


$query = "select * from main_user where id='$id'";
$result = $connect->query($query);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    if ($row['pw'] == $pw) {
        $_SESSION['userid'] = $id;
        $_SESSION['last_login_timestamp'] =time();
        if (isset($_SESSION['userid'])) {
?> 

<script>
    location.replace("main.php");
</script>

<?php
        } else {
            echo "session failed";
        }
    } else {
        ?>
        
        <script>
            alert("아이디 또는 비밀번호를 확인해주세요.");
            history.back();
        </script>
    <?php
    }
} else {
    ?> <script>
        alert("아이디 또는 비밀번호를 확인해주세요.");
        history.back();
    </script>
<?php
}
?>



