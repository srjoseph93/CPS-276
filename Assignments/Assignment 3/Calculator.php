<?php
    class Calculator {
        
        public function calc($operator = 'e', $firstNum = 'e', $secondNum = 'e') {
            if($operator == 'e' || $firstNum == 'e' || $secondNum == 'e'){
                return "You must enter a string and two numbers.\n";
            }
            else{
                $value;
                switch($operator) {
                    case '+':
                        $value = $firstNum + $secondNum;
                        break;
                    case '-':
                        $value = $firstNum - $secondNum;
                        break;
                    case '*':
                        $value = $firstNum * $secondNum;
                        break;
                    case '/':	
                        if($secondNum == 0){
                            return "You cannot divide by zero.\n";
                            break;
                        }
                        $value = $firstNum / $secondNum;
                        break;
                    default:
                        return "Your operator is bad. Try again.";
                }
                return "$firstNum $operator $secondNum equals $value.\n";
            }
        }
               
    }
?>