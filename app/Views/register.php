<html>
    <head>
        <title>
            Sign Up Page
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/register.css">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    </head>
    <body>
        <div class="wrapper">
            <h1>Sign Up</h1>
            <form method="post" action="/register">
                <input type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                <input type="email" name="email" placeholder="Email" value="<?= set_value('email')?>">
                <input type="password" name="password" placeholder="Password" value="<?= set_value('password')?>">
                <input type="password" name="password_confirm" placeholder="Re-enter Password">
            
                <?php if (isset($validation)): ?>
                    <div class='col-12'>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <button type="submit" name="submit">Sign Up</button>
            </form>
            
            <div class="login">
                Already Signed Up? <a href="/login">Login Here!</a>
            </div>
        </div>
    </body>
</html>
