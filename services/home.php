<?php
session_start();

if($_SESSION['level1']['amount'] < 300) {
    header("Location: /");
    exit;
}

if(isset($_GET['source'])){
    highlight_file(__FILE__);
    return;
}
error_reporting(0);
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Livello 2 - PHP Injection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
</head>
<body>
<section class="hero">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Livello 2 - PHP Injection
      </h1>
      <h2 class="subtitle">
         You can view the source code <a href="?source">here</a>
      </h2>
    </div>
  </div>
</section>
    <section class="section">
        <div class="columns">
            <div class="column"></div>
            <div class="column">
                <div class="container">
    
                    <form method="POST">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" placeholder="Put some code" name="code">
                             </div>
                        </div>
                        <div class="field">
                            <div class="control">
                            <input class="submit" type="submit" placeholder="Send" value="Send">
                            </div>
                        </div>      
                    </form>
                </div>
            
            <div class="box">
                <pre class="has-background-white">
    <?php 
    if(isset($_POST['code'])){
        
        $code = $_POST['code'];
        $characters = ['\`', '\[', '\*', '\.', '\='];
        $classes = get_declared_classes();
        $functions = get_defined_functions()['internal'];
        $strings = ['eval', 'include', 'require', 'function', 'echo'];
        $variables =  ['_GET', '_POST', '_COOKIE', '_REQUEST', '_SERVER', '_FILES', '_ENV', 'HTTP_ENV_VARS', '_SESSION', 'GLOBALS'];
        
        $blacklist = array_merge($characters, $classes, $functions, $variables,$strings);
        
        foreach ($blacklist as $blacklisted) {
            
            if (preg_match ('/' . $blacklisted . '/im', $code)) {
                $output = "<img src='/assets/memeLevel2.jpeg' style='display: block; margin: auto;'/>";
            }
        }
        
        if(!isset($output)){
            $my_function = create_function('',$code);
            $output = 'This function is disabled.';
        }
        echo $output;
    }
                    ?>
            </pre>
            </div>

                </div>
            <div class="column"></div>
                </div>
    </section>
</body>
</html>
