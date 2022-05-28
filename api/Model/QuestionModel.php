<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class QuestionModel extends Database {
    public function getQuestions($level){         
        $arr = [];

        // Get 1st room questions
        $qs1 = $this->select("SELECT * FROM questions WHERE questions.room = 1 AND questions.level <= ? ORDER BY RAND () LIMIT 4", ["i", $level]); 
        foreach($qs1 as $key => $question){
            $answers = $this->select("
                SELECT * 
                FROM answers                 
                WHERE answers.question_id = ?                
            ", ["i", $question["id"]]);

            $qs1[$key]["answers"] = $answers;
        }
        $arr['1'] = $qs1;

        // Get 2nd room questions
        $qs1 = $this->select("SELECT * FROM questions WHERE questions.room = 2 AND questions.level <= ? ORDER BY RAND () LIMIT 4", ["i", $level]); 
        foreach($qs1 as $key => $question){
            $answers = $this->select("
                SELECT * 
                FROM answers                 
                WHERE answers.question_id = ?                
            ", ["i", $question["id"]]);

            $qs1[$key]["answers"] = $answers;
        }
        $arr['2'] = $qs1;


        // Get 3rd room questions
        $qs1 = $this->select("SELECT * FROM questions WHERE questions.room = 3 AND questions.level <= ? ORDER BY RAND () LIMIT 4", ["i", $level]); 
        foreach($qs1 as $key => $question){
            $answers = $this->select("
                SELECT * 
                FROM answers                 
                WHERE answers.question_id = ?                
            ", ["i", $question["id"]]);

            $qs1[$key]["answers"] = $answers;
        }
        $arr['3'] = $qs1;


        // Get 4th room questions
        $qs1 = $this->select("SELECT * FROM questions WHERE questions.room = 4 AND questions.level <= ? ORDER BY RAND () LIMIT 4", ["i", $level]); 
        foreach($qs1 as $key => $question){
            $answers = $this->select("
                SELECT * 
                FROM answers                 
                WHERE answers.question_id = ?                
            ", ["i", $question["id"]]);

            $qs1[$key]["answers"] = $answers;
        }
        $arr['4'] = $qs1;



        return $arr;
        // var_dump($arr);
    }
}