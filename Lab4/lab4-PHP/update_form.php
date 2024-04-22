<?php
include_once 'get_one_user.php';
$edit_data = [];
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $user = get_user($user_id); 
    if ($user) {
            $edit_data['id'] = $user[0]['id'];
            $edit_data['name'] = $user[0]['name'];
            $edit_data['email'] = $user[0]['email'];
            $edit_data['password'] = $user[0]['password']; 
            $edit_data['confirmPassword'] = $user[0]['password']; 
            $edit_data['roomNo'] = $user[0]['room_no'];


    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Update your data</h1>
    <form action="update_data.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label"> Name</label>
            <input type="text" name="name" class="form-control" id="name"
                   value="<?php echo isset($edit_data['name']) ? $edit_data['name'] : ''; ?>"
            >
            <?php if(isset($errors['name'])): ?>
                <div class="text-danger"><?php echo $errors['name']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email"
                   value="<?php echo isset($edit_data['email']) ? $edit_data['email'] : ''; ?>"
            >
            <?php if(isset($errors['email'])): ?>
                <div class="text-danger"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password"
                   value="<?php echo isset($edit_data['password']) ? $edit_data['password'] : ''; ?>"
            >
            <?php if(isset($errors['password'])): ?>
                <div class="text-danger"><?php echo $errors['password']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"
                   value="<?php echo isset($edit_data['confirmPassword']) ? $edit_data['confirmPassword'] : ''; ?>"
            >
            <?php if(isset($errors['confirmPassword'])): ?>
                <div class="text-danger"><?php echo $errors['confirmPassword']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="roomNo" class="form-label">Room No</label>
            <select name="roomNo" class="form-select" id="roomNo">
                <option value="Application1" <?php echo (isset($edit_data['roomNo']) && $edit_data['roomNo'] == 'Application1') ? 'selected' : ''; ?>>Application1</option>
                <option value="Application2" <?php echo (isset($edit_data['roomNo']) && $edit_data['roomNo'] == 'Application2') ? 'selected' : ''; ?>>Application2</option>
                <option value="cloud" <?php echo (isset($edit_data['roomNo']) && $edit_data['roomNo'] == 'cloud') ? 'selected' : ''; ?>>cloud</option>
            </select>
            <?php if(isset($errors['roomNo'])): ?>
                <div class="text-danger"><?php echo $errors['roomNo']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Profile picture</label>
            <input type="file" name="image" id="image" accept="image/*" required
                   class="form-control"  aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
