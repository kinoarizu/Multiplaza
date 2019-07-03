<?php
function ongkos_kirim($kurir,$dari,$tujuan,$berat=1000)
{
  $CI=& get_instance();
  $CI->load->library('rajaongkir');
  $json=$CI->rajaongkir->cost($dari, $tujuan, $berat, $kurir);
  $decode=json_decode($json,TRUE);
  $status=$decode['rajaongkir']['status']['code'];
  if($status==200)
  {
    return $decode['rajaongkir']['results'];
  }else{
    return 0;
  }
}

function pelanggan_info($output='pelanggan_id')
{
  $CI=& get_instance();
  $o="";
  if(akses()=="member")
  {
    $userid=user_info('user_id');
    $s=array(
    'user_id'=>$userid,
    );
    $o=$CI->m_db->get_row('pelanggan',$s,$output);
  }
  return $o;
}
?>
