<?php
  session_start();

  include_once('../../models/phonebooks.php');

  $phone = new Phonebooks();

  $phones = $phone->get();
?>

<div class="accordion mt-5" id="accordionExample">
    <h2>Phonebooks</h2>
    <?php foreach($phones as $phone) { ?>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $phone['id'] ?>"
            aria-expanded="true" aria-controls="<?php echo $phone['id'] ?>">
            <div><?php echo $phone['name'] . ' ' . $phone['surname'] ?></div>
          </button>
        </h2>
        <div id="<?php echo $phone['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="row">
              <div class="col-4">
                <div class="mb-2"><strong>Address</strong></div>
                <div><?php echo $phone['address'] ?></div>
                <div><?php echo $phone['zip'] ?></div>
                <div><?php echo $phone['country_name'] ?></div>
              </div>

              <div class="col-4">
                <div class="mb-2"><strong>Numbers</strong></div>
                <?php $numbers = explode(',', $phone['phone_numbers']); ?>
                <?php foreach($numbers as $number) { ?>
                  <div><?php echo $number ?></div>
                <?php } ?>
              </div>

              <div class="col-4">
                <div class="mb-2"><strong>Emails</strong></div>
                <?php $emails = explode(',', $phone['emails']); ?>
                <?php foreach($emails as $email) { ?>
                  <div><?php echo $email ?></div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>