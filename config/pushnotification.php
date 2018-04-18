<?php

return [
  'gcm' => [
      'priority' => 'normal',
      'dry_run' => false,
      'apiKey' => 'My_ApiKey',
  ],
  'fcm' => [
        'priority' => 'high',
        'dry_run' => false,
        'apiKey' => 'AAAAEu-j-tM:APA91bGysVtl5leT6CZ8aqTROw-r1OoqxtbADnIgzQL12W_IZI8zQKztdOw-wlo3j1PWDjE2ZPMQl_093d2RSgXMZtjgBOOOMmjQlx0bMxeJSQcwu3KGNFyG0pO__TmtUYHei_s46Lst',
  ],
  'apn' => [
      'certificate' => __DIR__ . '/iosCertificates/apns-dev-cert.pem',
      'passPhrase' => '1234', //Optional
      'passFile' => __DIR__ . '/iosCertificates/yourKey.pem', //Optional
      'dry_run' => true
  ]
];