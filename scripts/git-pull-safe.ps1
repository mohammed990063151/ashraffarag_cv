# Run from repo root:  powershell -ExecutionPolicy Bypass -File scripts/git-pull-safe.ps1
Set-Location $PSScriptRoot\..

$stashed = $false
if (Test-Path .env.example) {
    $diff = git diff --quiet .env.example 2>$null; if ($LASTEXITCODE -ne 0) {
        Write-Host "[git-pull-safe] Stashing .env.example ..."
        git stash push -m "git-pull-safe: .env.example" -- .env.example
        $stashed = $true
    }
}

Write-Host "[git-pull-safe] git pull ..."
git pull

if ($stashed) {
    Write-Host "[git-pull-safe] git stash pop ..."
    git stash pop
}

Write-Host "[git-pull-safe] Finished."
