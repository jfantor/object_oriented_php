<?php

class person{
    public $name ;
    public $age;
    function __construct($name = "no name", $age = 0){
        $this->name = $name;
        $this->age = $age;
    }
    function show(){
        echo $this->name . " - " .$this->age . "<br>" ;


    }
    
}
$p1 = new person();

$p2 = new person("shante",16) ;
$p3 = new person("shifan",8) ;
$p4 = new person("arisha",10);
// $p1->name = "jf antor";
// $p1->age = 22;


$p1->show();
$p2->show();
$p3->show();
$p4->show();


// inheritance--------------------


class employee{
    public $name;
    public $age;
    public $salary;

    function __construct($n, $a, $s){
        $this->name = $n;
        $this->age = $a;
        $this->salary = $s;

    }
    
    function info(){
        echo "<h3>Employee Profile</h3>";
        echo "Employee Name :" . $this->name . "<br>";
        echo "Employee Age :" . $this->age . "<br>";
        echo "Employee Salary :" . $this->salary . "<br>";
    }
}
class manager extends employee{
    public $ta = 1000;
    public $phone = 300;
    public $totalSalary;
    function info(){
        $this->totalSalary = $this->salary +  $this->ta +  $this->phone;
        echo "<h3>Manager Profile</h3>";
        echo "Manager Name :" . $this->name . "<br>";
        echo "Manager Age :" . $this->age . "<br>";
        echo "Manager Salary :" . $this->totalSalary . "<br>";
    } 
}

$e1 = new manager("ram", 25,10000);
$e2 = new employee("jio", 27,2000);
$e1->info();
$e2->info();


// access Modifiers------------

class base{
    public $name;

    public function __construct($n = "no name"){
        $this->name = $n;

    }
    protected function show(){
        echo "<h2> Access Modifiers</h2>";
        echo "your Name :" . $this->name . "<br>";
    }
}
class derived extends base{
    public function get(){
        echo "<h2> Access Modifiers</h2>";
        echo "your Name :" . $this->name . "<br>";
    }
}



$test1 = new derived("JF Jio");

$test1->get();
// $test1->show();
// overriding methods @ propertis----------

class base1{
   public $name1 = "parent class";
   public function calc($a, $b){
    return $a * $b;
   }
}
class derived1 extends base1{
    public $name1 = "child class";
    public function calc($a, $b){
        return $a + $b;
       }
    }

$over = new base1();
echo $over->calc(5,30) . "<br>";
$over1 = new derived1();
echo $over1->calc(5,30);


// abstract class-------------
abstract class abprents{
    public $abname;

    abstract protected function abclac($a,$b);
    
}

class abchild extends abprents{
    public $abname;

    public function abclac($c,$d){
        $x = $c + $d;
        echo "<h2> Abstract class</h2>";

        echo "your frist value" . $c . "<br>";
        echo "your scound  value" . $d . "<br>";
        echo "your addition value :" . $x . "<br>";
    }
    
}
$abtest = new abchild();
$abtest->abclac(5,20);

// interface ------------
interface in_parents{
    function in_calc($a,$b);
}
interface in_parents2{
     function in_additiion($a,$b);
}
class in_child implements in_parents , in_parents2{
    public function in_calc($a,$b){
        $c= $a * $b;
        echo "<h2> Interface Multification</h2>";
        echo "Your Frist number is : " . $a . "<br>";
        echo "Your scound  number is : " . $b . "<br>";
        echo "Your multification number is : " . $c . "<br>";
    }
    public function in_additiion($a,$b){
        $c= $a + $b;
        echo "<h2> Interface Addition </h2>";
        echo "Your Frist number is : " . $a . "<br>";
        echo "Your scound  number is : " . $b . "<br>";
        echo "Your addition number is : " . $c . "<br>";
    }
}
$multi = new in_child();
$multi->in_calc(10,5);
// $multi = new in_child();
$multi->in_additiion(10,5);

$multi->in_calc(10,20);


// static member-----------

class stbase{
    public static $stname = "Jf Antor";

    // public static function stshow(){
    //     echo "<h2> static member </h2>";
    //     echo self::$stname;
    // }
    // public function __construct($n){
    //     self::$stname = $n;
    // }
}

class stdrived extends stbase{
    public static function stshow(){
        echo "<h2> static member </h2>";
        echo parent::$stname . "<br>"; 
    }
}
$sttest = new stdrived();

