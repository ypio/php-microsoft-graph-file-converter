<?php

use GuzzleHttp\Client;
use Ypio\MSGraphFileConverter\Configuration;
use Ypio\MSGraphFileConverter\Exceptions\MSGraphException;
use Ypio\MSGraphFileConverter\FileConverter;
use Ypio\MSGraphFileConverter\Formats\FormatToPdfFrom;

require '../vendor/autoload.php';

require 'credentials.php';

$guzzle = new Client();
$url = 'https://login.microsoftonline.com/' . $tenantId . '/oauth2/token?api-version=1.0';
$token = json_decode($guzzle->post($url, [
    'form_params' => [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'resource' => 'https://graph.microsoft.com/',
        'grant_type' => 'client_credentials',
    ],
])->getBody()->getContents());
$accessToken = $token->access_token;

$configuration = new Configuration(
    $accessToken,
    $user_id,
    new Client()
);

$converter = new FileConverter();
$converter->setConfiguration($configuration);
$converter->setFile(file_get_contents('file-sample_100kB.docx'));

try {
    //header("Content-Description: File Transfer");
    //header("Content-Type: application/octet-stream");
    //header("Content-Disposition: attachment; filename=\"". 't.pdf' ."\"");
    echo $converter->convert(new FormatToPdfFrom(FormatToPdfFrom::DOCX));
} catch (MSGraphException $exception) {
    var_dump($exception->getResponse()->getBody()->getContents());
}

