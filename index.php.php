<?php
$choices = ["rock", "paper", "scissors"];
$user = $_POST['choice'] ?? null;
$computer = $choices[array_rand($choices)];
$result = "";

if ($user) {
    if ($user == $computer) {
        $result = "It's a Tie!";
        $color = "#070138";
    } elseif (
        ($user == "rock" && $computer == "scissors") ||
        ($user == "paper" && $computer == "rock") ||
        ($user == "scissors" && $computer == "paper")
    ) {
        $result = "You Win!";
        $color = "green";
    } else {
        $result = "Computer Wins!";
        $color = "red";
    }
}

function emoji($c){
    return match($c){
        "rock" => "🪨",
        "paper" => "📄",
        "scissors" => "✂",
        default => ""
    };
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Rock Paper Scissors</title>
<style>
body{
    margin:0;
    font-family:Arial, sans-serif;
    background:"pink";
}
.card{
    width:600px;
    margin:60px auto;
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
    text-align:center;
}
h1{margin-bottom:25px;}
.buttons button{
    background:#0d6efd;
    color:white;
    border:none;
    padding:12px 25px;
    margin:8px;
    font-size:16px;
    border-radius:8px;
    cursor:pointer;
}
.buttons button:hover{background:#084298;}
.result{
    margin-top:20px;
    font-size:28px;
    font-weight:bold;
}
.choices{
    margin-top:15px;
    font-size:18px;
}
</style>
</head>
<body>

<div class="card">
    <h1>Rock Paper Scissors</h1>

    <form method="post" class="buttons">
        <button name="choice" value="rock">🪨 Rock</button>
        <button name="choice" value="paper">📄 Paper</button>
        <button name="choice" value="scissors">✂ Scissors</button>
    </form>

    <?php if($user): ?>
        <div class="choices">
            You chose: <?= emoji($user)." ".ucfirst($user) ?><br>
            Computer chose: <?= emoji($computer)." ".ucfirst($computer) ?>
        </div>

        <div class="result" style="color:<?= $color ?>">
            <?= $result ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
