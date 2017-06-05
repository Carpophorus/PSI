<?php
namespace Psi\AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class StaticDataFlushCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('psi:static:flush')
            ->setDescription('Flushes the whole static data cache');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('psi.app.manager.static.data.manager');

        $output->writeln("Flushing static data: champion");
        $manager->flushStaticData("champion");
        $output->writeln("Flushing static data: rune");
        $manager->flushStaticData("rune");
        $output->writeln("Flushing static data: mastery");
        $manager->flushStaticData("mastery");
        $output->writeln("Flushing static data: summoner");
        $manager->flushStaticData("summoner");
        $output->writeln("Flushing static data: profileicon");
        $manager->flushStaticData("profileicon");
    }
}
