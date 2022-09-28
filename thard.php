<?php
// class thard{
//     public function __construct(){
//         echo "hello from thard calss <br> ";
//     }
// }
trait mytrait{
    public function getTraitName(){
        return __TRAIT__ ;
    }
}

class myclass{
    USE mytrait;

}
$obj = new myclass();
echo $obj->getTraitName();
?>