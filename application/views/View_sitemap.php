<?php 
header('Content-type: application/xml; charset="ISO-8859-1"',true);  
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
     <loc><?php echo base_url('informasi');?></loc>
     <priority>1.0</priority>
  </url>
 
  <?php foreach($jadwal_dokter as $data) { ?>
  <url>
     <loc><?php echo base_url('informasi/jadwal-dokter').'/'.$data->id;?></loc>
     <priority>0.5</priority>
     
  </url>
  <?php } ?>
</urlset>
 
