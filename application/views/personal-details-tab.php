<br>
<form action="<?=base_url('main/save_personal')?>" method="post">
  

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" placeholder="Name" value="<?=$user['name']?>" name="name" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputPassword" placeholder="Email" value="<?=$user['email']?>" name="email" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Age</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="inputPassword" placeholder="Age" value="<?=$personal['age']?>" name="age" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10">
      <select class="form-control" name="gender">
        <option value="">Please select</option>
        <option value="MALE" <? if($personal['gender'] == 'MALE'){echo "selected";}else{echo "";} ?>>Male</option>
        <option value="FEMALE" <? if($personal['gender'] == 'FEMALE'){echo "selected";}else{echo "";} ?>>Female</option>
      </select>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Phone No.</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" placeholder="Phone No." name="phone_no" value="<?=$personal['phone_no']?>">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <textarea class="form-control" required rows="2" name="address"><?=$personal['address']?></textarea>
    </div>
  </div>
  <input type="hidden" name="user_id" value="<?=$user['id']?>">
  <br>
  <div align="right">
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </div>
  <br><br>
</form>