<?php

function validateTopic($topic)
{

$errors = array(); 

if (empty($topic['name'])) { 
	array_push($errors, 'Uhmm...We gonna need to enter name'); 
}

$existingTopic = selectOne('topics', ['name' => $post['name']]);
if ($existingTopic) {
   if(isset($post['update-topic']) && $existingTopic['id'] != $post['id']) {
      array_push($errors, 'Name already exist');
   }
   if(isset($post['save-topic'])) {
   array_push($errors, 'Name already exist');
   }   
}
   return $errors;
}
