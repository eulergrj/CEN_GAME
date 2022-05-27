<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class QuestionModel extends Database
{
    public function getQuestions($limit)
    {
        return $this->select("SELECT * FROM questions ORDER BY question_id ASC LIMIT ?", ["i", $limit]);
    }
}