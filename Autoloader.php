<?php 
/*
 * This will soon become the Autoloader file so that I can split the website's files into their respective layers
 */



spl_autoload_register(function($class) {
    
    //get the difference of location between the location of autoloader and the file that called autoloader
    $lastDirectories = substr(getcwd(), strlen(__DIR__));
    
    echo "getcwd = : " . getcwd() . "<br>";
    echo "__DIR__ = : " . __DIR__ . "<br>";
    echo "last directories = : " . $lastDirectories . "<br>";
    
    //count the number of slashs and folder depth
    $numberOfLastDirectories = substr_count($lastDirectories,'\\');
    
    
    echo "Number of directories different :" . $numberOfLastDirectories . "<br>";
    
    //This is the list of possible directories that classes are found in this app
    $directories = ['buisnessService', 'buisnessService/model', 'database', 'presentation', 'presentation/processes', 'presentation/views', 'utility'];
    foreach($directories as $d)
    {
        $currentDirectory = $d;
        for($x = 0; $x < $numberOfLastDirectories; $x++){
            $currentDirectory = "../" . $currentDirectory;
        }
        $classFile = $currentDirectory . '/' . $class . '.php';
        
        if (is_readable($classFile))
        {
            if (require $d . '/' . $class . ".php")
            {
                break;
            }
        }
    }
    
});