$sttest->stshow();
// echo stbase::$stname;
//  stbase::stshow();



// late static binding in php------

// class labase{
//     protected static $laname = "JF Antor ";

//     public function lashow(){
//         echo "<h2> late static binding </h2>";
//         echo self::$laname . "<br>";
//         echo static::$laname;
//     }
// }
// class ladrived extends labase{
//     protected static $laname = " JF Jio";
// }

// $latest = new ladrived();
// $latest->lashow()

// traits------------
trait hellowe{
    public function sayhellof(){
        echo "<h2> traits method </h2>";
        echo "hellow everyone " ;
    }
}
trait bye{
    public function saybye(){
        echo "<h2> traits method </h2>";
        echo "bye bye everyone " ;
    }
    public function sayhi(){
        echo "<h2> traits method </h2>";
        echo "hi everyone " ;
    }
}
class trabase{
    use hellowe,bye ;
}
class trabase2{
    use hellowe ;
}
$tratests = new trabase();
$tratests2 = new trabase();

$tratests->sayhellof();
$tratests2->saybye();
$tratests2->sayhi();
//  methos oberiding ---------
trait hellow{
    private function sayfuc(){
        echo " <h1> triat </h1>";
        echo "this is the trait . " . "<br>";

    }
}
// trait hi{
//     public function sayfuc(){
//         echo " <h1> triat hi  </h1>";
//         echo "this is the trait from hi trait. " . "<br>";

//     }
// }
class trbase{
    // public function sayfuc(){
    //     echo " <h1> class <h1>";
    //     echo "this is the class . " . "<br>";

    // }
     use hellow{
        hellow::sayfuc as public newfuc;
     }
     
     
     //,hi{
    //     hellow::sayfuc insteadOf hi;
    //     hi::sayfuc as newfuc;
    // }
}
// class trchid extends trbase { 
//     use hellow;
//     public function sayfuc(){
//         echo " <h1> child class </h1>";
//         echo "this is the child class . " ;

//     }
// }
$trtast = new trbase();
// $trtast->sayfuc();
$trtast->newfuc();

// type hinting or type declaration--\
echo "<h2>type hinting or type declaration</h2>";


class tyhello{
    public function tysayhello(){
        echo "Hellow Everyone ." . "<br>";
    }
}

class tyhi{
    public function tysayhi(){
        echo "Hi Everyone .". "<br>";
    }
}
function tywow(tyhello $c){
    $c->tysayhello();
}
$tytest = new tyhello();
tywow($tytest);


class school{
    public function getNames(student $names){
        foreach ($names->stname() as $fname){
            echo  $fname . " <br>";
        }
    }
}
class student{
    public function stname(){
        return ["ram","krisna","gupal"];
    }
}
class library{

}
$lib = new library();
$stu = new student();
$sch = new school();

$sch->getNames($stu);

// namespace----------method---


echo "<h2>Name space method</h2>";

require "scound.php";
require "test.php";

function wow(){
    echo "Hi Everyone .". "<br>";
}
use pro\v1\product\command as cmd;

$obj= new cmd\product();
// $obj2= new test\product();
//  cmd\wow();

// method chaining-----------------
echo ".,,,,";
echo "<h2>Name space method</h2>";

class meabc{
    public function mefirst(){
        echo "this is first function <br>";
        return $this;
    }
    public function mescound(){
        echo "this is scound function <br>";
        return $this;
    }
    public function methird(){
        echo "this is third function <br>";
        return $this;
    }
    
}
$metests = new meabc();
$metests->mefirst()->mescound()->methird();
// magic methods ---------
// --------------
// destructor method ------
echo "<h2>destructor method</h2>";

class desfun{
    public function __destruct(){
        echo "This is a Destruct function <br>";
    }
    public function __construct(){
        echo "This is construct function <br>";
    }
    public function deshello(){
        echo " this is a callable function <br>";
    }
   
}
$des_test = new desfun();
$des_test->deshello();

//__autoload method magicfunction------

echo "<h2>utoload method magicfunction</h2>";

require "classes/frist.php";
require "classes/scound.php";
// function __autoload($classfun){
//     require "classes/" . $classfun . ".php";
// }

$autest = new scound() ;
//get method------------
echo "<h2>get method magicfunction</h2>";
class getabc{
   private $get_data = ["name"=>"jf antor","course"=>"PHP","fee"=>"2000"];
    public function __get($get_property){
        // echo " you are trying to assess Non Existing or private propertys ($get_property)";
        if(array_key_exists($get_property,$this->get_data)){
            return $this->get_data[$get_property];
        }else{
            return "This key ($get_property) in not defind";
        }
    }

}
$getest = new getabc();
print_r ($getest->course);

