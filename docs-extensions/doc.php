Ys_MagecomOneStepCheckout = 

1) D:\Yesha-Work\software\extensions\Ys_MagecomOneStepCheckout\app\etc\modules\Ys_MagecomOneStepCheckout.xml

2) author change from Jone Eide
http://www.base64encode.org/
key= f97857ae34839108cef0e40c20c7c68f28fa1f89

 echo $domain;echo "<br>";
       echo  $key = sha1(base64_decode('bWFnZWNvbW9uZXN0ZXBjaGVja291dA=='));
        echo "<br>";
        echo sha1($key);
        echo "<br>";
       echo sha1($key.$domain);
        echo "<br>";
       echo sha1(sha1(sha1(base64_decode('bWFnZWNvbW9uZXN0ZXBjaGVja291dA=='))).'127.0.0.1 ');
       exit;