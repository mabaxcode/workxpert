<!-- Button trigger modal -->
<br>
<div align="right">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Add Skill
</button>
</div>





<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Skill</th>
      <th scope="col">Level</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <? if($skills){ ?>

    <? $no = 1; foreach($skills as $skill){ ?>
    <tr>
      <th scope="row"><?=$no++;?></th>
      <td><?=$skill['skill']?></td>
      <td><?=$skill['level']?></td>
      <td></td>
    </tr>
    <? } ?>

    <? } else { ?>
    <tr>
      <th scope="row" colspan="4" style="text-align: center;">No data available</th>
    </tr>
    <? } ?>

  </tbody>
</table>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Skills</h5>
      </div>
      
        <br>
<form action="<?=base_url('main/save_skill')?>" method="post">
  <div class="modal-body">
  
 <input type="hidden" name="user_id" value="<?=$user['id']?>">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Skill</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" placeholder="Skill" name="skill" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Level</label>
    <div class="col-sm-10">
      <select class="form-control" name="level" required>
        <option value="">Please select</option>
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediate</option>
        <option value="Advanced">Advanced</option>
        <option value="Expert">Expert</option>
      </select>
    </div>
  </div>
  <br>
  <?/*
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Certificate (optional)</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" placeholder="Skill" name="skill">
    </div>
  </div>
*/ ?>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
</form>
      
    </div>
  </div>
</div>