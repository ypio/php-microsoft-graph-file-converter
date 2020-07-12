
  
# PHP Microsoft Graph File Converter    

 This library allow you to convert file using the Microsoft Graph API and microsoft engine conversion.    
Particularly usefull to convert Office files (xlsx, docx...) to PDF.     
    
    
## Supported input and output formats 

| Input format | Output format |  
|---|---| 
| doc, docx, epub, eml, htm, html, md, msg, odp, ods, odt, pps, ppsx, ppt, pptx, rtf, tif, tiff, xls, xlsm, xlsx | pdf| 
| cool, fbx, obj, ply, stl, 3mf | glb | 
| eml, md, msg | html |
| 3g2, 3gp, 3gp2, 3gpp, 3mf, ai, arw, asf, avi, bas, bash, bat, bmp, c, cbl, cmd, cool, cpp, cr2, crw, cs, css, csv, cur, dcm, dcm30, dic, dicm, dicom, dng, doc, docx, dwg, eml, epi, eps, epsf, epsi, epub, erf, fbx, fppx, gif, glb, h, hcp, heic, heif, htm, html, ico, icon, java, jfif, jpeg, jpg, js, json, key, log, m2ts, m4a, m4v, markdown, md, mef, mov, movie, mp3, mp4, mp4v, mrw, msg, mts, nef, nrw, numbers, obj, odp, odt, ogg, orf, pages, pano, pdf, pef, php, pict, pl, ply, png, pot, potm, potx, pps, ppsx, ppsxm, ppt, pptm, pptx, ps, ps1, psb, psd, py, raw, rb, rtf, rw1, rw2, sh, sketch, sql, sr2, stl, tif, tiff, ts, txt, vb, webm, wma, wmv, xaml, xbm, xcf, xd, xml, xpm, yaml, yml | jpg |    

 ## Http client psr-7 compliant    
 You can use any of the http client that is psr-7 compliant and implement `Psr\Http\Client\ClientInterface`. I recommend to `"guzzlehttp/guzzle": "^7.0"` which I use for testing or `"guzzlehttp/guzzle": "^6.0"`  
  
## Usage   

### Require a token 

You first need to register an application with the Microsoft identity platform [https://docs.microsoft.com/en-us/graph/auth-register-app-v2](https://docs.microsoft.com/en-us/graph/auth-register-app-v2)  
  
Then there is two different way to get a token depending on your need [https://docs.microsoft.com/en-us/graph/auth-v2-user](https://docs.microsoft.com/en-us/graph/auth-v2-user) or [https://docs.microsoft.com/en-us/graph/auth-v2-service](https://docs.microsoft.com/en-us/graph/auth-v2-service)  
  
Here is an example about how to get a token without a 

``` php  
$guzzle = new Client(); $url = 'https://login.microsoftonline.com/' . $tenantId . '/oauth2/token?api-version=1.0'; $token = json_decode($guzzle->post($url, [    
    'form_params' => [    
    'client_id' => $clientId,    
    'client_secret' => $clientSecret,    
    'resource' => 'https://graph.microsoft.com/',    
    'grant_type' => 'client_credentials',    
] ])->getBody()->getContents()); $accessToken = $token->access_token;  
```  
  
### Convert file  

``` php  
$configuration = new Configuration(    
    $accessToken,    
    $user_id,    
    new Client() 
 );
 
 $converter = new FileConverter(); 
 $converter->setConfiguration($configuration);
 $converter>setFile(file_get_contents('file-sample_100kB.docx'));
 
try {    
   echo $converter->convert(new FormatToPdfFrom(FormatToPdfFrom::DOCX)); } catch (MSGraphException $exception) {    
   var_dump($exception->getResponse()->getBody()->getContents()); 
}  
```  
  
### Size limitation  

For the moment only supports files up to 4MB in size