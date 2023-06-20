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

        exec('git add .');
        exec($commandCommit);
        exec('git push');
    }
}