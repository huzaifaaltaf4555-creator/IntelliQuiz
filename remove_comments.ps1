# Remove all comments from IntelliQuiz project files
# This script removes HTML, PHP, and SQL comments

$files = @(
    "index.php",
    "login.php",
    "register.php",
    "select_exam.php",
    "quiz_closed.php",
    "result.php",
    "student_landing.php",
    "old_exam_results.php",
    "dashboard.php",
    "header.php",
    "header1.php",
    "footer.php",
    "Teacher\index.php",
    "Teacher\exam_category.php",
    "Teacher\edit_option.php",
    "Teacher\header.php",
    "Teacher\header1.php",
    "Teacher\footer.php",
    "Teacher\add_edit_questions.php",
    "Teacher\add_edit_exam_questions.php",
    "Teacher\old-exam-result.php",
    "Teacher\edit_exam.php",
    "Teacher\delete.php",
    "Teacher\delete_option.php",
    "Teacher\edit_option_images.php",
    "forajax\load_questions.php",
    "forajax\load_timer.php",
    "forajax\load_total_que.php",
    "forajax\save_answer_in_session.php",
    "forajax\set_exam_type_session.php",
    "database\init_database.sql",
    "database\add_triggers.sql"
)

$count = 0

foreach ($file in $files) {
    $path = "c:\xampp\htdocs\IntelliQuiz\$file"
    
    if (Test-Path $path) {
        Write-Host "Processing: $file" -ForegroundColor Cyan
        
        $content = Get-Content $path -Raw
        
        $content = $content -replace '<!--.*?-->', ''
        
        $content = $content -replace '^\s*//.*$', '' -replace '\n\s*//.*$', ''
        
        $content = $content -replace '/\*.*?\*/', ''
        
        $content = $content -replace '^\s*--.*$', '' -replace '\n\s*--.*$', ''
        
        $content = $content -replace '\n\s*\n\s*\n', "`n`n"
        
        Set-Content $path -Value $content -NoNewline
        $count++
    }
    else {
        Write-Host "Skipped (not found): $file" -ForegroundColor Yellow
    }
}

Write-Host "`n✅ Completed! Removed comments from $count files." -ForegroundColor Green
