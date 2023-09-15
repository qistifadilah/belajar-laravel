<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>Buat Account Baru</h1>
    <h3>Sign Up Form</h3>
    <form action="/welcome">
      <label for="fn">First name :</label>
      <br /><br />
      <input type="text" name="" id="fn" />
      <br /><br />
      <label for="ln">Last name :</label>
      <br /><br />
      <input type="text" name="" id="ln" />
      <br />
      <p>Gender :</p>
      <input type="radio" id="Male" name="fav_language" value="Male" />
      <label for="Male">Male</label><br />
      <input type="radio" id="Female" name="fav_language" value="Female" />
      <label for="Female">Female</label><br />
      <p>Nationalty</p>
      <select name="kebangsaan" id="">
        <option value="Indonesia">Indonesia</option>
        <option value="Amerika">Amerika</option>
        <option value="Inggris">Inggris</option>
      </select>
      <br />
      <p>Language Spoken</p>
      <input type="checkbox" id="bahasa" name="bahasa" value="bahasa" />
      <label for="bahasa">Bahasa Indonesia</label><br />
      <input type="checkbox" id="english" name="english" value="english" />
      <label for="english">English</label><br />
      <input type="checkbox" id="other" name="other" value="other" />
      <label for="other">Other</label>
      <br /><br />
      <label for="bio">Bio</label>
        <br><br>
        <textarea name="bio" id=""></textarea>
        <br>
        <input type="submit" value="Sign Up">
    </form>
  </body>
</html>
