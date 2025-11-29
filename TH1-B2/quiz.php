<?php
// Đường dẫn tệp Quiz.txt nằm cùng thư mục với index.php
$filename = __DIR__ . "/Quiz.txt";

// Kiểm tra file có tồn tại không
if (!file_exists($filename)) {
    die("Không tìm thấy tệp Quiz.txt trong thư mục hiện tại.");
}

// Đọc file
$raw = file_get_contents($filename);

// Tách từng câu hỏi theo dấu xuống dòng kép
$blocks = preg_split("/\n\s*\n/", trim($raw));

$questions = [];

foreach ($blocks as $block) {
    $lines = explode("\n", trim($block));

    // Lấy câu hỏi
    $q = array_shift($lines);

    // Lấy các lựa chọn và đáp án
    $choices = [];
    $answer = "";

    foreach ($lines as $line) {
        $line = trim($line);

        if (str_starts_with($line, "ANSWER")) {
            $answer = trim(explode(":", $line)[1]);
        } else {
            $choices[] = $line;
        }
    }

    $questions[] = [
        "question" => $q,
        "choices"  => $choices,
        "answer"   => $answer
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trắc nghiệm</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        form {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .question {
            margin-bottom: 25px;
            padding: 15px 20px;
            border-left: 5px solid #3498db;
            background-color: #f0f8ff;
            border-radius: 5px;
        }

        .question p {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #34495e;
        }

        label {
            display: block;
            padding: 8px 12px;
            margin-bottom: 6px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s;
        }

        input[type="radio"] {
            margin-right: 10px;
            accent-color: #3498db;
        }

        label:hover {
            background-color: #d6eaf8;
        }

        button {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background-color: #3498db;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h1>40 Bài trắc nghiệm</h1>

<form action="result.php" method="POST">
    <?php foreach ($questions as $key => $q): ?>
    <div class="question">
        <p><b><?= $key + 1 ?>. <?= htmlspecialchars($q["question"]) ?></b></p>

        <?php foreach ($q["choices"] as $c): ?>
            <label>
                <input type="radio" name="answer<?= $key ?>" value="<?= substr($c, 0, 1) ?>">
                <?= htmlspecialchars($c) ?>
            </label>
        <?php endforeach; ?>

        <input type="hidden" name="correct<?= $key ?>" value="<?= htmlspecialchars($q["answer"]) ?>">
    </div>
    <?php endforeach; ?>

    <button type="submit">Submit</button>
</form>

</body>
</html>
