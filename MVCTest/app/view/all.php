<?php

echo $data['title'];
echo '<br>';
$TabRows = $data['allUsersData'];
 foreach($TabRows as $key=>$val){
             echo '<br> ID: '.$TabRows[$key]->id;
             echo '<br> Name: '.$TabRows[$key]->name;
             echo ' '.$TabRows[$key]->surname;
             echo '<br> Mob: '.$TabRows[$key]->mobile;  
             
 }