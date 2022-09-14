<div class="popup">
  <div class="hero">
    <div class="form-box">
      <div class="button-box">
        <div id="btn"></div>
        <button type="button" class="toggle-btn" onclick="Login()">Log In</button>
        <button type="button" class="toggle-btn" onclick="Register()">Register</button>
      </div>
      <div class="social-icons">
        <img src="img/google-icon.png">
        <img src="img/facebook-icon.png">
        <img src="img/twiter-icon.png">
      </div>
      <form id="Login"  class="pop-input-group" action="_file/_handel_login" method="POST">
        <input type="text" class="input-field" placeholder="User Id" name="user_name_id" required>
        <input type="password" name="user_password" class="input-field" placeholder="Enter Password" required>
        <div class="checkbox"><input type="checkbox" class="check-box"><span>Remember Password</span></div>
        <button type="submit" class="submit-btn"> Log In </button>
      </form>
      <form action="_file/_handel_singup" id="Register" class="pop-input-group" method="POST">
        <input type="text" class="input-field" name="user_name_id" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 4 or more characters" placeholder="User name" minlength="4" maxlength="25" required>
        <input type="text" class="input-field" name="singup-name" placeholder="Enter your name" required>
        <input type="email" class="input-field" name="singup-email" placeholder="Email Id" required>
        <input type="password" class="input-field" name="singup-password" placeholder="Enter Password" required>
        <input type="password" class="input-field" name="singup-renter-password" placeholder="Renter Password" required>
        <div class="checkbox"><input type="checkbox" class="check-box" required><span class="trms-span">I agree to the terms & conditions</span>
        </div>
        <button type="submit" class="submit-btn"> Register </button>
      </form>
    </div>

  </div>

</div>