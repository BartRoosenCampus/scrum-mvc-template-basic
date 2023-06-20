<?php

namespace App\Assistant;

class Code
{
    public static function commitAndPush()
    {
        $timeStamp     = date('Y-m-d H:i:s');
        $messageFormat = '%s => %s';
        $message       = 'Automated commit and push';
        $commitMessage = sprintf($messageFormat, $timeStamp, $message);
        $commandCommit = sprintf('git commit -m"%s"', $commitMessage);

        exec('git status');
        exec('git add .');
        exec('git status');
        exec($commandCommit);
        exec('git status');
        exec('git push');
        exec('git status');

        echo "\n\n";
    }
}