// set method --------------------------
echo "<h2>set method magicfunction</h2>";

class setmet{
    private $set_name;
    public function set_heol(){
        echo $this->set_name;
    }

    public function __set($set_pro,$set_valu){
        // echo "yor are tring to access pribet or non exting property : $set_pro";
        if(property_exists($this , $set_pro)){
            $this->$set_pro = $set_valu;
        }else{
            echo " property dose note exting : $set_pro";
            print_f ($set_valu);

        }
    }
}
$set_test = new setmet();
$set_test->set_name = "JF Antor";
$set_test->set_heol();


// call method -------------


echo "<h2>call method magicfunction</h2>";

class callmeth{
    private $call_fname;
    private $call_lname;
    private function call_meth($fname , $lname ){
        $this->call_fname = $fname;
        $this->call_lname = $lname;
    }
    public function __call($call_meth , $args){
        // echo " you can not call private method or non exting method : $call_meth ";
        // print_r ($args);
        if(method_exists($this , $call_meth)){
            call_user_func_array([$this,$call_meth],$args);
        }else{
            echo "method dose not exist : $call_meth ";
        }
    }
}
$call_test = new callmeth();
$call_test->call_meth("jf","antor");
echo "<pre>";
print_r($call_test);
echo "</pre>";

// callstatic method--------------

echo "<h2>callstatic method magicfunction</h2>";

class callstatic{
    private static function callhello($name){
        echo "this is a static cll function : $name ";
    }
    public static function __callStatic($staticmeth , $sta_arg){
        // echo "you can not access private static method or non exsting method : $staticmeth";
        if(method_exists(__class__,$staticmeth)){
            call_user_func_array([__class__,$staticmeth], $sta_arg);
        }else{
            echo "method dose not exsting";
        }
    }

}
    callstatic::callhello("jf antor");

    // isset method------======
    echo "<h2>isset method magicfunction</h2>";    

class issetmeth{
    private $isset_fname;
    private $isset_lname;
    private $ditels = ["name"=>"jf antor","age"=>"20"];

    // public function issetname($issfname , $isslname){
    //     $this->isset_fname = $issfname;
    //     $this->isset_lname = $isslname;
    // }


    public function __isset($iss_prop){
        // echo isset($this->ditels[$iss_prop]);
        if(isset($this->ditels[$iss_prop])){
            echo "value is assind  ";
            // echo isset($this->$iss_prop);
            echo isset($this->ditels[$iss_prop]);
        }else{
            echo  "value in not assind :  ";
        }
    }

}


$iss_test = new issetmeth();
// $iss_test->issetname("jf","antor");
echo isset($iss_test->name);

// unset method==================
echo "<h2>unset method magicfunction</h2>";   
 class unsetmeth{
    private $unfname;
    private $unlname;

    public function un_setName($fname , $lname){
        $this->unfname = $fname;
        $this->unlname = $lname; 
    }
    public function __unset($un_prop){
        // echo " you can not unset private variavle";
        unset($this->$un_prop);
    }
 }
 $un_test = new unsetmeth();
 $un_test->un_setName("jf","antor");

 unset($un_test->unlname);
 echo "<pre>";
 print_r($un_test);
 echo "</pre>";
//  tostring================

echo "<h2>tostring method magicfunction</h2>"; 
class tostring{
public function __toString(){
    return "can not print object of class : " . get_class($this);
}
}
$to_test = new tostring();
echo $to_test;
// sleep method ============
echo "<h2>sleep method magicfunction</h2>";
class sleepmeth{
    private $sleFname;
    private $sleLname;
    
    public function sle_setName($fname,$lname){
        $this->sleFname = $fname;
        $this->sleLname = $lname;

    }
    public function __sleep(){
        return array('sleFname','sleLname');
    }
    // wakeup method===============
    public function __wakeup(){
        echo "this is wakeup function .";
    }

}
$sle_test = new sleepmeth();
$sle_test->sle_setName("jf","antor");
$srlij = serialize($sle_test);

echo "<pre>";
print_r($srlij);
echo "</pre>";

// wakeup method ===========
$unsri = unserialize($srlij);
echo "<pre>";
print_r($unsri);
echo "</pre>";


