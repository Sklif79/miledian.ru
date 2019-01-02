<?php

// Вывод возможных результатов для облегчения участи создающих и проверяющих

if ($testme_test_details->test_type == 'abc') {
    $testme_abc_points = $wpdb->get_results("SELECT a.answer_points 
            FROM {$wpdb->testme_answers} a, {$wpdb->testme_questions} q 
	WHERE a.answer_question_relation = q.ID AND q.question_test_relation = " . $testme_id);
    $testme_abc_array = array();

    if (isset($testme_abc_points)) {
        print "<p>Варианты ответов: ";
        //Получаем строку
        foreach ($testme_abc_points as $letters) {
            $testme_letters = $letters->answer_points;
            $testme_one_answer = explode(",", $testme_letters);
            $testme_abc_array = array_merge($testme_abc_array, $testme_one_answer);
        }
        $testme_abc_array_unique = array_unique($testme_abc_array);

        print $testme_abc_letter_line = implode(',', $testme_abc_array_unique);

        print ".</p>";
    } elseif ($testme_step == 3) {
        print '<p>К этому тесту пока еще нет вопросов. Не забудьте про них.</p>';
    }
}

// Минимальные и максимальные баллы для тестов 123
elseif ($testme_test_details->test_type == '123') {
    $testme_123_points = $wpdb->get_row("SELECT SUM(min_points) AS testme_min, SUM(max_points) AS testme_max FROM 
	(SELECT min(ROUND(a.answer_points)) AS min_points, max(ROUND(a.answer_points)) AS max_points 
        FROM {$wpdb->testme_answers} a, {$wpdb->testme_questions} q 
	WHERE a.answer_question_relation = q.ID
	AND q.question_test_relation = {$testme_id} 
	GROUP BY a.answer_question_relation) AS s");

    if (isset($testme_123_points->testme_min)) {
        print '<p>Минимальное количество баллов в этом тесте: ' . $testme_123_points->testme_min . '.<br />
    Максимальное количество баллов в этом тесте: ' . $testme_123_points->testme_max . '.</p>';
    } elseif ($testme_step == 3) {
        print '<p>К этому тесту пока еще нет вопросов. Не забудьте про них.</p>';
    }
}	