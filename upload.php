
<?php
$all_data=[];
$json=[];
if(isset($_POST['files'])){
  $file=fopen($_FILES['file']['tmp_name'],"r");
  $data = fgetcsv($file);
foreach ($data as $key) {
  $json[$key]='';
}
while($data = fgetcsv($file,1000)){
 $json['question']=$data[0];
 $json['options']=json_decode($data[1]);
  $json['topic']=$data[2];
  $json['Difficulty level']=$data[3];
  $json['sub Topic']=$data[4];
  $all_data[]=$json;

} 
echo json_encode($all_data);
  fclose($file);
}
?>