// clone method========
echo "<h2>clone  method magicfunction</h2>";
class clonemeth{
    public $cloName;
    public $cloCourse;

    public function __construct($n){
        $this->cloName = $n;
        // $this->cloCourse = $c;
    } 
    public function cl_setcourse(cl_course $c){
        $this->cloCourse = $c;
    }
    public function __clone(){
        $this->cloCourse = clone $this->cloCourse;
        // echo "this is clone function ";
    }
} 
class cl_course{
    public $courname;
    public function __construct($cn){
        $this->courname = $cn;
    }
   
}
$cl_student = new clonemeth('Yahoo Baba');
$cl_course = new cl_course('php');

$cl_student->cl_setcourse($cl_course);

 
 $cl_student1 = clone $cl_student;

 $cl_student1->cloName="ram kumar";
 $cl_student1->cloCourse->courname="python";
 
print_r($cl_student)  ;
echo "<br><br><br>";
print_r($cl_student1);
echo "<br><br><br>";

class cloneex{
    public $Name_cl;
    public $Course_cl;
    
    public function __construct($cl_n){
        $this->Name_cl = $cl_n;
    }
    public function set_course(setcourse_cl $cl_new){
        $this->Course_cl = $cl_new;
    }
    public function __clone(){
        $this->Course_cl = clone $this->Course_cl;
    }

}
class setcourse_cl{
    public $nameOFcor;
    public function __construct($cl_c){
        $this->nameOFcor = $cl_c;
    }
}
$clx_student = new cloneex("jf antor");
$clx_course = new setcourse_cl("php");
$clx_student->set_course($clx_course);
$clx_student2 = clone $clx_student;

$clx_student2->Name_cl = "jihad";
$clx_student2->Course_cl->nameOFcor = "python";


print_r($clx_student);
echo "<br> <br>";
print_r($clx_student2);
// invoke method==============
echo "<h2>clone  method magicfunction</h2>";
class invoke_calc{
    public $invo_a;
    public $invo_b;

    public function __construct($a , $b){
        $this->invo_a = $a;
        $this->invo_b = $b;
    }
    public function invo_sum(){
        echo $this->invo_a + $this->invo_b;
    }
    public function __invoke(){
        echo $this->invo_a + $this->invo_b . "<br>";
        echo 'you can not access method my clling function .';
    }

}
$invo_ob = new invoke_calc(45,15);
// $invo_ob->invo_sum();
$invo_ob();
// magic constants==============
echo "<h2>magic constants</h2>";

echo "line number :" . __LINE__ ."<br> <br>";
echo "the full path of this file :" . __file__ ."<br><br>";
echo "the ful path of this directory is :" . __DIR__ ."<br><br>";

function mymafunction(){
    echo 'the function name is :' . __FUNCTION__ ."<br><br>";
}
mymafunction();

class myoopfunctio{
    public function get_ma_classname(){
        // return "the class name is : " . __CLASS__;
        return " the method name is : " . __METHOD__ ;
    }
}
$magic_obj = new myoopfunctio();
echo $magic_obj->get_ma_classname();
// name space==============

class name_class{
    public function new_get_namespace(){
        return __NAMESPACE__;
    }

}
$namespace_obj = new name_class();
echo $namespace_obj->new_get_namespace();



// list of conditional function============
echo "<h2>list of conditional function</h2>";

class conditional_cl{
    public function condi_cll(){
        echo " your class and method is existe in <br> ";
    }
}
if(class_exists("conditional_cl")){
    // echo " this class is existe ";
    $condi_obj = new conditional_cl();
    $condi_obj->condi_cll();
}else{
    echo " this class is not existe ";
}
// inter face existe==
interface con_inter{

}

if(interface_exists('con_inter')){
    // echo " your inter is existe in ";
    class inter_class implements con_inter{
        public function inter_metod(){
            echo "inter face in exiojfojfhogj <br>";
        }
    }
}else{
    echo "this intre face in not exist <br>";
}
$interface_obj = new inter_class();
$interface_obj->inter_metod();

// method existing=======
echo "<h2>method existing function</h2>";


class method_ex{
    public function meth_ex_prop(){
        echo " ";
    }
}
$meth_ex_ob = new method_ex();

if(method_exists($meth_ex_ob , 'meth_ex_prop')){
    echo " this method is exist in this class <br>";
}else{
    echo " method dose not exist ";
}
// trait exist method=========

