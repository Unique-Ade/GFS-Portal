<?php
//Basic Form Validation
$errors = ['email' => '', 'fName' => '', 'subjects' => ''];
$email = $fName = $subjects = '';
if (isset($_POST['submit'])) {

    //email check
    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required <br/>';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter a Valid Email <br/>';
        }
        // echo htmlspecialchars($_POST['email']) . '<br/>';
    }
    //Full name check
    if (empty($_POST['fName'])) {
        $errors['fName'] = 'Full Name is required <br/>';
    } else {
        $fName = $_POST['fName'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $fName)) {
            $errors['fName'] = 'Enter valid name <br/>';
        }
        // echo htmlspecialchars($_POST['fName']);
    }
    //Subjects check
    if (empty($_POST['subjects'])) {
        $errors['subjects'] = 'At least one subject is required';
    } else {
        $subjects = $_POST['subjects'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $subjects)) {
            $errors['subjects'] = 'Subjects should be comma seprated';
        } else {
            // echo htmlspecialchars($_POST['subjects']);
        }
    }
    //echo $_POST['grade'];
    if (!array_filter($errors)) {
        header('Location: index.php');
    }

} //End of Form Validation



?>

<!DOCTYPE html>
<html lang="en">

<?php include './templates/header.php' ?>

<section id="addPizza">
    <h4 class="formHead">Sign Up</h4>
    <form action="Registration.php" method="POST">
        <label for="">Your Email</label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <div class="error_Txt"><?php echo $errors['email'] ?></div> <br>
        <label for="" id="pizza_title">Full Name</label>
        <input type="text" name="fName" value="<?php echo $fName ?>">
        <div class="error_Txt"><?php echo $errors['fName'] ?></div> <br>
        <label for="" class="ing">Subjects (Comma separated):</label> <br>
        <input type="text" name="subjects" value="<?php echo $subjects ?>"> <br>
        <div class="error_Txt"><?php echo $errors['subjects'] ?></div> <br>
        <label for="" class="ing">Grade</label> <br>
        <select name="grade" id="select_grade">
            <option value="Grade 1">Grade 1</option>
            <option value="Grade 2">Grade 2</option>
            <option value="Grade 3">Grade 3</option>
            <option value="Grade 4">Grade 4</option>
            <option value="Grade 5">Grade 5</option>
        </select>
        <div>
            <input type="submit" value="submit" class="addSubmit" name="submit">
        </div>

    </form>
</section>

<?php include './templates/footer.php' ?>


</html>