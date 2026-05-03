<!DOCTYPE html>
<html>
    <head>
        <title>Biology</title>
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <link rel="stylesheet" href="styles4.css">
    </head>
    <body>
        <header class="header"></header>
        <!-- Homepage section start -->
        <section class="front-section" id="#home">
                <!-- NavBar start -->
            <div class="nav-container">
                <nav>
                    <ul>
                        <li><a href="Homepage.html">Home</a></li>
                        <li><a href="Anatomy.html">Anatomy</a></li>
                        <li><a href="Bacteria.html">Bacteria</a></li>
                        <li><a href="Genetics.html">Genetics</a></li>
                        <li><a href="Quiz.php">Quiz</a></li>
                       
                    </ul>
                </nav>
        <section class="quiz">
             <div class="container">
                <h1>Biology Quiz</h1>
                <p class="subtitle">10 Questions</p>
        
                    <?php
                    // Define quiz questions and answers
                    $questions = array(
                        array(
                            "question" => "What is genetics?",
                            "options" => array(
                                "A" => "The study of cells",
                                "B" => "The study of patterns of inheritance of specific traits",
                                "C" => "The study of bacteria",
                                "D" => "The study of evolution only"
                            ),
                            "correct" => "B"
                        ),
                        array(
                            "question" => "Which branch of genetics deals with inherited characteristics among organisms?",
                            "options" => array(
                                "A" => "Behavioral genetics",
                                "B" => "Medical genetics",
                                "C" => "Classical genetics",
                                "D" => "Genomics"
                            ),
                            "correct" => "C"
                        ),
                        array(
                            "question" => "What are spirochetes?",
                            "options" => array(
                                "A" => "Bacteria with a spiral shape and flexible body",
                                "B" => "Round-shaped bacteria",
                                "C" => "Rod-shaped bacteria",
                                "D" => "Square-shaped bacteria"
                            ),
                            "correct" => "A"
                        ),
                        array(
                            "question" => "Which type of bacteria needs oxygen for survival?",
                            "options" => array(
                                "A" => "Obligate Anaerobes",
                                "B" => "Facultative Anaerobes",
                                "C" => "Obligate Aerobes",
                                "D" => "Aerotolerant"
                            ),
                            "correct" => "C"
                        ),
                        array(
                            "question" => "What is the study of organism structure at microscopic level called?",
                            "options" => array(
                                "A" => "Gross anatomy",
                                "B" => "Microscopic anatomy",
                                "C" => "Cytology",
                                "D" => "Histology"
                            ),
                            "correct" => "B"
                        ),
                        array(
                            "question" => "Which bacteria are poisoned by oxygen?",
                            "options" => array(
                                "A" => "Obligate Aerobes",
                                "B" => "Facultative Anaerobes",
                                "C" => "Obligate Anaerobes",
                                "D" => "Aerotolerant"
                            ),
                            "correct" => "C"
                        ),
                        array(
                            "question" => "What does gross anatomy deal with?",
                            "options" => array(
                                "A" => "Study of cells",
                                "B" => "Study of tissues",
                                "C" => "Study of anatomy visible to naked eye on macroscopic level",
                                "D" => "Study of microscopic organisms"
                            ),
                            "correct" => "C"
                        ),
                        array(
                            "question" => "Which branch of genetics studies DNA and chromosomes?",
                            "options" => array(
                                "A" => "Population genetics",
                                "B" => "Molecular genetics",
                                "C" => "Behavioral genetics",
                                "D" => "Medical genetics"
                            ),
                            "correct" => "B"
                        ),
                        array(
                            "question" => "What are Cocci?",
                            "options" => array(
                                "A" => "Rod-shaped bacteria",
                                "B" => "Spiral-shaped bacteria",
                                "C" => "Round-shaped bacteria",
                                "D" => "Square-shaped bacteria"
                            ),
                            "correct" => "C"
                        ),
                        array(
                            "question" => "What are Bacilli?",
                            "options" => array(
                                "A" => "Round-shaped bacteria",
                                "B" => "Rod-shaped bacteria, 0.2 to 2 μm wide and 1 to 10 μm long",
                                "C" => "Spiral-shaped bacteria",
                                "D" => "Small rod-shaped bacteria"
                            ),
                            "correct" => "B"
                        )
                    );
                    
                    // Process form submission
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $score = 0;
                        $total = count($questions);
                        
                        for ($i = 0; $i < $total; $i++) {
                            $answer = isset($_POST["q$i"]) ? $_POST["q$i"] : "";
                            if ($answer == $questions[$i]["correct"]) {
                                $score++;
                            }
                        }
                        
                        $percentage = ($score / $total) * 100;
                        
                        echo "<div class='result'>";
                        echo "<h2>Quiz Results</h2>";
                        echo "<p>You scored: <strong>$score out of $total</strong></p>";
                        echo "<p>Percentage: <strong>" . number_format($percentage, 1) . "%</strong></p>";
                        
                        if ($percentage >= 80) {
                            echo "<p>Excellent work!</p>";
                        } elseif ($percentage >= 60) {
                            echo "<p>Good job!</p>";
                        } else {
                            echo "<p>Keep studying!</p>";
                        }
                        
                        echo "<a href='" . $_SERVER['PHP_SELF'] . "' class='retry-btn'>Try Again</a>";
                        echo "</div>";
                    } else {
                        // Display quiz form
                        echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>";
                        
                        for ($i = 0; $i < count($questions); $i++) {
                            echo "<div class='question'>";
                            echo "<h3>Question " . ($i + 1) . ": " . $questions[$i]["question"] . "</h3>";
                            echo "<div class='options'>";
                            
                            foreach ($questions[$i]["options"] as $key => $option) {
                                echo "<div class='option'>";
                                echo "<label>";
                                echo "<input type='radio' name='q$i' value='$key' required>";
                                echo "$key. $option";
                                echo "</label>";
                                echo "</div>";
                            }
                            
                            echo "</div>";
                            echo "</div>";
                        }
                        
                        echo "<button type='submit' class='submit-btn'>Submit Quiz</button>";
                        echo "</form>";
                    }
        ?>
    </div>






        </section>
    </body>
</html>