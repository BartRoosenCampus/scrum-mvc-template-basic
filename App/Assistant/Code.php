<?php

namespace App\Assistant;

class Code
{
    public static function commitAndPush()
    {
        $timeStamp     = date('Y-m-d H:i:s');
        $messageFormat = '%s => %s';

        $message = readline('Commit message: ');

        if ('' === $message) {
            Text::write('Default commit message will be used', Config::TEXT_YELLOW);
            $message = 'Automated commit and push';
        }

        $commitMessage = sprintf($messageFormat, $timeStamp, $message);
        $commandCommit = sprintf('git commit -m"%s"', $commitMessage);

        exec('git add .');
        Text::write('Git add . done', Config::TEXT_YELLOW);
        exec($commandCommit);
        Text::write(sprintf('Commit done with message: %s', $message), Config::TEXT_YELLOW);
        exec('git push');
        Text::write('Git push done', Config::TEXT_YELLOW);

        echo "\n\n";
    }
}