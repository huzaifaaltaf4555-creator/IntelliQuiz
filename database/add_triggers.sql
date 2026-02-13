DELIMITER $$

CREATE TRIGGER calculate_wrong_answers
BEFORE INSERT ON exam_results
FOR EACH ROW
BEGIN
    SET NEW.wrong_answer = NEW.total_question - NEW.correct_answer;
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER validate_question_answer_insert
BEFORE INSERT ON questions
FOR EACH ROW
BEGIN
    IF NEW.answer NOT IN (NEW.opt1, NEW.opt2, NEW.opt3, NEW.opt4) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: Answer must match one of the four options (opt1, opt2, opt3, or opt4)';
    END IF;
END$$

CREATE TRIGGER validate_question_answer_update
BEFORE UPDATE ON questions
FOR EACH ROW
BEGIN
    IF NEW.answer NOT IN (NEW.opt1, NEW.opt2, NEW.opt3, NEW.opt4) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: Answer must match one of the four options (opt1, opt2, opt3, or opt4)';
    END IF;
END$$

DELIMITER ;

SELECT 
    TRIGGER_NAME,
    EVENT_MANIPULATION,
    EVENT_OBJECT_TABLE,
    ACTION_TIMING
FROM information_schema.TRIGGERS
WHERE TRIGGER_SCHEMA = 'online_quiz'
ORDER BY EVENT_OBJECT_TABLE, ACTION_TIMING;

SELECT 'Triggers created successfully!' as status;
