<?php //I will write comments next to each line ya bashmohands, just so you can see I'm doing everything manually now that we started the backend part of the course.
$students = [
    ["Ahmed", 95],
    ["Mohamed", 82],
    ["Ali", 74],
    ["Sara", 61],
    ["Mona", 48]
];

$passed = 0; //This is so we can calaulate the number of students who passed, it will increment with each loop if the score of that student was greater than or equal to 60
$failed = 0; //Same as above, we just need to increment the number wjen someone score is below 60
$total = 0; //This is used to store all the scores, so we can later use it to calaulate the average.
$topStudent = ""; //This variabl's value will always change whenever there is a student with a higher score than the previous one.
$topScore = -1; //This is used to store the highest score, the initial value will be -1, so that the first student in the array, regardless of his score, will have a higher score than this initial value.

foreach ($students as $student) { //This loop where iterate over all the students in the array above, we store the name in $name and the score in $score for each student.
    
    $name = $student[0];
    $score = $student[1];

    $total += $score;


    if ($score >= 90) { //Doesn't even need an explanation, we did the same with JS.
        $grade = "A";
        $passed++;
    } elseif ($score >= 80) {
        $grade = "B";
        $passed++;
    } elseif ($score >= 70) {
        $grade = "C";
        $passed++;
    } elseif ($score >= 60) {
        $grade = "D";
        $passed++;
    } else {
        $grade = "F";
        $failed++;
    }

    echo "Student: $name | Score: $score | Grade: $grade<br>";

    if ($score > $topScore) {//This is where we do the highest scoring student logic. First the $topScore will be -1, if the current score is higher, then we will update the $topScore value.
        $topScore = $score;
        $topStudent = $name;
    }
}

$average = $total / count($students);

echo "<br>Passed students: $passed<br>";
echo "Failed students: $failed<br>";
echo "Average score: {$average}<br>";
echo "Top student: $topStudent ($topScore)<br>";