trait trait_ex{
    public function trait_ex_meth(){

    }
}
if(trait_exists('trait_ex')){
    echo " this trait is exist in this class <br>";
    class trait_class{
        use trait_ex;
    }
}else{
    echo " method dose not exist ";
}

// propertis existes============
class prop_ex{
    public $ex_prop;
}
if(property_exists('prop_ex','ex_prop')){
    echo " this propertis is existing <br>";
}else{
    echo "propertis is dose not existe";
}

// is a function=========
class is_class{

}
$is_obj = new is_class();
if(is_a($is_obj,'is_classp')){
    echo " this object of class is_class <br>";
}else{
    echo "this object is not this this class is_class <br>";
}
// is_ subclss_of=======
class parent_sub{

}
class child_sub extends parent_sub{

}
$chi_obj = new child_sub();
if(is_subclass_of($chi_obj,'parent_sub')){
    echo "this \$chi_obj is a object of subclass of parent_sub <br>";
}else{
    echo "this \$chi_obj is not a object of subclass of parent_sub";
}
// get method list ==================
echo "<h2>get method list function</h2>";

//get class name ========== 

class get_class{
    function getCl_name(){
        echo "class name : " . get_class($this) . "<br>";
    }   
}
class get_pchild extends get_class{
    function get_cprop(){
        // get parent class name
        echo "Get parent class name : " . get_parent_class($this) . "<br>";
    }
}
$get_cl_ob = new get_class();
$get_p_ob = new get_pchild();

$get_cl_ob->getCl_name();
$get_p_ob->get_cprop();
// you can call get_parent_class and get_class out side of function 

 echo 'class name is  :' . get_class($get_cl_ob) . "<br>";
 echo ' get parent class name is  :' . get_parent_class($get_p_ob) . "<br>";

// get_class_methods==========
class list_meth{
    function __construct(){
        $class_method = get_class_methods('list_meth');
        echo '<pre>';
        print_r($class_method);
        echo '</pre>';
    }
    function list_meth1(){
        
    }
    function list_meth2(){
        
    }
    private function list_meth3(){
        
    }
    

}
$list_meth_ob = new list_meth();
$class_method = get_class_methods('list_meth');

echo '<pre>';
print_r($class_method);
echo '</pre>';
foreach ($class_method as $meth_row){
    echo $meth_row . "<br>";
}

// get_class_varible===========

class get_var_cl{
    public $var1;
    public $var2 = "hello";
    public $var3 = 100;
    private $var4;

    function __construct(){
        $this->var1 = 'wow';
        $this->var2 = "jf antor";
        // print_r($get_var_cl = get_class_vars(__CLASS__)) . "<br>";

    }
}
$get_var_obj = new get_var_cl();
$get_var_cl = get_class_vars(get_class($get_var_obj));
// get object variavle=================
$get_obj_var = get_object_vars($get_var_obj);


echo '<pre>';
print_r($get_var_cl) . "<br>";

print_r($get_obj_var);
echo '</pre>';

foreach ($get_var_cl as $get_var_row){
    echo $get_var_row . "<br>";
}

// get call class=========================================
class get_parent{
    static public function get_test(){
        var_dump(get_called_class());
    }
}
class get_child extends get_parent{

}
get_parent::get_test();
get_child::get_test();

echo '<pre>';
print_r(get_declared_classes());
echo '</pre>';
// declared interfaces=============
interface dec_inter{

}
class dec_class{

}
echo '<pre>';
print_r(get_declared_interfaces());
echo '</pre>';
// returns all traits avlable in this page
echo '<pre>';
print_r(get_declared_traits());
echo '</pre>';

// class alise ============
class alise_class{
    public $alis_test;
}
class_alias("alise_class","ac");

$alise_ob = new ac();
$alise_ob->alis_test="alise name";
echo $alise_ob->alis_test . '<br>';

// -------------------------------------------------------
// mysqli & php oop 
// --------------------------------------------------------
$servername = "localhost";
$username = 'root';
$password = "";
$dbname = "news-site";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("connect faild" . $conn->connect_error);
}
$sql = "SELECT * FROM post ";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "ID : {$row['post_id']} - Post Title : {$row['title']}  <br>";
    }
}else{
    echo 'no data found ';
}

$conn->close();














echo " <br> <br> <br> <br> <br> ";
echo " <br> <br> <br> <br> <br><br> <br> <br> <br> <br> 
<br> <br> <br> <br> <br><br> <br> <br> <br> <br> ";
?>