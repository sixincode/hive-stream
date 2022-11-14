#!/usr/bin/env php
<?php

function ask(string $question, string $default = ''): string
{
    $answer = readline($question.($default ? " {$default}" : null).': ');

    if (! $answer) {
        return $default;
    }

    return $answer;
}

function confirm(string $question, bool $default = false): bool
{
    $answer = ask($question.' ('.($default ? 'Y/n' : 'y/N').')');

    if (! $answer) {
        return $default;
    }

    return strtolower($answer) === 'y';
}

function run(string $command): string
{
    return trim((string) shell_exec($command));
}

function runUpdate(string $commitMessage,string $pushBranch): string
{
  $shellCmd = 'git add . && git commit -m"'.$commitMessage.'" && git push -u --force origin '.$pushBranch;
  run($shellCmd);
  return "Repo updated !";
}


$time = time();
$commitMessage = ask("Commit message : ", "auto-update-{$time}");
$pushBranch = ask("Push Branch : ", "main");

confirm("Commit 'Sixincode/hive-stream' repo into {$pushBranch} branch with {$commitMessage}' as message ?") &&
runUpdate($commitMessage,$pushBranch );
