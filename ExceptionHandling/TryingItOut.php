<?php


$dsn = "http://localhost/phpmyadmin/db_structure.php?server=1&db=LearningTool";
$user = "root";
$password = null;
$options = null;



//
//try{
//    $Obj = new PDO($dsn, $user, $password, $options);
//    $Obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//           
//     $SST = $Obj->prepare("Insert into Customer (FirstName, NoOnLoan) VALUES (:firstname,:NoOnLoan)");    
//     $SST->bindParam(":firstname", $FirstName);
//     $SST->bindParam(":NoOnLoan", $NoOnLoan);
//} catch (Exception $ex) {
//
//}
//
//
//// line 25 is throwing an error :(
//$FirstName = "Jill";
//$NoOnLoan = 2;
//$SST->execute();


// Mockup member class with a checkoutMedia class which throws an exception if the $total no of items
// exceeds 5 items/ 
Class Member {
    protected $name;
    protected $NumberOnLoan;
    protected $email;
    protected $password ;
    
    function __construct($name, $NumberOnLoan, $email, $password){
    $this->name = $name;
    $this->NumberOnLoan = $NumberOnLoan; 
    $this->email = $email;
    $this->password =$password;
}

function checkOutMedia($NoChecked){
   $total = $this->NumberOnLoan + $NoChecked;
    if ($total < 5){
    echo "Success! You have checked out $NoChecked items ";
    }
    elseif ($total >= 5){
        throw new TooManyMediaItemsSorry();
        echo "You are over the limit! Please reduce media amount to continue";
        
    }
}


function Login($email, $password){
    if ($this->email == $email && $this->password == $password) {
            echo "We have a match";
        } else {
            throw new UnknownUser();
        }
    }
}


// instansiating a lib member
$Jim = new Member("Jim", "3", "J@gmail.com", "JimmyBoi");

// within this Extends Exception is an interface called throwable with the following encoded methods
//public function __toString(): string 
//    public function getCode(): int 
//    public function getFile(): string 
//    public function getLine(): int 
//    public function getMessage(): string 
//    public function getPrevious(): \Throwable 
//    public function getTrace(): array 
//    public function getTraceAsString(): string  

// it wouldnt let me catch an error otherwise as you have to make the object "Throwable"

// the exception example extending from the exception class (which we do not have 
// to declare)
Class TooManyMediaItemsSorry extends Exception {
    protected $message = "Sorry too many items on loan!!";
    
}

Class UnknownUser extends Exception {
    protected $message = "Your email or password do not work, plz try again";
}


// first attempt goes smoothly as Jim is only borrowing 1 item, hence his grand on loan
// $total = 4 , which is below 5 hence no exception (3 already had + 1 borrowing now)
// MAKING IT WORK
try {
    $Jim->checkOutMedia("1");
} catch (TooManyMediaItemsSorry $ex) {
    echo $ex->getMessage(). PHP_EOL;

}


// this time Jim is borrowing 4, which brings the $total = 7 hence an error is thrown. 
// (3 already had an now trying to get 4 more out) (lockdown entairtainment bless Jim)
// MAKING IT BORROW TOO MANY ITEMS
try {
    $Jim->checkOutMedia("6");
} catch (TooManyMediaItemsSorry $ex) {
 echo PHP_EOL .  $ex->getMessage();
}
catch (UknownUser $ex){
    echo PHP_EOL .  $ex->getMessage();
}



// MAKING JIM UNABLE TO LOGIN

try {
    $Jim->Login("3", "Jdog@gmail.com", "dzj");
} 
catch (UnknownUser $ex){
    echo PHP_EOL .  $ex->getMessage();
}
catch (TooManyMediaItemsSorry $ex) {
 echo PHP_EOL .  $ex->getMessage();
}
