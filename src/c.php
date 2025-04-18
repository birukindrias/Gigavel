<?php
 $output = [];
 $returnVar = 0;
$cc = 'npx tailwindcss -i resources/css/input.css -o resources/css/index.css --minify';
exec(command:'php index.php');

function compileTailwindCSS()
{
    // Set the path for input and output files
    $inputFile = __DIR__ . '/../resources/css/input.css';
    $outputFile = __DIR__ . '/../resources/css/index.css';
    
    // Construct the command to run tailwindcss CLI
    $command = "npx tailwindcss -i $inputFile -o $outputFile --minify";

    // Execute the command and capture the output
   
    exec($command, $output,$returnVar);

    // Check if the command ran successfully
    if ($returnVar === 0) {
        echo "Tailwind CSS compiled successfully!";
    } else {
        echo "Failed to compile Tailwind CSS. Error: " . implode("\n", $output);
    }
}
echo 'working';
// compileTailwindCSS();
var_dump( __DIR__);
    $inputFile = __DIR__ . '/../resources/css/input.css';
    $outputFile = __DIR__ . '/../resources/css/index.css';
// Construct the command to run tailwindcss CLI
$command = "npx tailwindcss -i $inputFile -o $outputFile --minify";

// Execute the command and capture the output
$output = [];
$returnVar = 0;
exec($command, $output, $returnVar);

// Check if the command ran successfully
if ($returnVar === 0) {
    echo "Tailwind CSS compiled successfully!";
} else {
    echo "Failed to compile Tailwind CSS. Error: " . implode("\n", $output);
}
?>
