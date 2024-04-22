<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<body>
<div class="container">
    <h1>Registration Form</h1>
    <form action="submit.php" method="post">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="first_name" placeholder="First Name">
            </div>
            <div class="col">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
            <div class="col">
                <select class="form-select" name="country">
                    <option selected disabled>Select Country</option>
                    <option value="EGY">Egypt</option>
                    <option value="UK">UK</option>
                    <option value="Canada">Canada</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <label>Gender:</label><br>
                <input type="radio" name="gender" value="male"> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
            </div>
            <div class="col">
                <label>Skills:</label><br>
                <input type="checkbox" name="skills[]" value="php"> PHP<br>
                <input type="checkbox" name="skills[]" value="html"> HTML<br>
                <input type="checkbox" name="skills[]" value="css"> CSS<br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="col">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
            <input type="text" class="form-control" name="department" placeholder="Department">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <p>Enter code SH321:</p>
                <input type="text" class="form-control" name="security_code" placeholder="Enter code">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
