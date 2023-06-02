<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/profile.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
	
        <h1>Edit Profile</h1>
        <form method="post" action="/profile">
			<input type="text" name="username" placeholder="Username" value="<?= set_value('username', $user['username']) ?>">
            <input type="email" readonly placeholder="Email" value="<?= $user['email'] ?>">
            <input type="password" name="password" placeholder="Password" value="">
            <input type="password" name="password_confirm" placeholder="Re-enter Password" value="">
        
            <?php if (isset($validation)): ?>
                <div class='col-12'>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <button type="submit" name="submit">Save Changes</button>
        </form>
		
		
        <div class="login">
            <a href="/adminhome">Back to Homepage</a>
        </div>
    </div>
</body>
</html>