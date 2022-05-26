<style>
  .form1{
    max-width: 960px;
    text-align: center;
    margin: 0 auto;
  }
  .error {
    border: 3px solid red;
  }
  .hidden{
    display: none;
  }
</style>
<body>
  <div class="table1">
    <table border="1">
      <tr>
        <th>Name</th>
        <th>EMail</th>
        <th>Year</th>
        <th>Pol</th>
        <th>Limbs</th>
        <th>Superpower</th>
        <th>Bio</th>
      </tr>
      <?php
      foreach($users as $user){
          echo '
            <tr>
              <td>'.$user['name'].'</td>
              <td>'.$user['email'].'</td>
              <td>'.$user['year'].'</td>
              <td>'.$user['pol'].'</td>
              <td>'.$user['limbs'].'</td>
              <td>';
                $user_pwrs=array(
                    "fly"=>FALSE,
                    "sleep"=>FALSE,
                    "run"=>FALSE,
                );
                foreach($pwrs as $pwr){
                    if($pwr['per_id']==$user['id']){
                        if($pwr['name']=='fly'){
                            $user_pwrs['fly']=TRUE;
                        }
                        if($pwr['name']=='sleep'){
                            $user_pwrs['sleep']=TRUE;
                        }
                        if($pwr['name']=='run'){
                            $user_pwrs['run']=TRUE;
                        }                      
                    }
                }
                if($user_pwrs['fly']){echo 'fly<br>';}
                if($user_pwrs['sleep']){echo 'sleep<br>';}
                if($user_pwrs['run']){echo 'run<br>';}
              echo '</td>
              <td>'.$user['bio'].'</td>
              <td>
                <form method="get" action="ind.php">
                  <input name=edit_id value='.$user['id'].' hidden>
                  <input type="submit" value=Edit>
                </form>
              </td>
            </tr>';
       }
      ?>
    </table>
    <?php
    printf('Пользователи с fly: %d <br>',$pwrs_count[0]);
    printf('Пользователи с sleep: %d <br>',$pwrs_count[1]);
    printf('Пользователи с run: %d <br>',$pwrs_count[2]);
    ?>
  </div>
</body>
