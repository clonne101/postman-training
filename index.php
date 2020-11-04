<?php

$result=array();
$result['status']=1;
$result['message']='Unknown request';

$request_method=$_SERVER['REQUEST_METHOD'];

if($request_method==="GET")
{
  $limit=(isset($_GET["limit"])) ? intval($_GET["limit"]) : NULL;
  if(is_null($limit))
  {
    $result['message']="Limit cannot be empty";
  }else{
    $output=[
      [
        'id'=>1,
        'name'=>'User 1',
        'post'=>'I am user 1'
      ],
      [
        'id'=>2,
        'name'=>'User 2',
        'post'=>'I am user 2'
      ],
      [
        'id'=>3,
        'name'=>'User 3',
        'post'=>'I am user 3'
      ],
      [
        'id'=>4,
        'name'=>'User 4',
        'post'=>'I am user 4'
      ],
      [
        'id'=>5,
        'name'=>'User 5',
        'post'=>'I am user 5'
      ]
    ];

    if($limit>0)
    {
      $arrOutput=$output;
      $output=array();

      for($i=0;$i<$limit;$i++)
      {
        array_push($output,$arrOutput[$i]);
      }
    }

    $result['status']=0;
    $result['message']='Success';
    $result['output']=$output;
  }
}

http_response_code(200);
header("Content-Type: application/json");
echo json_encode($result);
exit;
