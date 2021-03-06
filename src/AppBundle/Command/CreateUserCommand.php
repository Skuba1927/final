<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 19.12.2017
 * Time: 19:45
 */

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Utils\BitcoinApi;

class  CreateUserCommand extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:create-user')
            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new user.')
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to create a user...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        // outputs a message followed by a "\n"
        $output->writeln('Whoa!');

        //test
        $bitcoin = new BitcoinApi();
        $bitcoin->request();
        $bitcoin->recordToDB();

        // outputs a message without adding a "\n" at the end of the line
        $output->write('You are about to ');
        $output->write('create a user.');
    }

    

}