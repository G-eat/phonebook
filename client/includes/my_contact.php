<?php
  include_once('../../models/user.php');
  include_once('../../models/countries.php');

  $userModel = new User();
  $user = $userModel->myContacts();
  $numbers = $userModel->myPhones();
  $emails = $userModel->myEmails();

  $country = new Country();
  $countries = $country->getCountries();
?>

<div class="card mt-3 p-3">
    <form class="row" method="POST" action="/phonebook/models/user.php?function=update">
        <div class="col-12">
        <div class="mb-2"><strong>Contact</strong></div>
        <input placeholder="Name" class="mb-2" type="text" name="name" value="<?php echo $user['name'] ?>" required></input>
        <input placeholder="Surname" class="mb-2" type="text" name="surname" value="<?php echo $user['surname'] ?>" required></input>
        <input placeholder="Address" class="mb-2" type="text" name="address" value="<?php echo $user['address'] ?>" required></input>
        <input placeholder="Zip" class="mb-2" type="text" name="zip" value="<?php echo $user['zip'] ?>" required></input>
        <select class="form-control" name="countryId" required>
            <?php foreach($countries as $country) { ?>
                <option value="<?php echo $country['id'] ?>" <?php echo $country['id'] == $user['country_id'] ? "selected" : '' ?>><?php echo $country['name'] ?></option>
            <?php } ?>
        </select>
        </div>

        <div class="form-check mt-2 mb-3">
            <input name="is_public" class="form-check-input" type="checkbox" <?php echo $user['is_public'] ? "checked" : '' ?> id="user">
            <label class="form-check-label" for="user">
                Publish my contact
            </label>
        </div>

        <br>
        <hr>

        <div class="col-6">
        <div class="mb-2"><strong>Numbers</strong></div>
        <?php foreach($numbers as $index => $number) { ?>
            <div style="display: flex;">
                <input class="mb-2" type="number" name="number[]" value="<?php echo $number['phone'] ?>"></input>
                <input name="number_is_public_<?php echo $index ?>" class="form-check-input" type="checkbox" <?php echo $number['is_public'] ? "checked" : '' ?> id="numer-<?php echo $number['id'] ?>">
            </div>
        <?php } ?>
        <div id="newNumbersBlock"></div>
        <p id="add_number">Add another number</p>
        </div>
        

        <div class="col-6">
        <div class="mb-2"><strong>Emails</strong></div>
        <?php foreach($emails as $index => $email) { ?>
            <div style="display: flex;">
                <input class="mb-2" type="email" name="email[]" value="<?php echo $email['email'] ?>" required></input>
                <input name="email_is_public_<?php echo $index ?>" class="form-check-input" type="checkbox" <?php echo $email['is_public'] ? "checked" : '' ?> id="email-<?php echo $email['id'] ?>">
            </div>
        <?php } ?>
        <div id="newEmailsBlock"></div>
        <p id="add_email">Add another number</p>
        </div>

        <button type="submit" class="btn btn-primary btn-block mt-4">Save</button>
    </form>
</div>

<script>
    let phone_number = 0;

    $("#add_number").click(function(){
        let div = `<input class="mb-2" type="number" name="new_number[]" value="" required></input>`;
        div += `<input name="new_number_is_public_${phone_number}" class="form-check-input" type="checkbox"  id="numer_${phone_number}">`;
        $("#newNumbersBlock").append(div);
        phone_number++;
    });

    let email_number = 0;

    $("#add_email").click(function(){
        let div = `<input class="mb-2" type="email" name="new_email[]" value="" required></input>`;
        div += `<input name="new_email_is_public_${email_number}" class="form-check-input" type="checkbox"  id="numer_${email_number}">`;
        $("#newEmailsBlock").append(div);
        email_number++;
    });
</script>