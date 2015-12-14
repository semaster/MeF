<?php if(!defined("IN_RULE")) die ("Oops"); ?>

<?php if (!empty($message)) : ?><div class="alert alert-warning"><?php echo $message; ?></div><?php endif; ?>

<?php if ($showBlock == 'login') : ?>
  <form class="form-signin" action="/account/login" method="post">
   <h2 class="form-signin-heading">Please sign in</h2>
   <label for="inputEmail" class="sr-only">Email address</label>
   <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
   <label for="password" class="sr-only">Password</label>
   <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <?php if ($captcha == 'show') : ?>
      <div class="g-recaptcha" data-sitekey="<?php echo $ReCaptchaSiteKey; ?>"></div>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif; ?>
   <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Sign in</button>
  </form>
<?php endif; ?>

<?php if ($showBlock == 'register') : ?>
  <form class="form-signin" action="/account/register" method="post">
   <h2 class="form-signin-heading">Sign up form</h2>
   <label for="inputEmail" class="sr-only">Email address</label>
   <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
   <label for="inputPassword" class="sr-only">Password</label>
   <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
   <label for="confirmPassword" class="sr-only">Confirm password</label>
   <input type="password" id="confirmPassword" name="password2" class="form-control" placeholder="Confirm password" required>
    <?php if ($captcha == 'show') : ?>
      <div class="g-recaptcha" data-sitekey="<?php echo $ReCaptchaSiteKey; ?>"></div>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif; ?>
   <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup">Sign in</button>
  </form>
<?php endif; ?>