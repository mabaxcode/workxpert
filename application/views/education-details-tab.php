<br>
<form action="<?=base_url('main/save_education')?>" method="post">
  

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">University</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" placeholder="University" name="university" value="<?=$education['university']?>" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Education Level</label>
    <div class="col-sm-10">
      <!-- <input type="email" class="form-control" id="inputPassword" placeholder="Education Level" name="level" required> -->
      <select class="form-control" name="level" required>
        <option value="">Please select</option>
        <option value="DEGREE" <? if($education['level'] == 'DEGREE'){echo "selected";}else{echo "";} ?>>Degree</option>
        <option value="DIPLOMA" <? if($education['level'] == 'DIPLOMA'){echo "selected";}else{echo "";} ?>>Diploma</option>
        <option value="CERTIFICATION" <? if($education['level'] == 'CERTIFICATION'){echo "selected";}else{echo "";} ?>>Certification</option>
      </select>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Field of Study</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" placeholder="Field of Study" value="<?=$education['field']?>" name="field" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Year of Study</label>
    <div class="col-sm-10">
      <select class="form-control" name="year" required>
        <option value="">Please select</option>
        <option value="2025" <? if($education['year'] == '2025'){echo "selected";}else{echo "";} ?> >2025</option>
        <option value="2024" <? if($education['year'] == '2024'){echo "selected";}else{echo "";} ?> >2024</option>
        <option value="2023" <? if($education['year'] == '2023'){echo "selected";}else{echo "";} ?> >2023</option>
        <option value="2022" <? if($education['year'] == '2022'){echo "selected";}else{echo "";} ?> >2021</option>
        <option value="2021" <? if($education['year'] == '2021'){echo "selected";}else{echo "";} ?> >2021</option>
        <option value="2020" <? if($education['year'] == '2020'){echo "selected";}else{echo "";} ?> >2020</option>
        <option value="2019" <? if($education['year'] == '2019'){echo "selected";}else{echo "";} ?> >2019</option>
        <option value="2018" <? if($education['year'] == '2018'){echo "selected";}else{echo "";} ?> >2018</option>
        <option value="2017" <? if($education['year'] == '2017'){echo "selected";}else{echo "";} ?> >2017</option>
        <option value="2016" <? if($education['year'] == '2016'){echo "selected";}else{echo "";} ?> >2016</option>
        <option value="2015" <? if($education['year'] == '2015'){echo "selected";}else{echo "";} ?> >2015</option>
        <option value="2014" <? if($education['year'] == '2014'){echo "selected";}else{echo "";} ?> >2014</option>
        <option value="2013" <? if($education['year'] == '2013'){echo "selected";}else{echo "";} ?> >2013</option>
        <option value="2012" <? if($education['year'] == '2012'){echo "selected";}else{echo "";} ?> >2012</option>
        <option value="2011" <? if($education['year'] == '2011'){echo "selected";}else{echo "";} ?> >2011</option>
        <option value="2010" <? if($education['year'] == '2010'){echo "selected";}else{echo "";} ?> >2010</option>
        <option value="2009" <? if($education['year'] == '2009'){echo "selected";}else{echo "";} ?> >2009</option>
        <option value="2008" <? if($education['year'] == '2008'){echo "selected";}else{echo "";} ?> >2008</option>
        <option value="2007" <? if($education['year'] == '2007'){echo "selected";}else{echo "";} ?> >2007</option>
        <option value="2006" <? if($education['year'] == '2006'){echo "selected";}else{echo "";} ?> >2006</option>
      </select>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">CGPA (optional)</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" placeholder="CGPA" name="cgpa" value="<?=$education['cgpa']?>">
    </div>
  </div>
  <br>
  <input type="hidden" name="user_id" value="<?=$user['id']?>">
  <div align="right">
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </div>
  <br><br>
</form>