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

        Text::write(sprintf('Your code will be pushed with message: %s', $commitMessage), Config::TEXT_YELLOW);

        exec('git add .');
        exec($commandCommit);
        exec('git push');

        echo "\n\n";
    }
}