<?php

function validatePost($post)
{

$errors = array(); 

if (empty($post['title'])) { 
	array_push($errors, 'Uhmm...We gonna need your title'); 
}
      
if (empty($post['body'])) { 
   array_push($errors, 'Oops.. Post body is required'); 
}

if (empty($post['topic_id'])) { 
   array_push($errors, 'uh-oh you forgot to choose topic'); 
}

$existingPost = selectOne('posts', ['title' => $post['title']]);
if ($existingPost) {
   if(isset($post['update-post']) && $existingPost['id'] != $post['id']) {
      array_push($errors, 'Post title already exist');
   }
   if(isset($post['add-post'])) {
   array_push($errors, 'Post title already exist');
   }   
}

   return $errors;
}
