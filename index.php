 <!-- CURL -->
 <?php

  function get_curl($url){
      // INISIALISASI MAPI MENGGUNAKAN CURL
      $curl = curl_init();
      // KASIH MASUKKAN API YANG MAU DI PAKAI
      curl_setopt($curl, CURLOPT_URL, $url);
  
      // TRANSFER MENJADI JSON
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec($curl);
  
      // TUTUP CURL
      curl_close($curl);
  
      return json_decode($result, true);
  }
    $result = get_curl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UC6Bjycj6lOXbDLCHpP7iXug&key=AIzaSyA1nE68Si5dmziWexiQ9hF0nJz75hY0ipA');

    $ytPic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
    $title = $result['items'][0]['snippet']['title'];
    $subs = $result['items'][0]['statistics']['subscriberCount'];


    // LATEST VIDIO
    $latestV = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyA1nE68Si5dmziWexiQ9hF0nJz75hY0ipA&channelId=UCIc9Kx9naOGjmgYWnDDjs6A&maxResults=1&order=date&part=snippet';
    $result = get_curl($latestV);

     $video = $result['items'][0]['id']['videoId'];

     // API FACEBOOK
     $apIg= '2a2ecdc7a5bd5c07390cf8e12169fa25';

    ?>

 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>PORTOFOLIO</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

     <link rel="stylesheet" href="style.css">
 </head>

 <body>

     <section id="sosmed">

         <div class="container">

             <div class="row pt-4 mb-4">
                 <div class="col text-center">
                     <h2>Social Media</h2>
                 </div>
             </div>


             <div class="row content" style="margin-bottom: 70%;">

                 <div class="col-md-4 yt">

                     <div class="row">
                         <div class="col-md-4"><img src="<?= $ytPic; ?>" width="100" class="rounded-circle img-thumbnail"></div>
                         <div class="col-md-8"> <h5> <?= $title; ?> Subscribers </h5> 
                             <div class="row">
                                 <div class="col-md-12 follow"> <?= $subs; ?></div>
                               <div class="g-ytsubscribe" data-channelid="UCIc9Kx9naOGjmgYWnDDjs6A" data-layout="default" data-count="hidden"></div>
                             </div>
                         </div>
                     </div>

                     <div class="yt mt-5">
                         <iframe src="https://www.youtube.com/embed/<?= $video; ?>" class="object-fit-contain"></iframe>
                     </div>

                 </div>


                 <div class="col-md-5 ig">

                     <div class="row">
                         <div class="col-md-4"><img src="<?= $ytPic; ?>" width="100" class="rounded-circle img-thumbnail"></div>
                         <div class="col-md-8"> <h5>gita's Instagram</h5>
                             <div class="row">
                                 <div class="col-md-12 follow">900 FOll</div>
                             </div>
                         </div>
                     </div>

                     <div class="row mt-3 pb-3">
                         <div class="col">
                             <div class="ig-thumb">
                                 <img src="americano.jpg">
                             </div>
                         </div>
                     </div>

                 </div>
             </div>

     </section>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

     <script src="https://apis.google.com/js/platform.js"></script>


 </body>

 </html>